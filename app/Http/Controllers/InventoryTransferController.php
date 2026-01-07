<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\InventoryTransfer;
use App\Models\InventoryTransferItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryTransferController extends Controller
{
    public function index()
    {
        return view('inventory.transfer.index');
    }
    
    public function fetchTransfers(Request $request)
    {
        $query = InventoryTransfer::with(['sourceBranch', 'destinationBranch', 'requester']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('reference_no', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('transfer_type')) {
            $query->where('transfer_type', $request->transfer_type);
        }

        if ($request->filled('source_id')) {
            $query->where('source_id', $request->source_id);
        }

        if ($request->filled('destination_id')) {
            $query->where('destination_id', $request->destination_id);
        }

        // Sorting with allowed fields
        $allowedSorts = ['id', 'reference_no', 'status', 'created_at', 'updated_at'];
        $sortBy = in_array($request->get('sort_by'), $allowedSorts) ? $request->get('sort_by') : 'created_at';
        $sortDir = $request->get('sort_dir') === 'asc' ? 'asc' : 'desc';

        $transfers = $query->orderBy($sortBy, $sortDir)
                        ->paginate($request->per_page ?? 10);

        $transfers->getCollection()->transform(function ($transfer) {
    $currentBranchId = current_branch_id();

    return [
        'id' => $transfer->id,
        'reference_no' => $transfer->reference_no,
        'requested_by' => $transfer->requester?->name,
        'transfer_type' => $transfer->transfer_type,
        'status' => $transfer->status,
        'requested_datetime' => $transfer->requested_datetime?->format('Y-m-d H:i:s'),
        'source_branch' => $transfer->sourceBranch?->name,
        'destination_branch' => $transfer->destinationBranch?->name,
        'attached_file' => $transfer->attached_file,
        'created_at' => $transfer->created_at->format('Y-m-d H:i:s'),
        'updated_at' => $transfer->updated_at->format('Y-m-d H:i:s'),

        // 🔥 Add this
        'can_approve' => $transfer->canApproveForBranch($currentBranchId),
    ];
});


        return response()->json($transfers);
    }


    public function create(Request $request)
    {
        // Get transfer type (request | send)
        $transferType = $request->get('transfer_type', 'request');

        // Safety check
        if (!in_array($transferType, ['request', 'send'])) {
            abort(404);
        }

         // ✅ ACTIVE branch (from header / session)
        $currentBranchId = current_branch_id();


        // Get next AUTO_INCREMENT value
        $nextId = DB::table('information_schema.TABLES')
            ->where('TABLE_SCHEMA', DB::getDatabaseName())
            ->where('TABLE_NAME', 'inventory_transfers')
            ->value('AUTO_INCREMENT');

        // ✅ Reference prefix logic
        $prefix = $transferType === 'send' ? 'TSO' : 'TR';

        // Example: TSO-01-00023 or TR-01-00023
        $referenceNo = sprintf(
            '%s-%02d-%05d',
            $prefix,
            $currentBranchId,
            $nextId
        );

        // ✅ EXCLUDE current active branch
        $branches = Branch::where('id', '!=', $currentBranchId)
                    ->orderBy('name')
                    ->get(['id', 'name']);

        return view('inventory.transfer.form', [
            'mode' => 'create',
            'transferType' => $transferType,
            'referenceNo' => $referenceNo,
            'branches' => $branches,          // for destination dropdown
            'currentBranchId' => $currentBranchId,
            'transfer' => null,
        ]);
    }

   public function store(Request $request)
{
    // Base rules
    $rules = [
        'reference_no' => 'required|string',
        'requested_datetime' => 'required|date',
        'transfer_type' => 'required|in:request,send',
        'items' => 'required|array|min:1',
        'items.*.product_id' => 'nullable|exists:products,id',
        'items.*.component_id' => 'nullable|exists:components,id',
        'items.*.quantity' => 'required|integer|min:1',
    ];

    // Conditional rules
    if ($request->transfer_type === 'send') {
        $rules['destination_id'] = 'required|exists:branches,id';
    }

    if ($request->transfer_type === 'request') {
        $rules['source_id'] = 'required|exists:branches,id';
    }

    $validated = $request->validate($rules);

    DB::transaction(function () use ($validated) {

        if ($validated['transfer_type'] === 'send') {
            $sourceId = current_branch_id();
            $destinationId = $validated['destination_id'];
        } else {
            $sourceId = $validated['source_id'];
            $destinationId = current_branch_id();
        }

        $transfer = InventoryTransfer::create([
            'reference_no' => $validated['reference_no'],
            'requested_by' => auth()->id(),
            'requested_datetime' => Carbon::parse($validated['requested_datetime']),
            'destination_id' => $destinationId,
            'source_id' => $sourceId,
            'transfer_type' => $validated['transfer_type'],
            'status' => 'pending',
        ]);

        foreach ($validated['items'] as $item) {
            if (
                empty($item['product_id']) === empty($item['component_id'])
            ) {
                throw new \Exception(
                    'Each item must have either product_id or component_id.'
                );
            }

            InventoryTransferItem::create([
                'inventory_transfer_id' => $transfer->id,
                'product_id' => $item['product_id'] ?? null,
                'component_id' => $item['component_id'] ?? null,
                'quantity' => $item['quantity'],
            ]);
        }
    });

    return response()->json(['message' => 'Transfer created successfully']);
}



   public function edit($id)
    {
        // Load transfer with its items and related products/components
        $transfer = InventoryTransfer::with([
            'items.product.category',
            'items.component.category',
        ])->findOrFail($id);

        $currentBranchId = current_branch_id();

        $branches = Branch::where('id', '!=', $currentBranchId)
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('inventory.transfer.form', [
            'mode' => 'edit',
            'transferType' => $transfer->transfer_type,
            'referenceNo' => $transfer->reference_no,
            'requested_datetime' => $transfer->requested_datetime,
            'branches' => $branches,
            'transfer' => $transfer, // contains items with product/component
        ]);
    }

    public function update(Request $request, $id)
{
    $transfer = InventoryTransfer::findOrFail($id);

    $validated = $request->validate([
        'requested_datetime' => 'required|date',
        'transfer_type' => 'required|in:request,send',

        // Conditional branches
        'destination_id' => 'nullable|exists:branches,id',
        'source_id' => 'nullable|exists:branches,id',

        'items' => 'required|array|min:1',
        'items.*.product_id' => 'nullable|exists:products,id',
        'items.*.component_id' => 'nullable|exists:components,id',
        'items.*.quantity' => 'required|integer|min:1',
    ]);

    DB::transaction(function () use ($transfer, $validated) {

        // -------------------------------
        // Determine source & destination
        // -------------------------------
        if ($validated['transfer_type'] === 'send') {
            if (empty($validated['destination_id'])) {
                throw new \Exception('Destination branch is required for send transfers.');
            }

            $sourceId = current_branch_id();
            $destinationId = $validated['destination_id'];

        } else { // request
            if (empty($validated['source_id'])) {
                throw new \Exception('Source branch is required for request transfers.');
            }

            $sourceId = $validated['source_id'];
            $destinationId = current_branch_id();
        }

        // -------------------------------
        // Update transfer
        // -------------------------------
        $transfer->update([
            'requested_datetime' => Carbon::parse($validated['requested_datetime']),
            'source_id' => $sourceId,
            'destination_id' => $destinationId,
        ]);

        // -------------------------------
        // Replace items
        // -------------------------------
        $transfer->items()->delete();

        foreach ($validated['items'] as $item) {

    $productId   = $item['product_id']   ?? null;
    $componentId = $item['component_id'] ?? null;

    // Ensure only one is set
    if (
        (!$productId && !$componentId) ||
        ($productId && $componentId)
    ) {
        throw new \Exception(
            'Each item must have either product_id or component_id, not both.'
        );
    }

    InventoryTransferItem::create([
        'inventory_transfer_id' => $transfer->id,
        'product_id'   => $productId,
        'component_id' => $componentId,
        'quantity'     => $item['quantity'],
    ]);
}

    });

    return response()->json(['message' => 'Transfer updated successfully']);
}

    public function updateStatus(Request $request, $id)
{
    $transfer = InventoryTransfer::findOrFail($id);

    $validated = $request->validate([
        'status' => 'required|in:pending,approved,in_transit,completed,disapproved,archived',
    ]);

    if ($validated['status'] === 'approved') {
        $transfer->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'approved_datetime' => now(),
        ]);
    } else {
        $transfer->update([
            'status' => $validated['status'],
            'approved_by' => null,
            'approved_datetime' => null,
        ]);
    }

    // Refresh model and load approver relation
    $transfer->refresh()->load('approver');

    // Format approved_datetime to 12-hour format
    $approvedTime = $transfer->approved_datetime 
        ? Carbon::parse($transfer->approved_datetime)->format('g:i A') 
        : null;

    return response()->json([
        'message' => 'Transfer status updated successfully',
        'status' => $transfer->status,
        'approved_by_name' => $transfer->approver?->name,
        'approved_datetime' => $approvedTime,
    ]);
}
}
