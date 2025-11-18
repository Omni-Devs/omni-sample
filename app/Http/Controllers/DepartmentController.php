<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    /**
     * Display a listing of departments.
     */
    public function index(Request $request)
    {
        $status = $request->get('status', 'active'); // default active

        $departments = Department::where('status', $status)
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('departments.index', compact('departments', 'status'));
    }

    /**
     * Store a newly created department.
     */
    public function store(Request $request)
        {
            $validated = $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    'unique:departments,name'
                ],
                'created_at' => 'nullable|date',
            ], [
                'name.unique' => 'exact-name-exists'
            ]);

            // Save logged-in user ID into created_by
            $validated['created_by'] = auth()->id();

            // If created_at is empty, let Laravel default handle it
            if (empty($validated['created_at'])) {
                unset($validated['created_at']);
            }

            $department = Department::create($validated);

            if ($request->expectsJson()) {
                return response()->json([
                    'id'         => $department->id,
                    'name'       => $department->name,
                    'created_by' => $department->creator?->username,
                    'created_at' => $department->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            return redirect()->route('departments.index')->with('success', 'Department created successfully.');
        }

    /**
     * Show the form for editing the specified department.
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified department.
     */
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('departments', 'name')->ignore($department->id),
            ],
            'created_at' => 'nullable|date',
        ], [
            'name.unique' => 'exact-name-exists'
        ]);

        // If created_at is empty, don't update it
        if (empty($validated['created_at'])) {
            unset($validated['created_at']);
        }

        $department->update($validated);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified department.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department deleted successfully.');
    }

    /**
     * Move the specified department to archive (status change).
     */
    public function archive(Department $department)
    {
        $department->update([
            'status' => 'archived'
        ]);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department moved to archive successfully.');
    }

    /**
     * Restore a department from archive.
     */
    public function restore(Department $department)
    {
        $department->update([
            'status' => 'active'
        ]);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department restored to active successfully.');
    }
}