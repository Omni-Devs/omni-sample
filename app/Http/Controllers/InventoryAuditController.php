<?php

namespace App\Http\Controllers;

use App\Models\InventoryAudit;
use App\Models\InventoryAuditItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryAuditController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->input('year', null);
        $month = $request->input('month', 'All Months');
        $type = $request->input('type', 'Products');

        $query = InventoryAudit::query();

        // Filter by year
        if ($year && $year !== 'All Years') {
            $query->whereYear('entry_datetime', $year);
        }

        // Filter by month (convert to number)
        if ($month && $month !== 'All Months') {
            $monthNum = date('m', strtotime($month));
            $query->whereMonth('entry_datetime', $monthNum);
        }

        // Filter by type
        if ($type && $type !== 'All') {
            $query->where('type', strtolower($type));
        }

        $audits = $query->orderBy('entry_datetime', 'desc')->get();

        // Get all years in table (distinct) for dropdown
        $yearOptions = InventoryAudit::selectRaw('DISTINCT YEAR(entry_datetime) as year')
            ->orderBy('year', 'asc')
            ->pluck('year')
            ->map(fn($y) => ['label' => $y, 'value' => $y])
            ->toArray();

        return view('inventory_audit.index', compact('audits', 'year', 'month', 'type', 'yearOptions'));
    }

    public function fetchAudits(Request $request)
    {
        $year = $request->input('year', null);
        $month = $request->input('month', 'All Months');
        $type = $request->input('type', 'Products');

        $query = InventoryAudit::query();

        // Filter by year
        if ($year && $year !== 'All Years') {
            $query->whereYear('entry_datetime', $year);
        }

        // Filter by month
        if ($month && $month !== 'All Months') {
            $monthNum = date('m', strtotime($month));
            $query->whereMonth('entry_datetime', $monthNum);
        }

        // Filter by type
        if ($type && $type !== 'All') {
            $query->where('type', strtolower($type));
        }

        $audits = $query->orderBy('entry_datetime', 'desc')->get();

        return response()->json([
            'audits' => $audits
        ]);
    }


    public function create()
    {
        $users = User::all(['id', 'name']);

        $products = Product::with([
            'category:id,name',
            'subcategory:id,name' // make sure your Product model has a subcategory() relation
        ])
        ->select('id', 'code', 'name', 'status', 'category_id', 'subcategory_id')
        ->get();

    return view('inventory_audit.create', compact('users', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'reference_no' => 'required|string|max:255|unique:inventory_audits,reference_no',
        'audited_by' => 'required|exists:users,id',
        'type' => 'required|in:products,components,consumables,assets',
        'entry_datetime' => 'nullable|date',
        'audit_datetime' => 'nullable|date',
        'remarks' => 'nullable|string',
        'items' => 'required|array|min:1',
        'items.*.product_id' => 'required|exists:products,id',
        'items.*.quantity' => 'required|numeric|min:0',
    ]);

    DB::transaction(function () use ($request) {

        // 1️⃣ Create the main audit record
        $audit = InventoryAudit::create([
            'reference_no' => $request->reference_no,
            'audited_by' => $request->audited_by,
            'type' => $request->type,
            'entry_datetime' => $request->entry_datetime,
            'audit_datetime' => $request->audit_datetime,
            'remarks' => $request->remarks,
        ]);

        // 2️⃣ Insert each product as an audit item
        foreach ($request->items as $item) {
            InventoryAuditItem::create([
                'inventory_audit_id' => $audit->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);
        }
    });

    return response()->json([
        'message' => 'Inventory audit successfully recorded.',
    ]);
  }
}
