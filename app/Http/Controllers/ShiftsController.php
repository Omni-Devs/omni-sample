<?php

namespace App\Http\Controllers;

use App\Models\WorkforceShift;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    public function index()
    {
        return view('general-settings.workforce.shifts.index');
    }

    public function fetchShifts(Request $request)
    {
        $shifts = WorkforceShift::when($request->filled('status'), function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($request->per_page ?? 10);

        return response()->json($shifts);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:workforce_shifts,name',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i',
            'break_start' => 'nullable|date_format:H:i',
            'break_end' => 'nullable|date_format:H:i',
            'work_days' => 'nullable|array',
            'rest_days' => 'nullable|array',
            'open_time' => 'nullable|array',
        ]);

        // Default days if not selected
        $defaultWorkDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $defaultRestDays = ['Saturday', 'Sunday'];

        $shift = WorkforceShift::create([
            'name' => $validated['name'],
            'time_start' => $validated['time_start'],
            'time_end' => $validated['time_end'],
            'break_start' => $validated['break_start'] ?? null,
            'break_end' => $validated['break_end'] ?? null,
            'work_days' => !empty($validated['work_days']) ? $validated['work_days'] : $defaultWorkDays,
            'rest_days' => !empty($validated['rest_days']) ? $validated['rest_days'] : $defaultRestDays,
            'open_time' => $validated['open_time'] ?? [],
            'status' => 'active',
            'remarks' => null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Shift created successfully.',
            'data' => $shift,
        ]);
    }

    public function update(Request $request, $id)
    {
        $shift = WorkforceShift::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:workforce_shifts,name,' . $shift->id,
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i',
            'break_start' => 'nullable|date_format:H:i',
            'break_end' => 'nullable|date_format:H:i',
            'work_days' => 'nullable|array',
            'rest_days' => 'nullable|array',
            'open_time' => 'nullable|array',
        ]);

        $shift->update([
            'name' => $validated['name'],
            'time_start' => $validated['time_start'],
            'time_end' => $validated['time_end'],
            'break_start' => $validated['break_start'] ?? null,
            'break_end' => $validated['break_end'] ?? null,
            'work_days' => $validated['work_days'] ?? [],
            'rest_days' => $validated['rest_days'] ?? [],
            'open_time' => $validated['open_time'] ?? [],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Shift updated successfully.',
            'data' => $shift,
        ]);
    }

    public function archive($id)
    {
        $shift = WorkforceShift::findOrFail($id);
        $shift->update(['status' => 'archived']);

        return response()->json(['message' => 'Shift archived successfully.']);
    }

    public function restore($id)
    {
        $shift = WorkforceShift::findOrFail($id);
        $shift->update(['status' => 'active']);

        return response()->json(['message' => 'Shift restored successfully.']);
    }

    public function destroy($id)
    {
        $shift = WorkforceShift::findOrFail($id);
        $shift->delete();

        return response()->json(['message' => 'Shift deleted successfully.']);
    }
}
