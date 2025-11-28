<?php

namespace App\Http\Controllers;

use App\Models\AccountingCategory;
use App\Models\AccountsReceivableDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AccountsReceivables;

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
        $query = AccountsReceivables::with(['user', 'items.type']) // <-- load type here
            ->whereYear('transaction_datetime', $request->year);

        if ($request->month !== 'all') {
            $query->whereMonth('transaction_datetime', $request->month);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        return response()->json($query->get());
    }

    public function create()
    {
        return view('accounts-receivable.form');
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
        // ✅ VALIDATION
        $validated = $request->validate([
            // Step 1 (Parent)
            'transaction_datetime' => 'required|date',
            'reference_no'        => 'required|string|max:100',
            'payor_name'          => 'required|string|max:255',
            'company'             => 'nullable|string|max:255',
            'address'             => 'nullable|string',
            'mobile_no'           => 'nullable|string|max:50',
            'email'               => 'nullable|email|max:255',
            'tin'                 => 'nullable|string|max:50',
            'payee_details'       => 'required|string|max:255',
            'due_date'            => 'required|date',

            // Step 2 (Child)
            'items'               => 'required|array',
            'items.*.type_id'     => 'required|exists:accounting_categories,id',
            'items.*.description' => 'required|string',
            'items.*.qty'         => 'required|integer|min:1',
            'items.*.unit_price'  => 'required|numeric|min:0',
            'items.*.tax_id'      => 'nullable|exists:taxes,id',
            'items.*.tax_amount'  => 'required|numeric|min:0',

            'sub_total'           => 'required|numeric|min:0',
            'total_amount'        => 'required|numeric|min:0',
            'attachments'         => 'nullable|array',
        ]);

        // ✅ 1. Save PARENT (Step 1)
        $parent = AccountsReceivables::create([
            'transaction_datetime' => $validated['transaction_datetime'],
            'reference_no'        => $validated['reference_no'],
            'payor_name'          => $validated['payor_name'],
            'company'             => $validated['company'] ?? null,
            'address'             => $validated['address'] ?? null,
            'mobile_no'           => $validated['mobile_no'] ?? null,
            'email'               => $validated['email'] ?? null,
            'tin'                 => $validated['tin'] ?? null,
            'payee_details'       => $validated['payee_details'],
            'due_date'            => $validated['due_date'],
            'user_id'              => auth()->id(),
            'transaction_type'    => 'Account Receivables',
            'status'              => 'pending',
            'total_received'      => 0,
            'amount_due'          => $validated['total_amount'],
            'balance'             => $validated['total_amount'],
        ]);

        // ✅ 2. Save CHILD (Step 2) - loop through items
        $details = [];
        foreach ($validated['items'] as $item) {
            $details[] = AccountsReceivableDetail::create([
                'accounts_receivable_id' => $parent->id,
                'type_id'       => $item['type_id'],
                'description'   => $item['description'],
                'qty'           => $item['qty'],
                'unit_price'    => $item['unit_price'],
                'tax_id'        => $item['tax_id'] ?? null,
                'tax_amount'    => $item['tax_amount'],
                'sub_total'     => $item['qty'] * $item['unit_price'],
                'total_amount'  => ($item['qty'] * $item['unit_price']) + $item['tax_amount'],
                'attachments'   => $validated['attachments'] ?? [],
            ]);
        }

        // ✅ 3. Return full response
        return response()->json([
            'message' => 'Accounts Receivable successfully created',
            'parent'  => $parent,
            'details' => $details,
        ], 201);
    }


}
