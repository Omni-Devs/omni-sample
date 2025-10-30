<?php

namespace App\Http\Controllers;

use App\Models\CashAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosSessionController extends Controller
{
    /**
     * 🔹 Open a new cash audit session (cashier starts shift)
     */
    public function openSession(Request $request)
    {
        $validated = $request->validate([
            'branch_id'   => 'required|exists:branches,id',
            'terminal_no' => 'required|string|max:50',
            'cash_fund'   => 'required|numeric|min:0',
        ]);

        // 🛑 Check if there’s already an open session for this terminal
        $existing = CashAudit::where('branch_id', $validated['branch_id'])
            ->where('terminal_no', $validated['terminal_no'])
            ->where('status', 'open')
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'There is already an open session for this terminal.',
            ], 409);
        }

        // 🧾 Create new session record
        $session = CashAudit::create([
            'transaction_date' => now()->toDateString(),
            'transaction_time' => now()->toTimeString(),
            'branch_id'        => $validated['branch_id'],
            'cashier_id'       => auth()->id(),
            'terminal_no'      => $validated['terminal_no'],
            'starting_fund'    => $validated['cash_fund'],
            'status'           => 'open',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Cash audit session opened successfully.',
            'session' => $session,
        ], 201);
    }

    /**
     * 🔍 Check if there’s an active (open) cash audit session for this terminal
     */
    public function checkSession(Request $request)
    {
        $terminalNo = $request->query('terminal_no');

        $session = CashAudit::where('terminal_no', $terminalNo)
            ->where('status', 'open')
            ->latest()
            ->first();

        if (!$session) {
            return response()->json([
                'has_open_session' => false,
                'session' => null,
            ]);
        }

        return response()->json([
            'has_open_session' => true,
            'session' => [
                'id' => $session->id,
                'branch_id' => $session->branch_id,
                'terminal_no' => $session->terminal_no,
                'cashier_id' => $session->cashier_id,
                'starting_fund' => $session->starting_fund,
                'status' => $session->status,
                'transaction_date' => $session->transaction_date,
            ],
        ]);
    }

    /**
     * 🔒 Close the current cash audit session
     */
    public function closeSession(Request $request)
    {
        $validated = $request->validate([
            'branch_id'        => 'required|integer',
            'terminal_no'      => 'required|string|max:50',
            'transaction_date' => 'required|date',
            'transaction_time' => 'required',
            'starting_fund'    => 'nullable|numeric',
            'cash_sales'       => 'nullable|numeric',
            'gcash_sales'      => 'nullable|numeric',
            'bdo_sales'        => 'nullable|numeric',
            'bpi_sales'        => 'nullable|numeric',
            'tip'              => 'nullable|numeric',
            'shortage'         => 'nullable|numeric',
            'overage'          => 'nullable|numeric',
            'transfer_to'      => 'nullable|string|max:100',
            'transfer_amount'  => 'nullable|numeric',
            'remarks'          => 'nullable|string|max:500',

            // 💰 Denomination breakdown
            'd_1000' => 'nullable|integer|min:0',
            'd_500'  => 'nullable|integer|min:0',
            'd_200'  => 'nullable|integer|min:0',
            'd_100'  => 'nullable|integer|min:0',
            'd_50'   => 'nullable|integer|min:0',
            'd_20'   => 'nullable|integer|min:0',
            'd_10'   => 'nullable|integer|min:0',
            'd_5'    => 'nullable|integer|min:0',
            'd_1'    => 'nullable|integer|min:0',
            'd_050'  => 'nullable|integer|min:0',
            'd_025'  => 'nullable|integer|min:0',
            'd_010'  => 'nullable|integer|min:0',
            'd_005'  => 'nullable|integer|min:0',
        ]);

        DB::beginTransaction();

        try {
            // ✅ 1. Find the currently open session
            $session = CashAudit::where('branch_id', $validated['branch_id'])
                ->where('terminal_no', $validated['terminal_no'])
                ->where('status', 'open')
                ->latest('id')
                ->first();

            if (!$session) {
                return response()->json([
                    'success' => false,
                    'message' => 'No open cash audit session found for this terminal.',
                ], 404);
            }

            // ✅ 2. Compute total cash counted based on denominations
            $totalCashCounted = (
                ($validated['d_1000'] ?? 0) * 1000 +
                ($validated['d_500'] ?? 0) * 500 +
                ($validated['d_200'] ?? 0) * 200 +
                ($validated['d_100'] ?? 0) * 100 +
                ($validated['d_50'] ?? 0) * 50 +
                ($validated['d_20'] ?? 0) * 20 +
                ($validated['d_10'] ?? 0) * 10 +
                ($validated['d_5'] ?? 0) * 5 +
                ($validated['d_1'] ?? 0) * 1 +
                ($validated['d_050'] ?? 0) * 0.5 +
                ($validated['d_025'] ?? 0) * 0.25 +
                ($validated['d_010'] ?? 0) * 0.10 +
                ($validated['d_005'] ?? 0) * 0.05
            );

            // ✅ 3. Compute total sales
            $totalSales = 
                ($validated['cash_sales'] ?? 0) +
                ($validated['gcash_sales'] ?? 0) +
                ($validated['bdo_sales'] ?? 0) +
                ($validated['bpi_sales'] ?? 0);

            // ✅ 3. Update session with closing data
            $session->update([
                'transaction_date'   => $validated['transaction_date'],
                'transaction_time'   => $validated['transaction_time'],
                'cash_sales'         => $validated['cash_sales'] ?? 0,
                'gcash_sales'        => $validated['gcash_sales'] ?? 0,
                'bdo_sales'          => $validated['bdo_sales'] ?? 0,
                'bpi_sales'          => $validated['bpi_sales'] ?? 0,
                'total_sales'        => $totalSales,
                'tip'                => $validated['tip'] ?? 0,
                'shortage'           => $validated['shortage'] ?? 0,
                'overage'            => $validated['overage'] ?? 0,
                'transfer_to'        => $validated['transfer_to'] ?? null,
                'transfer_amount'    => $validated['transfer_amount'] ?? 0,
                'remarks'            => $validated['remarks'] ?? '',
                'status'             => 'closed',
                'closed_at'          => now(),
                'd_1000'             => $validated['d_1000'] ?? null,
                'd_500'              => $validated['d_500'] ?? null,
                'd_200'              => $validated['d_200'] ?? null,
                'd_100'              => $validated['d_100'] ?? null,
                'd_50'               => $validated['d_50'] ?? null,
                'd_20'               => $validated['d_20'] ?? null,
                'd_10'               => $validated['d_10'] ?? null,
                'd_5'                => $validated['d_5'] ?? null,
                'd_1'                => $validated['d_1'] ?? null,
                'd_050'              => $validated['d_050'] ?? null,
                'd_025'              => $validated['d_025'] ?? null,
                'd_010'              => $validated['d_010'] ?? null,
                'd_005'              => $validated['d_005'] ?? null,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Cash audit session closed successfully!',
                'session_id' => $session->id,
                'total_cash_counted' => $totalCashCounted,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error closing cash audit session: ' . $e->getMessage(),
            ], 500);
        }
    }


}
