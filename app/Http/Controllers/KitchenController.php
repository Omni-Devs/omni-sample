<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\InventoryDeduction;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KitchenController extends Controller
{
  public function index(Request $request)
{
    $status = $request->query('status', 'serving');

    $orders = Order::with([
            'details' => function ($q) use ($status) {
                // ✅ Only include order details with matching status (default: serving)
                $q->where('status', $status)
                  ->with([
                      'product.category',
                      'product.recipes.component',
                      'component.category',
                  ]);
            },
            'user'
        ])
        ->orderBy('created_at', 'asc')
        ->get();

    // ✅ Flatten the order + detail data
    $orderItems = $orders->flatMap(function ($order) {
    return $order->details->map(function ($detail) use ($order) {
        $item = $detail->product ?? $detail->component;

        // ✅ Build recipe list
        if ($detail->product && $detail->product->recipes) {
            // Product-based (with recipe)
            $recipe = $detail->product->recipes->map(function ($r) use ($detail) {
                return [
                    'component_id'   => optional($r->component)->id ?? null,
                    'component_name' => optional($r->component)->name ?? 'Unknown Component',
                    'quantity'       => $r->quantity * $detail->quantity,
                    'base_quantity'  => $r->quantity,
                    'unit'           => optional($r->component)->unit ?? 'pcs',
                    'loss_type'      => '',
                    'loss_qty'       => 0,
                    'source'         => 'recipe', // mark where it came from
                ];
            })->values();
        } elseif ($detail->component) {
            // Component-based (no recipe)
            $recipe = collect([[
                'component_id'   => $detail->component->id,
                'component_name' => $detail->component->name,
                'quantity'       => $detail->quantity,
                'base_quantity'  => 1,
                'unit'           => $detail->component->unit ?? 'pcs',
                'loss_type'      => '',
                'loss_qty'       => 0,
                'source'         => 'component', // mark direct source
            ]]);
        } else {
            // fallback
            $recipe = collect([]);
        }

            return [
                'order_detail_id' => $detail->id,
                'order_id'        => $order->id,
                'order_no'        => $order->order_no ?? ('ORD-' . $order->id),
                'created_at'      => $order->created_at,
                'time_submitted'  => $order->time_submitted
                    ? \Carbon\Carbon::parse($order->time_submitted)->format('Y-m-d H:i:s')
                    : null,
                'code'            => $item->code ?? 'N/A',
                'name'            => $item->name ?? 'Unnamed Item',
                'qty'             => $detail->quantity,
                'station'         => $item->category->name ?? 'N/A',
                'status'          => $detail->status, // include current status
                'recipe'          => $recipe,
            ];
        });
    })
    ->sortBy('created_at')
    ->values();

    // 🧑‍🍳 Fetch all cooks / chefs
    $chefs = User::role(['chef', 'cook'])
        ->select('id', 'name')
        ->orderBy('name')
        ->get();

    return view('kitchen.index', [
        'orderItems' => $orderItems,
        'chefs'      => $chefs,
    ]);
}


   public function updateOrCreate(Request $request)
{
    $validator = Validator::make($request->all(), [
        'order_detail_id' => 'required|integer|exists:order_details,id',
        'cook_id'         => 'required|integer|exists:users,id',
        'time_submitted'  => 'nullable|date',
        'status'          => 'required|string|in:serving,served,walked,cancelled',
        'recipe'          => 'nullable|array',
        'deductions'      => 'nullable|array', // ✅ new unified data source
        'deductions' => 'nullable|array',
        'deductions.*.component_id' => 'required|integer|exists:components,id',
        'deductions.*.quantity_deducted' => 'required|numeric|min:0',
        'deductions.*.deduction_type' => 'nullable|string|in:served,wastage,spoilage,theft',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors'  => $validator->errors(),
        ], 422);
    }

    try {
        DB::beginTransaction();

        $orderDetail = OrderDetail::findOrFail($request->order_detail_id);

        // ✅ Create or update order item
        $item = OrderItem::updateOrCreate(
            ['order_detail_id' => $request->order_detail_id],
            [
                'cook_id'        => $request->cook_id,
                'time_submitted' => $request->time_submitted ?? now(),
            ]
        );

        // ✅ Update order detail status
        $orderDetail->update(['status' => $request->status]);

        // ✅ Perform stock deductions (only if order is served or walked)
        if (in_array($request->status, ['served', 'walked']) && !empty($request->deductions)) {
            $this->updateStockBulk($request->deductions, $orderDetail->id);
        }

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Order item, status, and inventory updated successfully.',
            'data' => [
                'order_item'   => $item,
                'order_detail' => $orderDetail,
            ],
        ], 200);

    } catch (\Throwable $e) {
        DB::rollBack();
        Log::error('OrderItem updateOrCreate failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Server error: ' . $e->getMessage(),
        ], 500);
    }
}


    protected function updateStockBulk(array $deductions, int $orderDetailId)
{
    foreach ($deductions as $d) {
        // ✅ Skip invalid entries
        if (empty($d['component_id']) || empty($d['quantity_deducted'])) {
            continue;
        }

        $component = Component::find($d['component_id']);
        if (!$component) continue;

        $prevQty = $component->onhand;
        $deductedQty = floatval($d['quantity_deducted']);
        $newQty = $prevQty - $deductedQty;

        if ($newQty < 0) {
            throw new \Exception("Insufficient stock for {$component->name}");
        }

        $component->update(['onhand' => $newQty]);

        // ✅ Log to inventory deductions
        InventoryDeduction::create([
            'component_id'      => $component->id,
            'order_detail_id'   => $orderDetailId,
            'quantity_deducted' => $deductedQty,
            'prev_quantity'     => $prevQty,
            'new_quantity'      => $newQty,
            'deduction_type'    => $d['deduction_type'] ?? 'served',
            'notes'             => $d['notes'] ?? null,
            'user_id'           => Auth::id(),
        ]);

        Log::info('📦 Deduction Applied', [
            'component'         => $component->name,
            'deductedQty'       => $deductedQty,
            'type'              => $d['deduction_type'] ?? 'served',
            'prevQty'           => $prevQty,
            'newQty'            => $newQty,
            'order_detail_id'   => $orderDetailId,
        ]);
    }

    return true;
}



   public function showServed()
    {
        $servedDetails = OrderDetail::with([
            'order:id,time_submitted',
            'product.category',
            'component.category',
            'orderItems.cook' // each detail can have many items; we’ll take the latest one
        ])
        ->where('status', 'served')
        ->orderBy('updated_at', 'desc')
        ->get();

        return view('kitchen.served', compact('servedDetails'));
    }
    public function showWalked()
    {
        $walkedDetails = OrderDetail::with([
            'order:id,time_submitted',
            'product.category',
            'component.category',
            'orderItems.cook' // each detail can have many items; we’ll take the latest one
        ])
        ->where('status', 'walked')
        ->orderBy('updated_at', 'desc')
        ->get();

        return view('kitchen.walked', compact('walkedDetails'));
    }

}
