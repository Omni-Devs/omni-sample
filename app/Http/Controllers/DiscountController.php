<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Payment;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of discounts.
     */
    public function index(Request $request)
    {
        $status = $request->get('status', 'active'); // default active

        $discounts = Discount::where('status', $status)
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('discounts.index', compact('discounts', 'status'));
    }


    /**
     * Store a newly created payment.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'type'       => 'required|string|max:100',
            'value'      => 'required|numeric|min:0',
            'created_at' => 'nullable|date',
        ]);

        $validated['created_by'] = auth()->id();

        // If created_at is empty, let Laravel default handle it
        if (empty($validated['created_at'])) {
            unset($validated['created_at']);
        }

        $discount = Discount::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'id'         => $discount->id,
                'name'       => $discount->name,
                'type'       => $discount->type,
                'value'      => $discount->value,
                'created_by' => $discount->creator?->username,
                'created_at' => $discount->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }


    /**
     * Show the form for editing the specified discount.
     */
    public function edit(Discount $discount)
    {
        return view('discounts.edit', compact('discount'));
    }

    /**
     * Update the specified discount.
     */
    public function update(Request $request, Discount $discount)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'type'  => 'required|string|max:100',
            'value' => 'required|numeric|min:0',
        ]);

        $discount->update($validated);

        return redirect()
            ->route('discounts.index')
            ->with('success', 'Discount updated successfully.');
    }

    /**
     * Remove the specified discount.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()
            ->route('discounts.index')
            ->with('success', 'Discount deleted successfully.');
    }

    /**
     * Move the specified discount to archive (status change).
     */
    public function archive(Discount $discount)
    {
        $discount->update([
            'status' => 'archived'
        ]);

        return redirect()
            ->route('discounts.index')
            ->with('success', 'Discount moved to archive successfully.');
    }

    /**
     * Restore a discount from archive.
     */
    public function restore(Discount $discount)
    {
        $discount->update([
            'status' => 'active'
        ]);

        return redirect()
            ->route('discounts.index')
            ->with('success', 'Discount restored to active successfully.');
    }
}
