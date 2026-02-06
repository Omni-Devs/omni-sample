<?php

namespace App\Http\Controllers;

use App\Models\DailyTimeRecord;
use App\Models\SalaryMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

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
                'time_in_reports' => $dtr?->time_in_reports,
                'time_out_reports' => $dtr?->time_out_reports,
                'other_reports' => $dtr?->other_reports,
                'status' => $dtr?->status ?? 'worked',
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
    $validated = $request->validate([
        'date'             => 'required|date',
        'user_id'          => 'required|exists:users,id',
        'salary_method_id' => 'nullable|exists:salary_methods,id',
        
        // These are optional now – edit modal doesn't send them
        'activity'         => 'nullable|string|max:255',
        'time'             => 'nullable|date_format:H:i',

        'status'           => 'required|in:rest_day,absent,late,under_time,worked',

        // These are the important ones from edit modal
        'time_in_reports'  => 'nullable|date_format:H:i',
        'time_out_reports' => 'nullable|date_format:H:i|after_or_equal:time_in_reports', // optional: ensure out ≥ in
        'other_reports'    => 'nullable|string|max:500',
    ]);

    $validated['created_by'] = auth()->id() ?? null;

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

    // Only update fields that are editable in the modal
    $record->time_in_reports = $request->time_in_reports;
    $record->time_out_reports = $request->time_out_reports;
    $record->other_reports = $request->other_reports;
    $record->status = $request->status;

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
}
