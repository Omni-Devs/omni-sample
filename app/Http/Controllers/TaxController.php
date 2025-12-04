<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaxController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'active');

        $taxes = Tax::with('creator')
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('taxes.index', compact('taxes', 'status'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255', 'unique:taxes,name'],
            'value' => ['required', 'numeric', 'min:0'],
            'type'  => ['required', 'string', 'max:255']
        ]);

        $validated['created_by'] = auth()->id();

        Tax::create($validated);

        return back()->with('success', 'Tax added successfully.');
    }

    public function edit(Tax $tax)
    {
        return response()->json($tax); // Used by AJAX modal
    }

    public function update(Request $request, Tax $tax)
    {
        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255', Rule::unique('taxes', 'name')->ignore($tax->id)],
            'value' => ['required', 'numeric', 'min:0'],
            'type'  => ['required', 'string', 'max:255'],
        ]);

        $tax->update($validated);

        return back()->with('success', 'Tax updated successfully.');
    }

    public function destroy(Tax $tax)
    {
        $tax->delete();
        return back()->with('success', 'Tax deleted permanently.');
    }

    public function archive(Tax $tax)
    {
        $tax->update(['status' => 'archived']);
        return back()->with('success', 'Tax archived successfully.');
    }

    public function restore(Tax $tax)
    {
        $tax->update(['status' => 'active']);
        return back()->with('success', 'Tax restored successfully.');
    }
}
