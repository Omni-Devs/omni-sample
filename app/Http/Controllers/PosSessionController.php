<?php

namespace App\Http\Controllers;

use App\Models\PosSession;
use App\Models\PosSessionSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PosSessionController extends Controller
{
    /**
     * Open a new POS session (cashier starts shift)
     */
    public function openSession(Request $request)
    {
        $validated = $request->validate([
        'branch_id'   => 'required|exists:branches,id',
        'terminal_no' => 'required|string|max:50',
        'cash_fund'   => 'required|numeric|min:0',
    ]);

    // Check if there’s already an open session for this terminal
    $existing = PosSession::where('terminal_no', $validated['terminal_no'])
        ->where('status', 'open')
        ->first();

    if ($existing) {
        return response()->json(['message' => 'There is already an open session for this terminal.'], 409);
    }

    $session = PosSession::create([
        'transaction_date' => now()->toDateString(),
        'transaction_time' => now()->toTimeString(),
        'branch_id'        => $validated['branch_id'],
        'cashier_id'       => auth()->id(),
        'terminal_no'      => $validated['terminal_no'],
        'cash_fund'        => $validated['cash_fund'],
        'status'           => 'open',
    ]);

    return response()->json(['message' => 'POS session opened successfully', 'session' => $session], 201);
    }

    public function checkSession(Request $request)
    {
        $terminalNo = $request->query('terminal_no');

    $session = PosSession::where('terminal_no', $terminalNo)
        ->where('status', 'open')
        ->latest()
        ->first();

    return response()->json([
        'has_open_session' => $session ? true : false,
        'session' => $session,
    ]);
    }

    public function closeSession(Request $request)
{
    $validated = $request->validate([
        'terminal_no'  => 'required|string|max:50',
        'end_cash'     => 'required|numeric|min:0',
        'remarks'      => 'nullable|string|max:255',
    ]);

    $session = PosSession::where('terminal_no', $validated['terminal_no'])
        ->where('status', 'open')
        ->latest()
        ->first();

    if (!$session) {
        return response()->json(['message' => 'No open session found for this terminal.'], 404);
    }

    // Close the session
    $session->update([
        'closed_at' => now(),
        'status' => 'closed', // ✅ ENUM match
    ]);

    // Create summary record
    PosSessionSummary::create([
        'session_id'  => $session->id,
        'cash_sales'  => 0.00,
        'charge_sales'=> 0.00,
        'cash_out'    => 0.00,
        'short_over'  => 0.00,
        'tip'         => 0.00,
    ]);

    return response()->json([
        'message' => 'POS session closed successfully',
        'session' => $session
    ], 200);
}


}
