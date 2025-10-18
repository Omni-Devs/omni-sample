<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
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

            // ✅ Build recipe safely
            $recipe = [];
            if ($detail->product && $detail->product->recipes) {
                $recipe = $detail->product->recipes->map(function ($r) use ($detail) {
                    return [
                        'component_name' => optional($r->component)->name ?? 'Unknown Component',
                        'quantity'       => $r->quantity * $detail->quantity, // multiply by qty ordered
                        'base_quantity'  => $r->quantity,
                    ];
                })->values();
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
    // ✅ Validate incoming data
    $validator = Validator::make($request->all(), [
        'order_detail_id' => 'required|integer|exists:order_details,id',
        'cook_id'         => 'required|integer|exists:users,id',
        'time_submitted'  => 'nullable|date',
        'status'          => 'required|string|in:serving,served,walked,cancelled',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors'  => $validator->errors(),
        ], 422);
    }

    try {
        // ✅ Fetch the related order detail
        $orderDetail = OrderDetail::findOrFail($request->order_detail_id);

        // ✅ Find or create order item
        $item = OrderItem::updateOrCreate(
            ['order_detail_id' => $request->order_detail_id],
            [
                'cook_id'        => $request->cook_id,
                'time_submitted' => $request->time_submitted ?? now(),
            ]
        );

        // ✅ Update this order detail’s status
        $orderDetail->update(['status' => $request->status]);

        // ✅ Check if all order details of this order are now "served"
        $order = $orderDetail->order;
        $allServed = $order->details()->where('status', '!=', 'served')->count() === 0;

        if ($allServed) {
            $order->update(['status' => 'served']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order item and status updated successfully.',
            'data'    => [
                'order_item'   => $item,
                'order_detail' => $orderDetail,
                'order_status' => $order->status,
            ],
        ], 200);

    } catch (\Throwable $e) {
        \Log::error('OrderItem updateOrCreate failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Server error: ' . $e->getMessage(),
        ], 500);
    }
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



}
