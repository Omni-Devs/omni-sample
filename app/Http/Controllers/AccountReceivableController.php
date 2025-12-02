<?php

namespace App\Http\Controllers;

use App\Models\AccountingCategory;
use App\Models\AccountsReceivableDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AccountsReceivables;
use App\Models\AccountsReceivablesPayment;
use App\Models\CashEquivalent;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AccountReceivableController extends Controller
{
    public function index()
    {
        $minYear = AccountsReceivables::min(DB::raw('YEAR(transaction_datetime)'));
        $maxYear = AccountsReceivables::max(DB::raw('YEAR(transaction_datetime)'));

        // Load user relationship for Vue table
        $receivables = AccountsReceivables::with('user')->get();

        return view('accounts-receivable.index', [
            'minYear' => $minYear,
            'maxYear' => $maxYear,
            'receivables' => $receivables,
        ]);
    }

   public function filter(Request $request)
    {
        $query = AccountsReceivables::with([
            'user',
            'branch', 
            'items.type',
            'approvedBy',      // Add this
            'completedBy',     // Add this
            'disapprovedBy',   // Add this
            'archivedBy'       // Add this
        ])
        ->whereYear('transaction_datetime', $request->year);

        if ($request->month !== 'all') {
            $query->whereMonth('transaction_datetime', $request->month);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        return response()->json($query->get()->toArray());
    }

public function create()
{
    // Get the first branch of the current user
    $branch = auth()->user()->branches()->first();

    if (!$branch) {
        abort(403, 'You are not assigned to any branch.');
    }

    // Generate next reference number: AR-{branchId}-00001, AR-{branchId}-00002, etc.
    $prefix = "AR-{$branch->id}-";

    $lastRecord = \App\Models\AccountsReceivables::where('reference_no', 'LIKE', $prefix . '%')
        ->orderByRaw('CAST(SUBSTRING(reference_no, ?) AS UNSIGNED) DESC', [strlen($prefix) + 1])
        ->first();

    $nextNumber = $lastRecord 
        ? ((int) substr($lastRecord->reference_no, strlen($prefix)) + 1) 
        : 1;

    $nextReferenceNo = $prefix . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    return view('accounts-receivable.form', [
        'mode'              => 'create',
        'next_reference_no' => $nextReferenceNo,        // Pass directly to Blade
        'current_branch_id' => $branch->id,
    ]);
}
    
    public function edit($id)
    {
        $receivable = AccountsReceivables::with(['items.type'])->findOrFail($id);

        // Transform items to include category & type name (from the joined 'type' relation)
        $receivable->items = $receivable->items->map(function ($item) {
            $type = $item->type; // This is the AccountingCategory model

            return [
                'id'            => $item->id,
                'type_id'       => $item->type_id,
                'category'      => $type?->category_receivable ?? 'Unknown',
                'type_name'     => $type?->type_receivable ?? 'Unknown',
                'description'   => $item->description,
                'quantity'      => $item->qty,
                'unit_price'    => $item->unit_price,
                'tax'           => $item->tax_id ? 'VAT' : 'NON-VAT', // adjust if you store tax differently
                'tax_amount'    => $item->tax_amount ?? 0,
                'subtotal'      => $item->sub_total ?? ($item->qty * $item->unit_price),
                'total'         => $item->total_amount ?? 0,
            ];
        });

        return view('accounts-receivable.form', [
            'mode'       => 'edit',
            'receivable' => $receivable
        ]);
    }

    public function update(Request $request, $id)
{
    DB::beginTransaction();

    try {
        $receivable = AccountsReceivables::findOrFail($id);

        // Update main receivable record
        $receivable->update([
            'transaction_datetime' => $request->transaction_datetime,
            'payor_name'           => $request->payor_name,
            'company'              => $request->company ?? null,
            'address'              => $request->address ?? null,
            'mobile_no'            => $request->mobile_no ?? null,
            'email'                => $request->email ?? null,
            'tin'                  => $request->tin ?? null,
            'payee_details'        => $request->payee_details,
            'due_date'             => $request->due_date,
            'sub_total'            => $request->sub_total ?? 0,
            'total_tax'            => $request->total_tax ?? 0,
            'total_amount'         => $request->total_amount ?? 0,
            'status' => $request->status ?? 'pending',
        ]);

        // Delete old items
        $receivable->items()->delete();

        // Create new items from summaryList
        if ($request->has('items') && is_array($request->items)) {
            foreach ($request->items as $item) {
                $receivable->items()->create([
                    'type_id'       => $item['type_id'],
                    'description'   => $item['description'],
                    'qty'           => $item['qty'],
                    'unit_price'    => $item['unit_price'],
                    'tax'           => $item['tax'] ?? 'NON-VAT',
                    'tax_amount'    => $item['tax_amount'] ?? 0,
                    'sub_total'     => $item['sub_total'],
                    'total_amount'  => $item['total_amount'],
                ]);
            }
        }

        DB::commit();

        return redirect('/accounts-receivable')
            ->with('success', 'Accounts Receivable updated successfully.');

    } catch (\Exception $e) {
        DB::rollBack();

        \Log::error('AR Update Failed: ' . $e->getMessage(), [
            'request' => $request->all(),
            'id'      => $id
        ]);

        return redirect()->back()
            ->withInput()
            ->with('error', 'Failed to update record. Please try again.');
    }
}

    
    public function getCategories()
    {
        $categories = AccountingCategory::where('mode', 'receivable')
            ->where('status', 'active')
            ->whereNotNull('category_receivable')
            ->distinct()
            ->orderBy('category_receivable')
            ->get(['category_receivable']);

        // Convert to objects with id + name for Vue
        $categories = $categories->map(function($c, $index) {
            return [
                'id' => $index, // you can generate an index id here if needed
                'name' => $c->category_receivable
            ];
        });

        return response()->json($categories);
    }

        public function getTypes(Request $request)
    {
        $types = AccountingCategory::where('mode', 'receivable')
            ->where('status', 'active')
            ->where('category_receivable', $request->category)
            ->whereNotNull('type_receivable')
            ->orderBy('type_receivable')
            ->get(['id', 'type_receivable']); // get real ID for type_id

        $types = $types->map(function($t) {
            return [
                'id' => $t->id,
                'name' => $t->type_receivable
            ];
        });

        return response()->json($types);
    }

    public function store(Request $request)
{
    // VALIDATION
    $validated = $request->validate([
        'transaction_datetime' => 'required|date',
        'payor_name'          => 'required|string|max:255',
        'company'             => 'nullable|string|max:255',
        'address'             => 'nullable|string',
        'mobile_no'           => 'nullable|string|max:50',
        'email'               => 'nullable|email|max:255',
        'tin'                 => 'nullable|string|max:50',
        'payee_details'       => 'required|string|max:255',
        'due_date'            => 'required|date',

        'items'               => 'required|array|min:1',
        'items.*.type_id'     => 'required|exists:accounting_categories,id',
        'items.*.description' => 'required|string',
        'items.*.qty'         => 'required|integer|min:1',
        'items.*.unit_price'  => 'required|numeric|min:0',
        'items.*.tax'         => 'required|in:Vat,Non-Vat,VAT,NON-VAT',
        'items.*.tax_amount'  => 'nullable|numeric|min:0',

        'sub_total'           => 'required|numeric|min:0',
        'total_tax'           => 'required|numeric|min:0',
        'total_amount'        => 'required|numeric|min:0',
    ]);

    // GET USER'S FIRST BRANCH
    $branch = auth()->user()->branches()->first();
    if (!$branch) {
        return response()->json(['message' => 'You are not assigned to any branch.'], 403);
    }

    // GENERATE REFERENCE NUMBER (same logic as in create())
    $prefix = "AR-{$branch->id}-";

    $lastRecord = AccountsReceivables::where('reference_no', 'LIKE', $prefix . '%')
        ->orderByRaw('CAST(SUBSTRING(reference_no, ?) AS UNSIGNED) DESC', [strlen($prefix) + 1])
        ->first();

    $nextNumber = $lastRecord 
        ? ((int) substr($lastRecord->reference_no, strlen($prefix)) + 1) 
        : 1;

    $referenceNo = $prefix . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    // CREATE MAIN RECORD WITH reference_no AND branch_id
    $ar = AccountsReceivables::create([
        'reference_no'         => $referenceNo,           // THIS WAS MISSING
        'branch_id'            => $branch->id,            // ALSO MISSING (important!)
        'transaction_datetime' => $validated['transaction_datetime'],
        'payor_name'           => $validated['payor_name'],
        'company'              => $validated['company'],
        'address'              => $validated['address'],
        'mobile_no'            => $validated['mobile_no'],
        'email'                => $validated['email'],
        'tin'                 => $validated['tin'],
        'payee_details'        => $validated['payee_details'],
        'due_date'             => $validated['due_date'],
        'user_id'              => auth()->id(),
        'transaction_type'     => 'Account Receivables',
        'status'               => 'pending',
        'sub_total'            => $validated['sub_total'],
        'total_tax'            => $validated['total_tax'],
        'total_amount'         => $validated['total_amount'],
        'total_received'       => 0,
        'amount_due'           => $validated['total_amount'],
        'balance'              => $validated['total_amount'],
    ]);

    // CREATE DETAIL ITEMS
    foreach ($validated['items'] as $item) {
        $ar->items()->create([
            'type_id'      => $item['type_id'],
            'description'  => $item['description'],
            'qty'          => $item['qty'],
            'unit_price'   => $item['unit_price'],
            'tax'          => strtoupper($item['tax']),
            'tax_amount'   => $item['tax_amount'] ?? 0,
            'sub_total'    => $item['qty'] * $item['unit_price'],
            'total_amount' => ($item['qty'] * $item['unit_price']) + ($item['tax_amount'] ?? 0),
        ]);
    }

    return response()->json([
        'message'       => 'Accounts Receivable created successfully!',
        'reference_no'  => $referenceNo,
        'id'            => $ar->id,
    ], 201);
}

    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,completed,disapproved,archived'
        ]);

        $receivable = AccountsReceivables::findOrFail($id);
        $user = Auth::user();
        $now = now();
        $newStatus = $request->status;

        // Define allowed transitions (easy to customize)
        $allowed = [
            'pending' => ['approved', 'disapproved', 'completed', 'archived'],
            'approved' => ['completed', 'disapproved', 'archived'],
            'disapproved' => ['pending', 'archived'],           // Can restore to pending
            'archived' => ['pending'],                          // Can restore to pending
            'completed' => [],                                  // Cannot change (final)
        ];

        $from = $receivable->status;

        // Check if transition is allowed
        if (!in_array($newStatus, $allowed[$from] ?? [])) {
            return response()->json([
                'message' => "Cannot change status from '{$from}' to '{$newStatus}'"
            ], 400);
        }

        // Prepare update data
        $updateData = ['status' => $newStatus];

        // Record WHO and WHEN based on new status
        match ($newStatus) {
            'approved' => [
                $updateData['approved_by'] = $user->id,
                $updateData['approved_at'] = $now,
            ],
            'completed' => [
                $updateData['completed_by'] = $user->id,
                $updateData['completed_at'] = $now,
            ],
            'disapproved' => [
                $updateData['disapproved_by'] = $user->id,
                $updateData['disapproved_at'] = $now,
            ],
            'archived' => [
                $updateData['archived_by'] = $user->id,
                $updateData['archived_at'] = $now,
            ],
            'pending' => [
                // Optional: Clear previous action fields when restored
                $updateData['approved_by'] = null,
                $updateData['approved_at'] = null,
                $updateData['completed_by'] = null,
                $updateData['completed_at'] = null,
                $updateData['disapproved_by'] = null,
                $updateData['disapproved_at'] = null,
                $updateData['archived_by'] = null,
                $updateData['archived_at'] = null,
            ],
            default => null,
        };

        $receivable->update($updateData);

        $receivable->load(['approvedBy', 'completedBy', 'disapprovedBy', 'archivedBy']);

        return response()->json([
            'message' => 'Status updated successfully',
            'receivable' => $receivable
        ]);
    }

    public function receivePaymentOptions(): JsonResponse
    {
        // 1. Cash Equivalents: Only active ones
        $cashEquivalents = CashEquivalent::where('status', 'active')
            ->orderBy('name')
            ->get()
            ->map(function ($item) {
                // Format: "BDO Savings - 1234567890" or just "Cash on Hand" if no account number
                $label = $item->name;
                if ($item->account_number) {
                    $label .= ' - ' . $item->account_number;
                }

                return [
                    'id'    => $item->id,
                    'label' => $label,
                    'name'  => $item->name,
                    'account_number' => $item->account_number,
                    'type'  => $item->type_of_account,
                ];
            });

        // 2. Payment Methods: Only active ones
        $paymentMethods = Payment::where('status', 'active')
            ->orderBy('name')
            ->get(['id', 'name'])
            ->map(function ($item) {
                return [
                    'id'    => $item->id,
                    'label' => $item->name,
                ];
            });

        return response()->json([
            'cash_equivalents' => $cashEquivalents,
            'payment_methods'  => $paymentMethods,
        ]);
    }

    public function updatePayment(Request $request, $arId)
    {
        $request->validate([
            'cash_equivalent_id' => 'nullable|exists:cash_equivalents,id',
            'payment_method_id' => 'nullable|exists:payments,id',
            'amount' => 'required|numeric|min:0.01',
            'transaction_datetime' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $ar = AccountsReceivables::findOrFail($arId);

        // Create payment record
        $payment = AccountsReceivablesPayment::create([
            'account_receivable_id' => $arId,
            'cash_equivalent_id' => $request->cash_equivalent_id,
            'payment_method_id' => $request->payment_method_id,
            'amount' => $request->amount,
            'transaction_datetime' => $request->transaction_datetime,
        ]);

        // Update AR totals
        $ar->total_received += $request->amount;
        $ar->balance = $ar->amount_due - $ar->total_received;

        // Auto-update status when fully paid
        if ($ar->balance <= 0) {
            $ar->status = 'Completed';
            $ar->completed_at = now();
            $ar->completed_by = auth()->id();
        }

        $ar->save();

        return response()->json([
            'message' => 'Payment successfully recorded.',
            'payment' => $payment,
            'updated_ar' => [
                'total_received' => $ar->total_received,
                'balance' => $ar->balance,
                'status' => $ar->status,
            ]
        ]);
    }

}
