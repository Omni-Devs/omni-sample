<?php

namespace App\Http\Controllers;

use App\Models\WorkforceAllowance;
use Illuminate\Http\Request;

class AllowancesController extends Controller
{
    public function index()
    {
        return view('general-settings.workforce.allowances.index');
    }
    public function fetchAllowances(Request $request)
    {
        $query = WorkforceAllowance::with('creator');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $allowances = $query->orderBy('created_at', 'desc')
                        ->paginate($request->per_page ?? 10);

        // Transform the data to include creator name
        $allowances->getCollection()->transform(function ($allowance) {
            $allowance->created_by_name = $allowance->creator->name ?? 'System';
            return $allowance;
        });

        return response()->json($allowances);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:workforce_allowances,name',
        ]);

        $allowance = WorkforceAllowance::create([
            'name' => $validated['name'],
            'created_by' => auth()->id(),
            'status' => 'active'
        ]);

        return response()->json($allowance, 201);
    }

    public function update(Request $request, $id)
    {
        $allowance = WorkforceAllowance::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:workforce_allowances,name,' . $allowance->id,
        ]);

        $allowance->update([
            'name' => $validated['name'],
        ]);

        return response()->json($allowance);
    }

    public function archive($id)
    {
        $allowance = WorkforceAllowance::findOrFail($id);
        $allowance->update(['status' => 'archived']);

        return response()->json(['message' => 'Allowance archived successfully.']);
    }

    public function restore($id)
    {
        $allowance = WorkforceAllowance::findOrFail($id);
        $allowance->update(['status' => 'active']);

        return response()->json(['message' => 'Allowance restored successfully.']);
    }

    public function destroy($id)
    {
        $allowance = WorkforceAllowance::findOrFail($id);
        $allowance->delete();

        return response()->json(['message' => 'Allowance deleted successfully.']);
    }
}
