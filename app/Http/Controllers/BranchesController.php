<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
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
        ]);

        Branch::create($validated);

        return redirect()->back()->with('success', 'Branch added successfully.');
    }
}
