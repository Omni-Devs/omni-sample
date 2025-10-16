<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'serving');

        $orders = Order::with(['details.product.category', 'details.component.category', 'user'])
            ->when($status === 'serving', fn($q) => $q->where('status', 'serving'))
            ->orderBy('created_at', 'asc')
            ->get();

        // Flatten each product/component in order
        $orderItems = $orders->flatMap(function ($order) {
            return $order->details->map(function ($detail) use ($order) {
                $item = $detail->product ?? $detail->component;
                return [
                    'order_id'   => $order->id,
                    'order_no'   => $order->order_no ?? ('ORD-' . $order->id),
                    'created_at' => $order->created_at,
                    'code'       => $item->code ?? 'N/A',
                    'name'       => $item->name ?? 'Unnamed Item',
                    'qty'        => $detail->quantity,
                    'station'    => $item->category->name ?? 'N/A',
                ];
            });
        })->sortBy('created_at')->values();

        return view('kitchen.index', [
            'orderItems' => $orderItems,
        ]);
    }


}
