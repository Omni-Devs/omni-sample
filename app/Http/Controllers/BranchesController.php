<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function index()
    {
        $status = request('status', 'active');

        if ($status === 'archived') {
            $branches = Branch::where('status', 'archived')->get();
        } else {
            // default to active (also handles 'active' and other non-archived states)
            $branches = Branch::where('status', 'active')->get();
        }

        // counts for dashboard cards
        $totalBranches = Branch::count();
        $activeBranches = Branch::where('status', 'active')->count();

        return view('branches.index', compact('branches', 'status', 'totalBranches', 'activeBranches'));
    }
    
    public function create()
    {
        return view('branches.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'phone_number'    => 'nullable|string|max:20',
            'mobile_number'   => 'required|string|max:20',
            'email'    => 'required|email|unique:branches,email',
            'tin'      => 'nullable|string|max:50',
            'address'  => 'nullable|string|max:500',
            'contact_person' => 'nullable|string|max:255',
            'permit_number'   => 'nullable|string|max:100',
            'dti_issued'      => 'nullable|string|max:100',
            'pos_sn'          => 'nullable|string|max:100',
            'min_number'      => 'nullable|string|max:100',
            'status'         => 'nullable|in:active,archived',
        ]);

        // ensure status defaults to active when creating from the index modal
        if (empty($validated['status'])) {
            $validated['status'] = 'active';
        }

        Branch::create($validated);

        return redirect()->back()->with('success', 'Branch added successfully.');
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('branches.index', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'phone_number'    => 'nullable|string|max:20',
            'mobile_number'   => 'required|string|max:20',
            'email'    => 'required|email|unique:branches,email,' . $branch->id,
            'tin'      => 'nullable|string|max:50',
            'address'  => 'nullable|string|max:500',
            'contact_person' => 'nullable|string|max:255',
            'permit_number'   => 'nullable|string|max:100',
            'dti_issued'      => 'nullable|string|max:100',
            'pos_sn'          => 'nullable|string|max:100',
            'min_number'      => 'nullable|string|max:100',
        ]);

        $branch->update($validated);

        return redirect()->back()->with('success', 'Branch updated successfully.');
    }

    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        // permanent delete
        $branch->delete();

        return redirect()->back()->with('success', 'Branch deleted successfully.');
    }

    /**
     * Move branch to archived status
     */
    public function archive(Branch $branch)
    {
        $branch->update(['status' => 'archived']);
        return redirect()->back()->with('success', 'Branch moved to archive.');
    }

    /**
     * Restore branch from archived to active
     */
    public function restore(Branch $branch)
    {
        $branch->update(['status' => 'active']);
        return redirect()->back()->with('success', 'Branch restored to active.');
    }
}
