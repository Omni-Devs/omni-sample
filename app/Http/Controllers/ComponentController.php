<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Component;
use App\Models\InventoryAudit;
use App\Models\InventoryAuditItem;
use App\Models\Subcategory;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComponentController extends Controller
{
    // public function index(Request $request)
    // {
    // $status = $request->get('status', 'active');
    // $perPage = $request->get('perPage', 10);
    // $search = $request->get('search'); // ✅ get the search input

    // $components = Component::with(['category', 'subcategory'])
    //     ->where('status', $status)
    //     ->when($search, function ($query, $search) {
    //         $query->where(function ($q) use ($search) {
    //             $q->where('name', 'like', "%{$search}%")
    //               ->orWhereHas('category', function ($q) use ($search) {
    //                   $q->where('name', 'like', "%{$search}%");
    //               })
    //               ->orWhereHas('subcategory', function ($q) use ($search) {
    //                   $q->where('name', 'like', "%{$search}%");
    //               });
    //         });
    //     })
    //     ->orderBy('created_at', 'desc')
    //     ->paginate($perPage)
    //     ->appends(['search' => $search, 'perPage' => $perPage]); // ✅ keep search and perPage on pagination links

    // return view('components.index', compact('components', 'status', 'search'));
    // }

    public function index(Request $request)
{

    return view('components.index', [
        'status' => $request->get('status', 'active'),
    ]);
}

public function fetchComponents(Request $request)
{
    $status   = $request->get('status', 'active');
    $perPage  = $request->get('perPage', 10);
    $search   = $request->get('search');
    $branchId = current_branch_id();

    /**
     |--------------------------------------------------
     | MAIN BRANCH
     |--------------------------------------------------
     */
    if ($branchId == 1) {

        $query = Component::with(['category', 'subcategory'])
            ->where('status', $status);

    /**
     |--------------------------------------------------
     | OTHER BRANCHES
     |--------------------------------------------------
     */
    } else {

        $query = Component::query()
            ->select([
                'components.*',
                'bc.onhand',
                'bc.cost',
                'bc.price',
                'bc.unit',
                'bc.for_sale',
                'bc.status as status'
            ])
            ->join('branch_components as bc', 'bc.component_id', '=', 'components.id')
            ->where('bc.branch_id', $branchId)
            ->where('components.status', $status)
            ->with(['category', 'subcategory']);
    }

    /**
     |--------------------------------------------------
     | SEARCH FILTER
     |--------------------------------------------------
     */
    $query->when($search, function ($query) use ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('components.name', 'like', "%{$search}%")
              ->orWhereHas('category', fn ($q) =>
                  $q->where('name', 'like', "%{$search}%")
              )
              ->orWhereHas('subcategory', fn ($q) =>
                  $q->where('name', 'like', "%{$search}%")
              );
        });
    });

    /**
     |--------------------------------------------------
     | SORT & PAGINATION
     |--------------------------------------------------
     */
    $components = $query
        ->orderBy('components.created_at', 'desc')
        ->paginate($perPage);

    return response()->json($components);
}

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        $subcategories = Subcategory::all();
        $suppliers = Supplier::where('status', 'active')->get();

        return view('components.create', compact('categories', 'subcategories', 'suppliers'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string',
            'code'          => 'required|string|unique:components,code',
            'category_id'   => 'required|integer|exists:categories,id',
            'subcategory_id'=> 'nullable|integer|exists:subcategories,id',
            'supplier_id'   => 'nullable|integer|exists:suppliers,id',
            'cost'          => 'required|numeric',
            'price'         => 'required|numeric',
            'unit'          => 'required|string',
            'onhand'        => 'required|integer',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'for_sale'      => 'nullable|boolean',
        ]);

        $validated['for_sale'] = $request->has('for_sale') ? 1 : 0;

        // ✅ Handle single image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('components', 'public');
        }

        Component::create($validated);

        return redirect()->route('components.index')->with('success', 'Component created successfully.');
    }

    public function edit($id)
    {
        // eager load recipes so the view can pre-fill rows
        $component = Component::with('recipes')->findOrFail($id);

        // pass categories, subcategories and components to the edit view
        $categories = Category::where('status', 'active')->get();
        $subcategories = Subcategory::all();
        $components = Component::all();
        $suppliers = Supplier::where('status', 'active')->get();

        return view('components.edit', compact('component', 'categories', 'subcategories', 'components', 'suppliers'));
    }

    public function update(Request $request, Component $component)
    {
        $validated = $request->validate([
            'code'        => 'required|string|unique:components,code,' . $component->id,
            'name'        => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'subcategory_id' => 'nullable|integer|exists:subcategories,id',
            'supplier_id'     => 'nullable|integer|exists:suppliers,id',
            'cost'        => 'required|numeric',
            'price'       => 'required|numeric',
            'unit'        => 'required|string',
            'onhand'      => 'required|numeric',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'for_sale'    => 'nullable|boolean',
        ]);

        $validated['for_sale'] = $request->has('for_sale') ? 1 : 0;

        // ✅ Replace old image if new one is uploaded
        if ($request->hasFile('image')) {
            if ($component->image && Storage::disk('public')->exists($component->image)) {
                Storage::disk('public')->delete($component->image);
            }
            $validated['image'] = $request->file('image')->store('components', 'public');
        }

        $component->update($validated);

        return redirect()->route('components.index')->with('success', 'Component updated successfully!');
    }

    public function destroy($id)
    {
        $component = Component::findOrFail($id);
        $component->delete();

        return redirect()->route('components.index')->with('success', 'Component deleted successfully.');
    }

    /**
     * Move the specified Component to archive (status change).
     */
    public function archive(Component $component)
    {
        $component->update([
            'status' => 'archived'
        ]);

        return redirect()
            ->route('components.index')
            ->with('success', 'Unit moved to archive successfully.');
    }

    /**
     * Restore a component from archive.
     */
    public function restore(Component $component)
    {
        $component->update([
            'status' => 'active'
        ]);

        return redirect()
            ->route('components.index')
            ->with('success', 'Component restored to active successfully.');
    }

  public function stockCard($id)
{
    $component = Component::findOrFail($id);

    $movements = collect();

    /* -------------------------------------------------------------
     | 1) AUDITS (ONLY COMPLETED)
     ------------------------------------------------------------- */
    $auditItems = \App\Models\InventoryAuditItem::where('component_id', $id)
        ->whereHas('audit', function ($q) {
            $q->where('status', 'completed');
        })
        ->with('audit')
        ->get()
        ->map(function ($item) use ($component) {
            return [
                "entry_datetime" => $item->created_at,
                "activity"       => "AUDIT",
                "reference_no"   => $item->audit ? $item->audit->reference_no : "AUDIT-{$item->id}",
                "qty_balance"    => $item->quantity ?? 0,
                "cost_per_unit"  => $component->cost ?? 0,
            ];
        });

    /* -------------------------------------------------------------
     | 2) DEDUCTIONS (ORDER + MANUAL)
     ------------------------------------------------------------- */
    $deductions = \App\Models\InventoryDeduction::where('component_id', $id)
        ->get()
        ->map(function ($deduction) use ($component) {

            $reference = $deduction->order_detail_id
                ? "ORD-{$deduction->order_detail_id}"
                : "DED-{$deduction->id}";

            return [
                "entry_datetime" => $deduction->created_at,
                "activity"       => $deduction->order_detail_id ? "ORDER" : "DEDUCTION",
                "reference_no"   => $reference,
                "qty_balance"    => $deduction->new_quantity ?? 0,
                "cost_per_unit"  => $component->cost ?? 0,
            ];
        });

    /* -------------------------------------------------------------
     | 3) PO DETAILS (ALWAYS INBOUND QTY)
     ------------------------------------------------------------- */
    $poDetails = \App\Models\PoDetail::where('component_id', $id)
    ->whereHas('purchaseOrder', function ($q) {
        $q->whereIn('status', ['approved', 'completed']);
    })
    ->with('purchaseOrder')
    ->get()
    ->map(function ($item) use ($component) {

        // Compute new balance (onhand + received qty)
        $newBalance = ($item->onhand ?? 0) + ($item->received_qty ?? 0);

        return [
            "entry_datetime" => $item->created_at,
            "activity"       => "PURCHASE",
            "reference_no"   => $item->purchaseOrder
                ? $item->purchaseOrder->po_number
                : "PO-{$item->id}",
            "qty_balance"    => $newBalance,
            "cost_per_unit"  => $component->cost ?? 0,
        ];
    });

    /* -------------------------------------------------------------
 | 4) TRANSFERS (SEND OUT ONLY — SOURCE BRANCH)
 ------------------------------------------------------------- */
$transferMovements = \App\Models\InventoryTransferSendOut::whereHas(
        'transfer',
        fn ($q) => $q->whereIn('status', ['in_transit', 'completed'])
    )
    ->get()
    ->flatMap(function ($sendOut) use ($id, $component) {

        $rows = [];

        foreach ($sendOut->items_onload as $item) {

            // Only components
            if (data_get($item, 'type') !== 'component') {
                continue;
            }

            $newOnhand = data_get($item, 'new_onhand');

            // Skip legacy records safely
            if ($newOnhand === null) {
                continue;
            }

            $transferItemId = data_get($item, 'inventory_transfer_item_id');

            if (!$transferItemId) {
                continue;
            }

            $transferItem = \App\Models\InventoryTransferItem::find($transferItemId);

            if (!$transferItem || $transferItem->component_id != $id) {
                continue;
            }

            $rows[] = [
                "entry_datetime" => $sendOut->created_at,
                "activity"       => "TRANSFER OUT",
                "reference_no"   => $sendOut->delivery_request_no,
                "qty_balance"    => (float) $newOnhand,
                "cost_per_unit"  => $component->cost ?? 0,
            ];
        }

        return $rows;
    });





    /* -------------------------------------------------------------
     | 4) Merge ALL movements by date ascending
     ------------------------------------------------------------- */
    $movements = $auditItems
        ->concat($deductions)
        ->concat($poDetails)
        ->concat($transferMovements)
        ->sortBy('entry_datetime')
        ->values();

    /* -------------------------------------------------------------
     | 5) Compute qty_in & qty_out from balance difference
     ------------------------------------------------------------- */
    $prevBalance = 0;

    $movements = $movements->map(function ($m) use (&$prevBalance) {

        $diff = $m['qty_balance'] - $prevBalance;

        $m['qty_in']  = $diff > 0 ? $diff : 0;
        $m['qty_out'] = $diff < 0 ? abs($diff) : 0;

        $prevBalance = $m['qty_balance'];

        return $m;
    });

    /* -------------------------------------------------------------
     | 6) Show newest first on front end
     ------------------------------------------------------------- */
    $movements = $movements->sortByDesc('entry_datetime')->values();

    return view('components.stock-card', compact('component', 'movements'));
}


}
