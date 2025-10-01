<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Get all orders with details and user
        $orders = Order::with(['details.product', 'user'])->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        // Get all products with their category
        $products = Product::with('category')->get();
        // Get list of waiters (users)
        $waiters = User::select('id', 'name')->get();

        // Transform products for Vue
        $productsTransformed = $products->map(function ($p) {
            return [
                'id'          => $p->id, // 👈 include product id for Vue and order tracking
                'sku'         => $p->code,
                'name'        => $p->name,
                'description' => $p->description ?? '',
                'price'       => $p->price,  // 👈 use consistent key (price, not amount)
                'category'    => $p->category->name ?? '',
                'image'       => $p->image
                    ? asset('storage/' . $p->image)
                    : 'https://via.placeholder.com/300x200?text=No+Image',
            ];
        })->values()->toArray();

        // Extract unique categories
        $categories = $products->map(fn($p) => $p->category->name ?? '')
                            ->filter()
                            ->unique()
                            ->values()
                            ->toArray();

        return view('orders.create', [
        'products'   => $productsTransformed,
        'categories' => $categories,
        'waiters'    => $waiters,
         ]);
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'table_no' => 'required|integer|min:1',
        'number_pax' => 'required|integer|min:1',
        'status' => 'required|in:serving,billout,payments,closed,cancelled',
        'order_details' => 'required|array|min:1',
        'order_details.*.product_id' => 'required|exists:products,id',
        'order_details.*.quantity' => 'required|integer|min:1',
        'order_details.*.price' => 'required|numeric|min:0',
        'order_details.*.discount' => 'nullable|numeric|min:0',
        'order_details.*.notes' => 'nullable|string|max:255',
    ]);

    // Create the order
    $order = Order::create([
        'user_id' => $validated['user_id'],
        'table_no' => $validated['table_no'],
        'number_pax' => $validated['number_pax'],
        'status' => $validated['status'],
    ]);

    // Attach order details
    foreach ($validated['order_details'] as $detail) {
        $order->details()->create([
            'product_id' => $detail['product_id'],
            'quantity' => $detail['quantity'],
            'price' => $detail['price'],
            'discount' => $detail['discount'] ?? 0,
            'notes' => $detail['notes'] ?? null,
        ]);
    }

    return response()->json([
    'success' => true,
    'message' => 'Order created successfully!',
    'redirect' => route('orders.index')
]);
}

}