<?php

namespace App\Http\Controllers;

use App\Models\WorkLeave;
use Illuminate\Http\Request;

class LeavesController extends Controller
{
    public function index()
    {
        return view('general-settings.workforce.leaves.index');
    }

    public function fetchLeaves(Request $request)
    {
        $query = WorkLeave::with('creator'); // eager load creator relationship

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $leaves = $query->orderBy('created_at', 'desc')
                        ->paginate($request->per_page ?? 10);

        // Transform the data to include creator name
        $leaves->getCollection()->transform(function ($leave) {
            $leave->created_by_name = $leave->creator->name ?? 'System';
            return $leave;
        });

        return response()->json($leaves);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:workforce_leaves,name',
            'notice_period' => 'required|integer|min:0|max:365',
        ]);

        $leave = WorkLeave::create([
            'name' => $validated['name'],
            'notice_period' => $validated['notice_period'],
            'created_by' => auth()->id(),
            'status' => 'active'
        ]);

        return response()->json($leave, 201);
    }

    public function update(Request $request, $id)
    {
        $leave = WorkLeave::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:workforce_leaves,name,' . $id,
            'notice_period' => 'required|integer|min:0|max:365',
        ]);

        $leave->update([
            'name' => $validated['name'],
            'notice_period' => $validated['notice_period']
        ]);

        return response()->json($leave);
    }
    
    public function archive($id)
    {
        $leave = WorkLeave::findOrFail($id);
        $leave->status = 'archived';
        $leave->save();

        return response()->json(['message' => 'Leave archived successfully.']);
    }

    public function restore($id)
    {
        $leave = WorkLeave::findOrFail($id);
        $leave->status = 'active';
        $leave->save();

        return response()->json(['message' => 'Leave restored successfully.']);
    }

    public function destroy($id)
    {
        $leave = WorkLeave::findOrFail($id);
        $leave->delete();

        return response()->json(['message' => 'Leave deleted successfully.']);
    }

}
