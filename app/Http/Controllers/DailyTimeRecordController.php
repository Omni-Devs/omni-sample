<?php

namespace App\Http\Controllers;

use App\Models\DailyTimeRecord;
use App\Models\SalaryMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class DailyTimeRecordController extends Controller
{

public function index(Request $request)
{
    $year = $request->year ?? now()->year;
    $month = $request->month ?? now()->month;
    $perPage = $request->get('perPage', 50);
    $search = $request->get('search');

    $employees = User::where('status', 'active')->with('salaryMethod.shift')->get();
    $records = [];

    foreach ($employees as $user) {
        $salaryMethod = $user->salaryMethod;

        $workDays = [];

    if ($salaryMethod?->custom_open_time) {
            $customTimes = json_decode($salaryMethod->custom_open_time, true);

            if (!is_array($customTimes)) {
                $customTimes = [];
            }

            foreach ($customTimes as $dateStr => $times) {
                $date = \Carbon\Carbon::parse($dateStr);
                if ($date->year == $year && $date->month == $month) {
                    $workDays[$dateStr] = $times;
                }
            }
        } elseif ($salaryMethod?->custom_work_days) {
            $allWorkDays = json_decode($salaryMethod->custom_work_days, true);

            // Add this safety
            if (!is_array($allWorkDays)) {
                $allWorkDays = [];
            }

            foreach ($allWorkDays as $dateStr) {
                $date = \Carbon\Carbon::parse($dateStr);
                if ($date->year == $year && $date->month == $month) {
                    $workDays[$dateStr] = [
                        'start' => $salaryMethod->custom_time_start,
                        'end'   => $salaryMethod->custom_time_end,
                    ];
                }
            }
        } elseif ($salaryMethod && $salaryMethod->custom_time_start && $salaryMethod->custom_time_end) {
            $daysInMonth = \Carbon\Carbon::create($year, $month)->daysInMonth;
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $dateStr = \Carbon\Carbon::create($year, $month, $day)->format('Y-m-d');
                $workDays[$dateStr] = [
                    'start' => $salaryMethod->custom_time_start,
                    'end'   => $salaryMethod->custom_time_end,
                ];
            }
        }

        // Get DTRs for the month
        $dtrs = DailyTimeRecord::where('user_id', $user->id)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get()
            ->keyBy(fn($dtr) => $dtr->date->format('Y-m-d'));

        foreach ($workDays as $date => $shiftTimes) {
            // // Normalize to string
            if (is_array($shiftTimes)) {
                $timeOfShift = ($shiftTimes['start'] ?? '--') . '-' . ($shiftTimes['end'] ?? '--');
            } else {
                $timeOfShift = $shiftTimes;           // already string like "08:00-17:00"
            }

            $dtr = $dtrs[$date] ?? null;

            // Compute displayable status based on stored times and scheduled shift
            $displayStatus = $dtr?->status ?? 'absent';

            // Extract scheduled shift start/end from $timeOfShift (format: H:i-H:i)
            [$shiftStartRaw, $shiftEndRaw] = array_map('trim', explode('-', $timeOfShift, 2) + [1 => '--:--']);

            // Helper to convert H:i to minutes
            $timeToMinutes = function ($time) {
                if (!$time || $time === '--' || $time === '--:--') return null;
                if (!preg_match('/^\d{1,2}:\d{2}$/', $time)) return null;
                [$h, $m] = explode(':', $time);
                return intval($h) * 60 + intval($m);
            };

            // Get actual reported times (take first time_in and last time_out if arrays)
            $reportedIn = null;
            $reportedOut = null;
            if ($dtr) {
                if (is_array($dtr->time_in_reports)) {
                    $reportedIn = $dtr->time_in_reports[0] ?? null;
                } else {
                    $reportedIn = $dtr->time_in_reports ?? null;
                }

                if (is_array($dtr->time_out_reports)) {
                    // copy to local variable to avoid indirect modification of Eloquent attribute
                    $outs = $dtr->time_out_reports;
                    if (count($outs) > 0) {
                        // use array_key_last for last element (safe, no reference)
                        $lastKey = array_key_last($outs);
                        $reportedOut = $outs[$lastKey] ?? null;
                    } else {
                        $reportedOut = null;
                    }
                } else {
                    $reportedOut = $dtr->time_out_reports ?? null;
                }
            }

            // Default display pieces
            $pieces = [];

            $base = $dtr?->status ?? 'absent';

            // If there is a reported time in, treat as worked unless explicitly rest_day
            if ($reportedIn && $base !== 'rest_day') {
                $base = 'worked';
            }

            $pieces[] = ucfirst(str_replace('_', ' ', $base));

            // Only compute late/undertime flags when base is worked and shift times are present
            if ($base === 'worked' && ($shiftStartRaw !== '--:--' || $shiftEndRaw !== '--:--')) {
                $inMinutes = $timeToMinutes($reportedIn);
                $outMinutes = $timeToMinutes($reportedOut);
                $shiftStartMin = $timeToMinutes($shiftStartRaw);
                $shiftEndMin = $timeToMinutes($shiftEndRaw);

                $isLate = $inMinutes !== null && $shiftStartMin !== null && $inMinutes > $shiftStartMin;
                $isUndertime = $outMinutes !== null && $shiftEndMin !== null && $outMinutes < $shiftEndMin;

                if ($isLate) $pieces[] = 'Late';
                if ($isUndertime) $pieces[] = 'Undertime';

                // Detect overtime activities in other_reports (start_overtime/end_overtime)
                $hasOvertime = false;
                if ($dtr && !empty($dtr->other_reports)) {
                    $othersList = is_array($dtr->other_reports) ? $dtr->other_reports : (is_string($dtr->other_reports) ? array_filter(array_map('trim', explode("\n", $dtr->other_reports))) : []);
                    foreach ($othersList as $o) {
                        if (preg_match('/overtime/i', $o)) {
                            $hasOvertime = true;
                            break;
                        }
                    }
                }

                if ($hasOvertime) $pieces[] = 'Overtime';
            }

            $displayStatus = implode('/', $pieces);

            // Prepare formatted displays for time_in, time_out and other_reports
            $timeInDisplay = '-';
            if ($dtr && !empty($dtr->time_in_reports)) {
                $list = is_array($dtr->time_in_reports) ? $dtr->time_in_reports : [$dtr->time_in_reports];
                $tmp = [];
                foreach ($list as $t) {
                    if (preg_match('/^\d{1,2}:\d{2}$/', $t)) {
                        try { $tmp[] = \Carbon\Carbon::createFromFormat('H:i', $t)->format('g:i A'); } catch (\Exception $e) { $tmp[] = $t; }
                    } else { $tmp[] = $t; }
                }
                $timeInDisplay = implode(', ', $tmp);
            }

            $timeOutDisplay = '-';
            if ($dtr && !empty($dtr->time_out_reports)) {
                $list = is_array($dtr->time_out_reports) ? $dtr->time_out_reports : [$dtr->time_out_reports];
                $tmp = [];
                foreach ($list as $t) {
                    if (preg_match('/^\d{1,2}:\d{2}$/', $t)) {
                        try { $tmp[] = \Carbon\Carbon::createFromFormat('H:i', $t)->format('g:i A'); } catch (\Exception $e) { $tmp[] = $t; }
                    } else { $tmp[] = $t; }
                }
                $timeOutDisplay = implode(', ', $tmp);
            }

            $otherDisplay = '-';
            if ($dtr && !empty($dtr->other_reports)) {
                $others = is_array($dtr->other_reports) ? $dtr->other_reports : (is_string($dtr->other_reports) ? array_filter(array_map('trim', explode("\n", $dtr->other_reports))) : []);
                $merged = [];
                $pendingStartOvertime = null;
                foreach ($others as $entry) {
                    if (strpos($entry, ' - ') !== false) {
                        $merged[] = $entry; continue;
                    }
                    if (preg_match('/^start_overtime\s*:\s*(\d{1,2}:\d{2})$/i', $entry, $m)) {
                        $pendingStartOvertime = $m[1]; continue;
                    }
                    if (preg_match('/^end_overtime\s*:\s*(\d{1,2}:\d{2})$/i', $entry, $m)) {
                        if ($pendingStartOvertime !== null) {
                            $start = $pendingStartOvertime; $end = $m[1];
                            try { $startF = \Carbon\Carbon::createFromFormat('H:i', $start)->format('g:i A'); } catch (\Exception $e) { $startF = $start; }
                            try { $endF = \Carbon\Carbon::createFromFormat('H:i', $end)->format('g:i A'); } catch (\Exception $e) { $endF = $end; }
                            $merged[] = 'Start Overtime: ' . $startF . ' - End Overtime: ' . $endF;
                            $pendingStartOvertime = null; continue;
                        } else {
                            try { $endF = \Carbon\Carbon::createFromFormat('H:i', $m[1])->format('g:i A'); } catch (\Exception $e) { $endF = $m[1]; }
                            $merged[] = 'End Overtime: ' . $endF; continue;
                        }
                    }
                    if (preg_match('/^([^:]+)\s*:\s*(\d{1,2}:\d{2})$/', $entry, $m)) {
                        $label = ucfirst(str_replace('_', ' ', trim($m[1])));
                        try { $tf = \Carbon\Carbon::createFromFormat('H:i', $m[2])->format('g:i A'); } catch (\Exception $e) { $tf = $m[2]; }
                        $merged[] = $label . ': ' . $tf; continue;
                    }
                    $merged[] = $entry;
                }
                if ($pendingStartOvertime !== null) {
                    try { $startF = \Carbon\Carbon::createFromFormat('H:i', $pendingStartOvertime)->format('g:i A'); } catch (\Exception $e) { $startF = $pendingStartOvertime; }
                    $merged[] = 'Start Overtime: ' . $startF;
                }
                $otherDisplay = implode(', ', $merged);
            }

            $records[] = (object)[
                'id' => $dtr?->id,
                'is_virtual' => !$dtr,
                'user_id' => $user->id,
                'user_name' => $user->name,
                'employee_number' => $user->id,
                'date' => \Carbon\Carbon::parse($date),
                'salary_method_id' => $salaryMethod?->id,
                'salary_method_name' => $salaryMethod?->shift?->name ?? 'Shift #' . ($salaryMethod?->shift_id ?? '-'),
                'shift_id' => $salaryMethod?->shift_id,
                'time_of_shift' => $timeOfShift, // array with start/end for this day
                'time_in_reports' => $timeInDisplay,
                'time_out_reports' => $timeOutDisplay,
                'other_reports' => $otherDisplay,
                'status' => $displayStatus,
            ];
        }
    }

    // Apply search filter
    if ($search) {
        $records = collect($records)->filter(function ($record) use ($search) {
            return str_contains(strtolower($record->user_name), strtolower($search))
                || str_contains(strtolower($record->employee_number), strtolower($search))
                || str_contains(strtolower($record->salary_method_name), strtolower($search));
        })->values();
    } else {
        $records = collect($records);
    }

    // Manual pagination
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $paginatedRecords = new LengthAwarePaginator(
        $records->forPage($currentPage, $perPage),
        $records->count(),
        $perPage,
        $currentPage,
        [
            'path' => $request->url(),
            'query' => $request->query(),
        ]
    );

    return view('dtr.index', [
        'records' => $paginatedRecords,
        'employees' => $employees,
        'salaryMethods' => SalaryMethod::with('shift')->get(),
        'perPage' => $perPage,
        'search' => $search,
        'year' => $year,
        'month' => $month,
    ]);
}


    public function store(Request $request)
{
        // Accept either explicit time_in_reports/time_out_reports OR activity + time
        $input = $request->all();

        // map activity+time into the appropriate field so validation/saving works
    if (!empty($input['activity']) && !empty($input['time'])) {
            $act = $input['activity'];
            $t = $input['time'];
            if (in_array($act, ['time_in', 'time_in_reports'])) {
                $input['time_in_reports'] = $t;
            } elseif (in_array($act, ['time_out', 'time_out_reports'])) {
                $input['time_out_reports'] = $t;
            } else {
                // Normalize existing other_reports into array
                if (isset($input['other_reports'])) {
                    if (is_array($input['other_reports'])) {
                        $others = $input['other_reports'];
                    } else {
                        $others = array_filter(array_map('trim', explode("\n", (string)$input['other_reports'])));
                    }
                } else {
                    $others = [];
                }

                $others[] = $act . ': ' . $t;
                $input['other_reports'] = $others;
            }
        }

        // If other_reports present, merge start/end overtime pairs for storage
        if (!empty($input['other_reports']) && is_array($input['other_reports'])) {
            $input['other_reports'] = $this->mergeOvertimePairs($input['other_reports']);
        }

        $validator = Validator::make($input, [
            'date'             => 'required|date',
            'user_id'          => 'required|exists:users,id',
            'salary_method_id' => 'nullable|exists:salary_methods,id',

            'status'           => 'required|in:rest_day,absent,late,under_time,worked',

            'time_in_reports'  => 'nullable|date_format:H:i',
            'time_out_reports' => 'nullable|date_format:H:i|after_or_equal:time_in_reports',
            'other_reports'    => 'nullable|array',
            'other_reports.*'  => 'string|max:500',
        ]);

        $validated = $validator->validate();

        $validated['created_by'] = auth()->id() ?? null;

        // Model casts time_* fields to array. If single string was supplied, normalize to array.
        if (!empty($validated['time_in_reports']) && !is_array($validated['time_in_reports'])) {
            $validated['time_in_reports'] = [$validated['time_in_reports']];
        }
        if (!empty($validated['time_out_reports']) && !is_array($validated['time_out_reports'])) {
            $validated['time_out_reports'] = [$validated['time_out_reports']];
        }

        $record = DailyTimeRecord::create($validated);

        return redirect()->route('dtr.index')
            ->with('success', 'Time record created successfully.');
}

