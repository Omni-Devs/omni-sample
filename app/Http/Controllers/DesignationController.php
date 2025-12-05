<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'active'); // default active

        $designations = Designation::where('status', $status)
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('designations.index', compact('designations', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        Designation::create([
            'name' => $request->name,
            'status' => 'active',
            'created_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Designation created successfully.');
    }

    public function edit(Designation $designation)
    {
        return response()->json($designation);
    }

    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'name' => 'required|unique:designations,name,' . $designation->id,
        ]);

        $designation->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Designation updated successfully.');
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();
        return redirect()->back()->with('success', 'Designation deleted successfully.');
    }

    public function archive(Designation $designation)
    {
        $designation->update(['status' => 'archived']);
        return redirect()->back()->with('success', 'Designation archived.');
    }

    public function restore(Designation $designation)
    {
        $designation->update(['status' => 'active']);
        return redirect()->back()->with('success', 'Designation restored.');
    }
}
