<?php

namespace App\Http\Controllers;

use App\Models\RequestLeave;
use App\Models\WorkLeave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $employees = \App\Models\User::with('leaves')
    ->select('id', 'name')
    ->get();
        $leaves = \App\Models\WorkLeave::all();
        return view('workforce.leave-requests.index', compact('employees', 'leaves'));
    }
    
    public function fetchLeaveRequests(Request $request)
{
    $perPage = $request->input('per_page', 10);

    $query = RequestLeave::with([
        'employee:id,name',
        'leaveType:id,name',
        'approver:id,name',
        'disapprover:id,name',
        'cancelledBy:id,name',
        'completedBy:id,name',
    ]);

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('employee_id')) {
        $query->where('employee_id', $request->employee_id);
    }

    if ($request->filled('date_from')) {
        $query->where(
            'application_datetime',
            '>=',
            Carbon::parse($request->date_from)->startOfDay()
        );
    }

    if ($request->filled('date_to')) {
        $query->where(
            'application_datetime',
            '<=',
            Carbon::parse($request->date_to)->endOfDay()
        );
    }

    $paginated = $query
        ->orderBy('application_datetime', 'desc')
        ->paginate($perPage);

    // ✅ FLATTEN & NORMALIZE FOR FRONTEND
    $paginated->getCollection()->transform(function ($row) {
        return [
            'id'                    => $row->id,
            'employee_id'           => $row->employee_id,
            'application_datetime'  => $row->application_datetime?->format('Y-m-d H:i:s'),
            'employee_name'         => $row->employee->name ?? '-',
            'type'                  => $row->leaveType->name ?? '-',
            'period_start'          => $row->period_start?->format('Y-m-d H:i:s'),
            'period_end'            => $row->period_end?->format('Y-m-d H:i:s'),
            'no_of_days'            => $row->no_of_days,
            'reason'                => $row->reason,
            'status'                => $row->status,

            // 👇 REQUIRED FOR DYNAMIC COLUMN
            'requested_by'          => $row->requester->name ?? null,
            'approved_by'           => $row->approver->name ?? null,
            'disapproved_by'        => $row->disapprover->name ?? null,
            'completed_by'          => $row->completedBy->name ?? null,
            'cancelled_by_name'     => $row->cancelledBy->name ?? null,
        ];
    });

    return response()->json($paginated);
}