// public function update(Request $request, $id)
// {
//     $record = DailyTimeRecord::findOrFail($id);

//     // Update only editable fields
//     $record->time_in_reports = $request->time_in_reports;
//     $record->time_out_reports = $request->time_out_reports;
//     $record->other_reports = $request->other_reports;
//     $record->status = $request->status;

//     // 🔒 Always preserve salary method
//     if ($request->filled('salary_method_id')) {
//         $record->salary_method_id = $request->salary_method_id;
//     }

//     // 🔒 Always preserve time_of_shift (never remove it)
//     if ($request->filled('shift_start') && $request->filled('shift_end')) {
//         $record->time_of_shift = json_encode([
//             'start' => $request->shift_start,
//             'end'   => $request->shift_end,
//         ]);
//     }

//     $record->save();

//     return redirect()->back()->with('success', 'Record updated successfully.');
// }

public function update(Request $request, $id)
{
    $record = DailyTimeRecord::findOrFail($id);

    // Accept activity+time from the edit modal or direct time_in_reports/time_out_reports
    $input = $request->all();

    if (!empty($input['activity']) && !empty($input['time'])) {
        $act = $input['activity'];
        $t = $input['time'];
        if (in_array($act, ['time_in', 'time_in_reports'])) {
            $input['time_in_reports'] = $t;
        } elseif (in_array($act, ['time_out', 'time_out_reports'])) {
            $input['time_out_reports'] = $t;
        } else {
            // Normalize existing other_reports into array
            if (isset($input['other_reports'])) {
                if (is_array($input['other_reports'])) {
                    $others = $input['other_reports'];
                } else {
                    $others = array_filter(array_map('trim', explode("\n", (string)$input['other_reports'])));
                }
            } else {
                $others = [];
            }

            $others[] = $act . ': ' . $t;
            $input['other_reports'] = $others;
        }
    }

    // Merge overtime pairs for storage
    if (!empty($input['other_reports']) && is_array($input['other_reports'])) {
        $input['other_reports'] = $this->mergeOvertimePairs($input['other_reports']);
    }

    $validator = Validator::make($input, [
        'time_in_reports'  => 'nullable|date_format:H:i',
        'time_out_reports' => 'nullable|date_format:H:i|after_or_equal:time_in_reports',
        'other_reports'    => 'nullable|array',
        'other_reports.*'  => 'string|max:500',
        'status'           => 'required|in:rest_day,absent,late,under_time,worked',
    ]);

    $validated = $validator->validate();

    // Only update the editable fields
    if (array_key_exists('time_in_reports', $validated)) {
        $record->time_in_reports = is_array($validated['time_in_reports']) ? $validated['time_in_reports'] : [$validated['time_in_reports']];
    }
    if (array_key_exists('time_out_reports', $validated)) {
        $record->time_out_reports = is_array($validated['time_out_reports']) ? $validated['time_out_reports'] : [$validated['time_out_reports']];
    }
    if (array_key_exists('other_reports', $validated)) {
        $record->other_reports = $validated['other_reports'];
    }
    $record->status = $validated['status'] ?? $record->status;

    // 🔒 DO NOT TOUCH user_id, salary_method_id, or time_of_shift
    // They are already stored and should remain unchanged

    $record->save();

    return redirect()->back()->with('success', 'Record updated successfully.');
}

    public function destroy(DailyTimeRecord $dtr)
    {
        $dtr->delete();

        return redirect()->route('dtr.index')->with('success', 'Time record deleted.');
    }

    /**
     * Merge start_overtime and end_overtime pairs into a single combined string for storage.
     * Input: array of strings like 'start_overtime: 16:00', 'end_overtime: 18:00', etc.
     * Output: array where paired overtime entries are combined like 'start_overtime: 16:00 - end_overtime: 18:00'.
     */
    private function mergeOvertimePairs(array $others): array
    {
        $merged = [];
        $pendingStart = null;
        foreach ($others as $entry) {
            if (strpos($entry, ' - ') !== false) {
                $merged[] = $entry; continue;
            }

            if (preg_match('/^start_overtime\s*:\s*(\d{1,2}:\d{2})$/i', $entry, $m)) {
                $pendingStart = $m[1]; continue;
            }

            if (preg_match('/^end_overtime\s*:\s*(\d{1,2}:\d{2})$/i', $entry, $m)) {
                if ($pendingStart !== null) {
                    $merged[] = 'start_overtime: ' . $pendingStart . ' - end_overtime: ' . $m[1];
                    $pendingStart = null; continue;
                } else {
                    $merged[] = 'end_overtime: ' . $m[1]; continue;
                }
            }

            $merged[] = $entry;
        }

        if ($pendingStart !== null) {
            $merged[] = 'start_overtime: ' . $pendingStart;
        }

        return $merged;
    }
}
