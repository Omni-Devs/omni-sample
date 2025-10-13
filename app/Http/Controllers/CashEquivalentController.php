<?php

namespace App\Http\Controllers;

use App\Models\CashEquivalent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashEquivalentController extends Controller
{
    /**
     * Display a listing of cash equivalents.
     */
    public function index(Request $request)
    {
        $status = $request->get('status', 'active'); // default active

        $cashEquivalents = CashEquivalent::where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('cash_equivalents.index', compact('cashEquivalents', 'status'));
    }

    /**
     * Store a newly created cash equivalent.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'type_of_account'=> 'nullable|string|max:255',
            'conversion_in_peso' => 'nullable|numeric|min:0',
            'created_at'     => 'nullable|date',
        ]);

    // Save logged-in user ID into created_by
    $validated['created_by'] = Auth::id();

        // If created_at is empty, let Laravel default handle it
        if (empty($validated['created_at'])) {
            unset($validated['created_at']);
        }

        $ce = CashEquivalent::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'id'             => $ce->id,
                'name'           => $ce->name,
                'account_number' => $ce->account_number,
                'created_by'     => $ce->creator?->username,
                'created_at'     => $ce->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->route('cash_equivalents.index')->with('success', 'Cash equivalent created successfully.');
    }

    /**
     * Show the form for editing the specified cash equivalent.
     */
    public function edit(CashEquivalent $cash_equivalent)
    {
        return view('cash_equivalents.edit', ['cash_equivalent' => $cash_equivalent]);
    }

    /**
     * Update the specified cash equivalent.
     */
    public function update(Request $request, CashEquivalent $cash_equivalent)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'type_of_account'=> 'nullable|string|max:255',
            'conversion_in_peso' => 'nullable|numeric|min:0',
        ]);

        $cash_equivalent->update($validated);

        return redirect()
            ->route('cash_equivalents.index')
            ->with('success', 'Cash equivalent updated successfully.');
    }

    /**
     * Remove the specified cash equivalent.
     */
    public function destroy(CashEquivalent $cash_equivalent)
    {
        $cash_equivalent->delete();

        return redirect()
            ->route('cash_equivalents.index')
            ->with('success', 'Cash equivalent deleted successfully.');
    }

    /**
     * Move the specified cash equivalent to archive (status change).
     */
    public function archive(CashEquivalent $cash_equivalent)
    {
        $cash_equivalent->update([
            'status' => 'archived'
        ]);

        return redirect()
            ->route('cash_equivalents.index')
            ->with('success', 'Cash equivalent moved to archive successfully.');
    }

    /**
     * Restore a cash equivalent from archive.
     */
    public function restore(CashEquivalent $cash_equivalent)
    {
        $cash_equivalent->update([
            'status' => 'active'
        ]);

        return redirect()
            ->route('cash_equivalents.index')
            ->with('success', 'Cash equivalent restored to active successfully.');
    }
}
