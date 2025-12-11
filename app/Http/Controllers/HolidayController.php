<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'active');

        $holidays = Holiday::where('status', $status)
            ->orderBy('date', 'desc')
            ->get();

        return view('holidays.index', compact('holidays', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:holidays,name',
            'date' => 'required|date',
            'type' => 'required|in:Regular Holiday,Special (Non-working) holiday,Special (Working) holiday',
        ]);

        Holiday::create([
            'name' => $request->name,
            'date' => $request->date,
            'type' => $request->type,
            'created_by' => auth()->id(),
        ]);

        return back()->with('success', 'Holiday added successfully!');
    }

    public function edit(Holiday $holiday)
    {
        return response()->json($holiday);
    }

    public function update(Request $request, Holiday $holiday)
    {
        $request->validate([
            'name' => 'required|unique:holidays,name,' . $holiday->id,
            'date' => 'required|date',
            'type' => 'required|in:Regular Holiday,Special (Non-working) holiday,Special (Working) holiday',
        ]);

        $holiday->update([
            'name' => $request->name,
            'date' => $request->date,
            'type' => $request->type,
        ]);

        return back()->with('success', 'Holiday updated successfully!');
    }

    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return back()->with('success', 'Holiday deleted permanently!');
    }

    public function archive(Holiday $holiday)
    {
        $holiday->update(['status' => 'archived']);
        return back()->with('success', 'Holiday archived!');
    }

    public function restore(Holiday $holiday)
    {
        $holiday->update(['status' => 'active']);
        return back()->with('success', 'Holiday restored!');
    }
}
