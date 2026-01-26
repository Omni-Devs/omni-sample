<?php

namespace App\Http\Controllers;

use App\Models\DailyTimeRecord;
use App\Models\SalaryMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DailyTimeRecordController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->get('year', Carbon::now()->year);
        $month = $request->get('month', Carbon::now()->month);

        $query = DailyTimeRecord::with(['user', 'salaryMethod.shift'])
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->orderBy('date', 'desc');

        $records = $query->get();

        // pass list of employees and salary methods for add/edit modal selects
        $employees = User::select('id', 'username', 'name')->where('status', 'active')->get();
        $salaryMethods = SalaryMethod::with('shift')->get();

        return view('dtr.index', compact('records', 'employees', 'salaryMethods', 'year', 'month'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'salary_method_id' => 'nullable|exists:salary_methods,id',
            'activity' => 'required|string|max:255',
            'time' => 'required',
            'status' => 'nullable|in:rest_day,absent,late,under_time,worked',
        ]);

        $validated['created_by'] = auth()->id();

        $record = DailyTimeRecord::create($validated);

        if ($request->expectsJson()) {
            return response()->json($record);
        }

        return redirect()->route('dtr.index')->with('success', 'Time record added.');
    }

    public function edit(DailyTimeRecord $dtr)
    {
        // return a partial or json used by modal; for simplicity return json
        return response()->json($dtr->load(['user','salaryMethod.shift']));
    }

    public function update(Request $request, DailyTimeRecord $dtr)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'salary_method_id' => 'nullable|exists:salary_methods,id',
            'activity' => 'required|string|max:255',
            'time' => 'required',
            'status' => 'nullable|in:rest_day,absent,late,under_time,worked',
        ]);

        $dtr->update($validated);

        return redirect()->route('dtr.index')->with('success', 'Time record updated.');
    }

    public function destroy(DailyTimeRecord $dtr)
    {
        $dtr->delete();

        return redirect()->route('dtr.index')->with('success', 'Time record deleted.');
    }
}
