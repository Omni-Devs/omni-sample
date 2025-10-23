<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'active'); // default active

        $suppliers = Supplier::where('status', $status)
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('suppliers.index', compact('suppliers', 'status'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created supplier in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'mobile_no' => 'nullable|string|max:20',
            'landline_no' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'supplier_since' => 'nullable|date',
            'company' => 'nullable|string|max:255',
            'tin' => 'nullable|string|max:50',
            'supplier_type' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:500',
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    /**
     * Show the form for editing the specified supplier.
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified supplier in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'mobile_no' => 'nullable|string|max:20',
            'landline_no' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'supplier_since' => 'nullable|date',
            'company' => 'nullable|string|max:255',
            'tin' => 'nullable|string|max:50',
            'supplier_type' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:500',
        ]);

        $supplier->update($validated);

        return redirect()->route('suppliers.index')
                ->with('success', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified supplier.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier deleted successfully.');
    }

    /**
     * Move the specified supplier to archive (status change).
     */
    public function archive(Supplier $supplier)
    {
        $supplier->update([
            'status' => 'archived'
        ]);

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier moved to archive successfully.');
    }

    /**
     * Restore a supplier from archive.
     */
    public function restore(Supplier $supplier)
    {
        $supplier->update([
            'status' => 'active'
        ]);

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier restored to active successfully.');
    }
}