public function store(Request $request)
{
    try {

        /*
        |--------------------------------------------------------------------------
        | 1. Normalize datetime fields (fix newline / spacing issues)
        |--------------------------------------------------------------------------
        */
        foreach (['application_date', 'period_start', 'period_end'] as $field) {
            if ($request->filled($field)) {
                $clean = preg_replace('/\s+/', ' ', trim($request->$field));
                $request->merge([
                    $field => Carbon::parse($clean)->format('Y-m-d H:i:s')
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Validate (matches your current payload)
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate([
            'application_date'     => 'required|date',
            'employee_id'          => 'required|exists:users,id',
            'workforce_leave_id'   => 'required|exists:workforce_leaves,id',
            'notice_period'        => 'nullable|integer|min:0',
            'period_start'         => 'required|date',
            'period_end'           => 'required|date|after:period_start',
            'days'                 => 'required|numeric|min:0.5',
            'reason'               => 'required|string',
            'attachments.*'        => 'nullable|file|max:5120',
        ]);

        DB::beginTransaction();

        /*
        |--------------------------------------------------------------------------
        | 3. Prepare attachments JSON array
        |--------------------------------------------------------------------------
        */
        $attachments = [];

if ($request->hasFile('attachments')) {

    $leaveType = WorkLeave::find($validated['workforce_leave_id']);

    foreach ($request->file('attachments') as $file) {

        // 🔒 skip invalid or empty uploads
        if (!$file || !$file->isValid()) {
            continue;
        }

        $path = $file->store('leave_attachments', 'public');

        $attachments[] = [
            'name'       => $leaveType?->name ?? 'Leave Attachment',
            'file_path'  => $path,
            'file_name'  => $file->getClientOriginalName(),
            'mime_type'  => $file->getClientMimeType(),
        ];
    }
}


        /*
        |--------------------------------------------------------------------------
        | 4. Create leave request (attachments stored as JSON)
        |--------------------------------------------------------------------------
        */
        RequestLeave::create([
            'application_datetime' => $validated['application_date'],
            'employee_id'          => $validated['employee_id'],
            'requested_by'         => auth()->id(),
            'workforce_leave_id'   => $validated['workforce_leave_id'],
            'notice_period'        => $validated['notice_period'] ?? 0,
            'period_start'         => $validated['period_start'],
            'period_end'           => $validated['period_end'],
            'no_of_days'           => $validated['days'],
            'reason'               => $validated['reason'],
            'attachments'          => $attachments,
            'status'               => 'pending',
        ]);

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Leave request submitted successfully.'
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {

        return response()->json([
            'success' => false,
            'message' => collect($e->errors())->flatten()->first()
        ], 422);

    } catch (\Throwable $e) {

        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ], 500);
    }
}

public function edit($id)
{
    $leave = RequestLeave::with([
        'employee:id,name',
        'leaveType:id,name,notice_period'
    ])->findOrFail($id);

    // ✅ Force attachments to be an array
    $leave->attachments = $leave->attachments ?? [];

    return response()->json([
        'success' => true,
        'data' => $leave
    ]);
}

public function update(Request $request, $id)
{
    $leave = RequestLeave::findOrFail($id);

    if (in_array($leave->status, ['approved', 'completed'])) {
        return response()->json([
            'success' => false,
            'message' => 'Approved or completed leave requests can no longer be edited.'
        ], 403);
    }

    /*
    |--------------------------------------------------------------------------
    | Normalize datetime fields
    |--------------------------------------------------------------------------
    */
    foreach (['application_date', 'period_start', 'period_end'] as $field) {
        if ($request->filled($field)) {
            $clean = preg_replace('/\s+/', ' ', trim($request->$field));
            $request->merge([
                $field => \Carbon\Carbon::parse($clean)->format('Y-m-d H:i:s')
            ]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */
    $validated = $request->validate([
        'application_date'     => 'required|date',
        'workforce_leave_id'   => 'required|exists:workforce_leaves,id',
        'notice_period'        => 'nullable|integer|min:0',
        'period_start'         => 'required|date',
        'period_end'           => 'required|date|after:period_start',
        'days'                 => 'required|numeric|min:0.5',
        'reason'               => 'required|string',

        // NEW uploads only
        'attachments.*'        => 'nullable|file|max:5120',

        // JSON attachment control
        'existing_attachments' => 'nullable|string',
        'removed_attachments'  => 'nullable|string',
    ]);

    \DB::beginTransaction();

    /*
    |--------------------------------------------------------------------------
    | ATTACHMENTS LOGIC
    |--------------------------------------------------------------------------
    */

    // 1️⃣ Start from EXISTING attachments sent by frontend
    $attachments = json_decode(
        $request->input('existing_attachments', '[]'),
        true
    ) ?? [];

    // 2️⃣ Remove deleted attachments (optional cleanup of files)
    $removed = json_decode(
        $request->input('removed_attachments', '[]'),
        true
    ) ?? [];

    foreach ($removed as $file) {
        if (!empty($file['file_path'])) {
            \Storage::disk('public')->delete($file['file_path']);
        }
    }

    // 3️⃣ Add NEW uploads
    if ($request->hasFile('attachments')) {
        $leaveType = \App\Models\WorkLeave::find($validated['workforce_leave_id']);

        foreach ($request->file('attachments') as $file) {
            if (!$file || !$file->isValid()) continue;

            $path = $file->store('leave_attachments', 'public');

            $attachments[] = [
                'name'       => $leaveType?->name ?? 'Leave Attachment',
                'file_path'  => $path,
                'file_name'  => $file->getClientOriginalName(),
                'mime_type'  => $file->getClientMimeType(),
            ];
        }
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE LEAVE
    |--------------------------------------------------------------------------
    */
    $leave->update([
        'application_datetime' => $validated['application_date'],
        'workforce_leave_id'   => $validated['workforce_leave_id'],
        'notice_period'        => $validated['notice_period'] ?? 0,
        'period_start'         => $validated['period_start'],
        'period_end'           => $validated['period_end'],
        'no_of_days'           => $validated['days'],
        'reason'               => $validated['reason'],
        'attachments'          => $attachments,
    ]);

    \DB::commit();

    return response()->json([
        'success' => true,
        'message' => 'Leave request updated successfully.'
    ]);
}




public function updateStatus(Request $request, $id)
{
    $validated = $request->validate([
        'status' => 'required|in:approved,disapproved,cancelled,completed'
    ]);

    DB::beginTransaction();

    try {
        $leave = RequestLeave::with('leaveType')->findOrFail($id);
        $userId = auth()->id();
        $now = now();

        $data = [
            'status' => $validated['status']
        ];

        switch ($validated['status']) {
            case 'pending' :
                $data['requested_by'] = $userId;
                $data['requested_datetime'] = $now;
                break;

            case 'approved':
                $data['approved_by'] = $userId;
                $data['approved_datetime'] = $now;
                break;

            case 'disapproved':
                $data['disapproved_by'] = $userId;
                $data['disapproved_datetime'] = $now;
                break;

            case 'cancelled':
                $data['cancelled_by'] = $userId;
                $data['cancelled_datetime'] = $now;
                break;

            case 'completed':
                $data['completed_by'] = $userId;
                $data['completed_datetime'] = $now;
                break;
        }

        $leave->update($data);

        /**
         * =========================================================
         * HANDLE USER_LEAVES (ONLY WHEN APPROVED)
         * =========================================================
         */
        if ($validated['status'] === 'approved') {

            $employeeId = $leave->employee_id;
            $leaveId    = $leave->workforce_leave_id;

            // 🔍 Total approved days so far (including this one)
            $totalUsed = RequestLeave::where('employee_id', $employeeId)
                ->where('workforce_leave_id', $leaveId)
                ->where('status', 'approved')
                ->sum('no_of_days');

            /**
             * 🔐 Ensure user_leaves row exists
             */
            $userLeave = DB::table('user_leaves')
                ->where('user_id', $employeeId)
                ->where('leave_id', $leaveId)
                ->first();

            if (!$userLeave) {
                DB::table('user_leaves')->insert([
                    'user_id'        => $employeeId,
                    'leave_id'       => $leaveId,
                    'assigned_days'  => 0,
                    'earn'           => 0,
                    'used'           => $totalUsed,
                    'balance'        => 0,
                    'effective_date' => null,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);
            } else {
                DB::table('user_leaves')
                    ->where('user_id', $employeeId)
                    ->where('leave_id', $leaveId)
                    ->update([
                        'used'       => $totalUsed,
                        'balance'    => max(
                            0,
                            ($userLeave->assigned_days + $userLeave->earn) - $totalUsed
                        ),
                        'updated_at' => now(),
                    ]);
            }
        }

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Leave request status updated successfully.'
        ]);

    } catch (\Throwable $e) {
        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}
}