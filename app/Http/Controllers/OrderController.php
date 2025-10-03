<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Category;
use App\Models\Discount;
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

        $discounts = Discount::where('status', 'active')->get();

        return view('orders.index', compact('orders', 'discounts'));
    }

    public function create()
    {
    // Get all products with their category
    $products = Product::with('category')->get();

    $components = Component::with('category')
        ->where('for_sale', '!=', 0)
        ->get();

    // Get list of waiters (users)
    $waiters = User::select('id', 'name')->get();

    // Transform products for Vue
    $productsTransformed = $products->map(function ($p) {
        return [
            'id'          => $p->id,
            'sku'         => $p->code,
            'name'        => $p->name,
            'description' => $p->description ?? '',
            'price'       => $p->price,
            'category'    => $p->category->name ?? '',
            'image'       => $p->image
                ? asset('storage/' . $p->image)
                : 'https://via.placeholder.com/300x200?text=No+Image',
            'type'        => 'product', // 👈 tag it
        ];
    });

    // Transform components for Vue
    $componentsTransformed = $components->map(function ($c) {
        return [
            'id'          => $c->id,
            'sku'         => $c->code,
            'name'        => $c->name,
            'description' => $c->description ?? '',
            'price'       => $c->price,
            'category'    => $c->category->name ?? '',
            'image'       => $c->image
                ? asset('storage/' . $c->image)
                : 'https://via.placeholder.com/300x200?text=No+Image',
            'type'        => 'component', // 👈 tag it
        ];
    });

    // Merge both collections
    $allItems = $productsTransformed->merge($componentsTransformed)->values()->toArray();

    // Extract unique categories (from both products + components)
    $categories = collect($allItems)->pluck('category')
        ->filter()
        ->unique()
        ->values()
        ->toArray();

    // Get latest order number
    $latestOrder = Order::latest('id')->first();
    $nextOrderNo = $latestOrder ? $latestOrder->id + 1 : 1;

    return view('orders.create', [
        'products'    => $allItems,
        'categories'  => $categories,
        'waiters'     => $waiters,
        'nextOrderNo' => $nextOrderNo,
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

        // allow either product_id OR component_id
        'order_details.*.product_id'   => 'nullable|exists:products,id',
        'order_details.*.component_id' => 'nullable|exists:components,id',

        'order_details.*.quantity' => 'required|integer|min:1',
        'order_details.*.price'    => 'required|numeric|min:0',
        'order_details.*.discount' => 'nullable|numeric|min:0',
        'order_details.*.notes' => 'nullable|string|max:255',

         // ✅ validation for discount entries
        'discount_entries' => 'nullable|array',
        'discount_entries.*.discount_id' => 'required|exists:discounts,id',
        'discount_entries.*.person_name' => 'nullable|string|max:255',
        'discount_entries.*.person_id_number' => 'nullable|string|max:100',
        'discount_entries.*.quantity' => 'required|integer|min:1',
    ]);

    // ✅ Extra validation: must have at least one of product_id or component_id
    foreach ($validated['order_details'] as $detail) {
        if (empty($detail['product_id']) && empty($detail['component_id'])) {
            return response()->json([
                'success' => false,
                'message' => 'Each order item must have either a product_id or component_id.'
            ], 422);
        }
    }

    // Create the order
    $order = Order::create([
        'user_id'   => $validated['user_id'],
        'table_no'  => $validated['table_no'],
        'number_pax'=> $validated['number_pax'],
        'status'    => $validated['status'],
    ]);

    // Attach order details
    foreach ($validated['order_details'] as $detail) {
        $order->details()->create([
            'product_id'   => $detail['product_id']   ?? null,
            'component_id' => $detail['component_id'] ?? null,
            'quantity'     => $detail['quantity'],
            'price'        => $detail['price'],
            'discount'     => $detail['discount'] ?? 0,
            'notes'        => $detail['notes'] ?? null,
        ]);
    }

    // ✅ Attach discount entries (if any)
    if (!empty($validated['discount_entries'])) {
        foreach ($validated['discount_entries'] as $entry) {
            $order->discountEntries()->create([
                'discount_id'     => $entry['discount_id'],
                'person_name'     => $entry['person_name'] ?? null,
                'person_id_number'=> $entry['person_id_number'] ?? null,
                'quantity'        => $entry['quantity'],
            ]);
        }
    }

    // ✅ Attach discount entries (if any)
    if (!empty($validated['discount_entries'])) {
        foreach ($validated['discount_entries'] as $entry) {
            $order->discountEntries()->create([
                'discount_id'     => $entry['discount_id'],
                'person_name'     => $entry['person_name'] ?? null,
                'person_id_number'=> $entry['person_id_number'] ?? null,
                'quantity'        => $entry['quantity'],
            ]);
        }
    }

    return response()->json([
        'success'  => true,
        'message'  => 'Order created successfully!',
        'redirect' => route('orders.index')
    ]);
    }
}