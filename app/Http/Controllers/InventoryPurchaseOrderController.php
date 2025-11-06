<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\InventoryPurchaseOrder;
use App\Models\PoDetail;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryPurchaseOrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'pending'); // default pending

        $purchaseOrders = InventoryPurchaseOrder::with(['user', 'supplier'])
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('inventory_purchase_orders.index', compact('purchaseOrders', 'status'));
    }

    public function create()
    {
        $suppliers = Supplier::where('status', 'active')->get();
        $users = User::where('status', 'active')->get();
        $components = Component::all(); 

        return view('inventory_purchase_orders.create', compact('suppliers', 'users', 'components'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'department' => 'nullable|string|max:255',
            'prf_reference_number' => 'nullable|string|max:255',
            'type_of_request' => 'nullable|string|max:255',
            'select_origin' => 'nullable|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id',
            'components' => 'required|array|min:1',
            'components.*.id' => 'required|exists:components,id',
            'components.*.unit_cost' => 'required|numeric|min:0',
            'components.*.qty' => 'required|integer|min:1',
            'attachment' => 'nullable|file|max:5120', // optional, max 5MB
        ]);

        // 🔹 Status number for PO (for numbering pattern)
        $statusNumber = 1;

        // 🔹 Find last PO
        $lastPo = InventoryPurchaseOrder::where('po_number', 'like', 'PO-' . $statusNumber . '-%')
            ->orderByDesc('id')
            ->first();

        // 🔹 Generate next PO number
        $nextNumber = 1;
        if ($lastPo) {
            $parts = explode('-', $lastPo->po_number);
            $lastSequence = intval(end($parts));
            $nextNumber = $lastSequence + 1;
        }

        $validated['po_number'] = 'PO-' . $statusNumber . '-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
        $validated['status'] = 'pending';

        // 🔹 Handle file upload if exists
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('purchase_orders', 'public');
            $validated['attachment'] = $filePath;
        }

        // 🔹 TAX RATE (changeable)
        $taxRate = 0.12;

        // 🔹 Create the Purchase Order
        $purchaseOrder = InventoryPurchaseOrder::create($validated);

        // 🔹 Loop through components added
        foreach ($request->components as $compData) {
            $component = Component::findOrFail($compData['id']);
            $qty = (int) $compData['qty'];
            $unitCost = (float) $compData['unit_cost'];
            $tax = ($unitCost * $qty) * $taxRate;

            // 🔹 Save to po_details table
            $purchaseOrder->details()->create([
                'component_id' => $component->id,
                'qty' => $qty,
                'unit_cost' => $unitCost,
                'tax' => $tax,
                'sub_total' => $qty * $unitCost,
            ]);

            // 🔹 Update Component cost and onhand
            $component->update([
                'cost' => $unitCost, // update to latest cost
                'onhand' => $component->onhand + $qty, // add new qty to stock
            ]);
        }

        return redirect()->route('inventory_purchase_orders.index')
            ->with('success', 'Purchase Order created successfully with attachment and components updated.');
    }

    public function show($id)
    {
        $purchaseOrder = InventoryPurchaseOrder::with([
            'supplier',
            'user',
            'details.component'
        ])->findOrFail($id);

        return view('inventory_purchase_orders.show', compact('purchaseOrder'));
    }

    public function getDetails($id)
    {
        $po = InventoryPurchaseOrder::with(['details.component', 'user', 'supplier'])
        ->findOrFail($id);

    return response()->json($po);
    }

    public function edit($id)
    {
        $purchaseOrder = InventoryPurchaseOrder::with(['details.component', 'supplier', 'user'])->findOrFail($id);
        $suppliers = Supplier::where('status', 'active')->get();
        $users = User::where('status', 'active')->get();
        $components = Component::all();

        return view('inventory_purchase_orders.edit', compact('purchaseOrder', 'suppliers', 'users', 'components'));
    }

    public function update(Request $request, $id)
    {
        $purchaseOrder = InventoryPurchaseOrder::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'department' => 'nullable|string|max:255',
            'prf_reference_number' => 'nullable|string|max:255',
            'type_of_request' => 'nullable|string|max:255',
            'select_origin' => 'nullable|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        // 🔹 Handle file upload (replace existing if new one is uploaded)
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('purchase_orders', 'public');
            $validated['attachment'] = $filePath;
        }

        $purchaseOrder->update($validated);

        return redirect()->route('inventory_purchase_orders.index')
            ->with('success', 'Purchase Order updated successfully.');
    }

    public function uploadAttachments(Request $request)
    {
        $validated = $request->validate([
            'po_id' => 'required|exists:inventory_purchase_orders,id',
            'attachments.*' => 'required|file|max:5120', // 5MB each
        ]);

        $purchaseOrder = InventoryPurchaseOrder::findOrFail($validated['po_id']);
        $uploadedFiles = [];

        // Handle each uploaded file
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('purchase_order_attachments', 'public');
                $uploadedFiles[] = $path;
            }
        }

        // If you only had 1 attachment before, let's store multiple in JSON
        $existing = $purchaseOrder->attachments ? json_decode($purchaseOrder->attachments, true) : [];
        $allFiles = array_merge($existing, $uploadedFiles);

        $purchaseOrder->update([
            'attachments' => json_encode($allFiles),
        ]);

        return back()->with('success', 'Files attached successfully.');
    }

    public function getAttachments($id)
{
    $po = \App\Models\InventoryPurchaseOrder::findOrFail($id);

    // Make sure we're using the correct column name: `attachments`
    $attachments = [];

    if ($po->attachments) {
        $decoded = json_decode($po->attachments, true);

        if (is_array($decoded)) {
            $attachments = $decoded;
        } else {
            // Handle case where it’s just a string
            $attachments = [$po->attachments];
        }
    }

    return response()->json(['attachments' => $attachments]);
}

public function approve($id)
{
    $po = InventoryPurchaseOrder::findOrFail($id);
    $po->update(['status' => 'approved']);

    return redirect()->route('inventory_purchase_orders.index')
        ->with('success', 'Purchase Order approved successfully.');
}

public function disapprove($id)
{
    $po = InventoryPurchaseOrder::findOrFail($id);
    $po->update(['status' => 'disapproved']);

    return redirect()->route('inventory_purchase_orders.index')
        ->with('warning', 'Purchase Order disapproved.');
}

public function getInvoiceData($id)
{
    $po = \App\Models\InventoryPurchaseOrder::with(['details.component', 'user', 'supplier'])->find($id);

    if (!$po) {
        return response()->json(['message' => 'PO not found'], 404);
    }

    return response()->json($po);
}
}
