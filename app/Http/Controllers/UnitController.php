<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $status = request()->get('status', 'active');

        $units = Unit::where('status', $status)
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('units.index', compact('units', 'status'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'created_at' => 'nullable|date',
        ]);

        // Save logged-in user ID into created_by
        $validated['created_by'] = auth()->id();

        // If created_at is empty, let Laravel default handle it
        if (empty($validated['created_at'])) {
            unset($validated['created_at']);
        }

        $unit = Unit::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'id'         => $unit->id,
                'name'       => $unit->name,
                'created_by' => $unit->creator?->username,
                'created_at' => $unit->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->route('units.index')->with('success', 'Unit created successfully.');
    }

    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    public function update(Request $request, Unit $unit)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'created_at' => 'nullable|date',
        ]);

        // If created_at is empty, keep existing timestamp
        if (empty($validated['created_at'])) {
            unset($validated['created_at']);
        }

        $unit->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'id'         => $unit->id,
                'name'       => $unit->name,
                'created_by' => $unit->creator?->username,
                'created_at' => $unit->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->route('units.index')->with('success', 'Unit updated successfully.');
    }

    /**
     * Move the specified Unit to archive (status change).
     */
    public function archive(Unit $unit)
    {
        $unit->update([
            'status' => 'archived'
        ]);

        return redirect()
            ->route('units.index')
            ->with('success', 'Unit moved to archive successfully.');
    }

    /**
     * Restore a unit from archive.
     */
    public function restore(Unit $unit)
    {
        $unit->update([
            'status' => 'active'
        ]);

        return redirect()
            ->route('units.index')
            ->with('success', 'Unit restored to active successfully.');
    }
}
