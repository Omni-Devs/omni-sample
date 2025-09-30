<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of payments.
     */
    public function index(Request $request)
    {
        $status = $request->get('status', 'active'); // default active

        $payments = Payment::where('status', $status)
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('payments.index', compact('payments', 'status'));
    }

    /**
     * Store a newly created payment.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'created_at' => 'nullable|date',
        ]);

        // Save logged-in user ID into created_by
        $validated['created_by'] = auth()->id();

        // If created_at is empty, let Laravel default handle it
        if (empty($validated['created_at'])) {
            unset($validated['created_at']);
        }

        $payment = Payment::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'id'         => $payment->id,
                'name'       => $payment->name,
                'created_by' => $payment->creator?->username,
                'created_at' => $payment->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    /**
     * Show the form for editing the specified payment.
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified payment.
     */
    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $payment->update($validated);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified payment.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment deleted successfully.');
    }

    /**
     * Move the specified payment to archive (status change).
     */
    public function archive(Payment $payment)
    {
        $payment->update([
            'status' => 'archived'
        ]);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment moved to archive successfully.');
    }

    /**
     * Restore a payment from archive.
     */
    public function restore(Payment $payment)
    {
        $payment->update([
            'status' => 'active'
        ]);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment restored to active successfully.');
    }
}
