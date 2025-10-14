<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Component;
use App\Models\Discount;
use App\Models\DiscountEntry;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Default to 'serving' tab
        $status = $request->query('status', 'serving');

        // Allow only specific statuses
        $allowedStatuses = ['serving', 'billout', 'payment'];
        if (!in_array($status, $allowedStatuses)) {
            $status = 'serving';
        }

        // Fetch orders filtered by status
        $orders = Order::with(['details.product', 'user'])
            ->when($status === 'serving', fn($q) => $q->where('status', 'serving'))
            ->when($status === 'billout', fn($q) => $q->where('status', 'billout'))
            ->when($status === 'payment', fn($q) => $q->where('status', 'payment'))
            ->orderByDesc('created_at')
            ->get();

        // Load active discounts
        $discounts = Discount::where('status', 'active')->orderBy('name')->get();

        return view('orders.index', compact('orders', 'discounts', 'status'));
    }

   public function create()
{
    // ✅ Fetch categories with their subcategories (ASC order)
    $categories = Category::with([
    'subcategories' => function ($query) {
        $query->with(['products', 'components']);
    }
])->get();

    // ✅ Fetch products with category + subcategory
    $products = Product::with(['category', 'subcategory'])->get();

    // ✅ Fetch components (for_sale only)
    $components = Component::with(['category', 'subcategory'])
        ->where('for_sale', '!=', 0)
        ->get();

    // ✅ Fetch waiters
    $waiters = User::select('id', 'name')->get();

    // ✅ Transform products
    $productsTransformed = $products->map(function ($p) {
        return [
            'id'             => $p->id,
            'sku'            => $p->code,
            'name'           => $p->name,
            'description'    => $p->description ?? '',
            'price'          => $p->price,
            'category_id'    => $p->category_id,
            'subcategory_id' => $p->subcategory_id,
            'category'       => $p->category->name ?? '',
            'subcategory'    => $p->subcategory->name ?? '',
            'image'          => $p->image
                ? asset('storage/' . $p->image)
                : 'https://via.placeholder.com/300x200?text=No+Image',
            'type'           => 'product',
        ];
    });

    // ✅ Transform components
    $componentsTransformed = $components->map(function ($c) {
        return [
            'id'             => $c->id,
            'sku'            => $c->code,
            'name'           => $c->name,
            'description'    => $c->description ?? '',
            'price'          => $c->price,
            'category_id'    => $c->category_id,
            'subcategory_id' => $c->subcategory_id,
            'category'       => $c->category->name ?? '',
            'subcategory'    => $c->subcategory->name ?? '',
            'image'          => $c->image
                ? asset('storage/' . $c->image)
                : 'https://via.placeholder.com/300x200?text=No+Image',
            'type'           => 'component',
        ];
    });

    // ✅ Merge both
    $allItems = $productsTransformed->merge($componentsTransformed)->values();

    // ✅ Get latest order number
    $latestOrder = Order::latest('id')->first();
    $nextOrderNo = $latestOrder ? $latestOrder->id + 1 : 1;

    // ✅ Return to view
    return view('orders.form', [
        'isEdit'       => false,
        'products'     => $allItems,
        'categories'   => $categories,
        'waiters'      => $waiters,
        'nextOrderNo'  => $nextOrderNo,
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

    public function billout(Request $request, $orderId)
    {
        // $order = Order::findOrFail($orderId);

        // $validated = $request->validate([
        //     'srPwdBill'      => 'nullable|numeric',
        //     'discount20'     => 'nullable|numeric',
        //     'otherDiscount'  => 'nullable|numeric',
        //     'netBill'        => 'nullable|numeric',
        //     'vatable'        => 'nullable|numeric',
        //     'vat12'          => 'nullable|numeric',
        //     'totalCharge'    => 'nullable|numeric',
        // ]);

        // // Save computed values into your actual database columns
        // $order->update([
        //     'sr_pwd_discount'  => $validated['discount20'] ?? 0,
        //     'other_discounts'  => $validated['otherDiscount'] ?? 0,
        //     'net_amount'       => $validated['netBill'] ?? 0,
        //     'vatable'          => $validated['vatable'] ?? 0,
        //     'vat_12'           => $validated['vat12'] ?? 0,
        //     'total_charge'     => $validated['totalCharge'] ?? 0,
        //     'discount_total'   => ($validated['discount20'] ?? 0) + ($validated['otherDiscount'] ?? 0),
        //     'charges_description' => 'Auto-calculated billout data.',
        // ]);

        // return response()->json([
        //     'success' => true,
        //     'order' => $order,
        // ]);

        $order = Order::findOrFail($orderId);

        // Update order with computed totals
        $order->update([
            'gross_amount' => $request->input('gross_amount', 0),
            'sr_pwd_discount' => $request->input('discount20', 0),
            'other_discounts' => $request->input('otherDiscount', 0),
            'net_amount' => $request->input('netBill', 0),
            'vatable' => $request->input('vatable', 0),
            'vat_12' => $request->input('vat12', 0),
            'total_charge' => $request->input('totalCharge', 0),
            'charges_description' => $request->input('charges_description'),
            'status'           => 'billout', // ✅ change order status,
        ]);

        // Save discount entries
        if ($request->filled('persons')) {
            $persons = json_decode($request->persons, true);

            foreach ($persons as $person) {
                if (!empty($person['discount_id']) && !empty($person['name'])) {
                    DiscountEntry::create([
                        'order_id' => $order->id,
                        'discount_id' => $person['discount_id'],
                        'person_name' => $person['name'] ?? null,
                        'person_id_number' => $person['id_number'] ?? null,
                    ]);
                }
            }
        }

        return response()->json([
            'success' => true,
            'order' => $order
        ]);
    }

    
public function edit($id)
{
    // ✅ Fetch the order with its relations
    $order = Order::with([
        'details.product',
        'details.component',
        'user'
    ])->findOrFail($id);

    // ✅ Fetch categories (with subcategories → products + components)
    $categories = Category::with([
        'subcategories' => function ($query) {
            $query->with(['products', 'components']);
        }
    ])->get();

    // ✅ Fetch products with relations
    $products = Product::with(['category', 'subcategory'])->get();

    // ✅ Fetch components (for_sale only)
    $components = Component::with(['category', 'subcategory'])
        ->where('for_sale', '!=', 0)
        ->get();

    // ✅ Fetch waiters
    $waiters = User::select('id', 'name')->get();

    // ✅ Transform products
    $productsTransformed = $products->map(function ($p) {
        return [
            'id'             => $p->id,
            'sku'            => $p->code,
            'name'           => $p->name,
            'description'    => $p->description ?? '',
            'price'          => $p->price,
            'category_id'    => $p->category_id,
            'subcategory_id' => $p->subcategory_id,
            'category'       => $p->category->name ?? '',
            'subcategory'    => $p->subcategory->name ?? '',
            'image'          => $p->image
                ? asset('storage/' . $p->image)
                : 'https://via.placeholder.com/300x200?text=No+Image',
            'type'           => 'product',
        ];
    });

    // ✅ Transform components
    $componentsTransformed = $components->map(function ($c) {
        return [
            'id'             => $c->id,
            'sku'            => $c->code,
            'name'           => $c->name,
            'description'    => $c->description ?? '',
            'price'          => $c->price,
            'category_id'    => $c->category_id,
            'subcategory_id' => $c->subcategory_id,
            'category'       => $c->category->name ?? '',
            'subcategory'    => $c->subcategory->name ?? '',
            'image'          => $c->image
                ? asset('storage/' . $c->image)
                : 'https://via.placeholder.com/300x200?text=No+Image',
            'type'           => 'component',
        ];
    });

    // ✅ Merge both
    $allItems = $productsTransformed->merge($componentsTransformed)->values();

    // ✅ Return same view as create
    return view('orders.form', [
        'isEdit'       => true,
        'order'        => $order,
        'products'     => $allItems,
        'categories'   => $categories,
        'waiters'      => $waiters,
    ]);
}


public function update(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'table_no' => 'required|integer|min:1',
        'number_pax' => 'required|integer|min:1',
        'status' => 'required|in:serving,billout,payments,closed,cancelled',
        'order_details' => 'required|array|min:1',
        'order_details.*.product_id'   => 'nullable|exists:products,id',
        'order_details.*.component_id' => 'nullable|exists:components,id',
        'order_details.*.quantity' => 'required|integer|min:1',
        'order_details.*.price' => 'required|numeric|min:0',
    ]);

    $order->update([
        'user_id' => $validated['user_id'],
        'table_no' => $validated['table_no'],
        'number_pax' => $validated['number_pax'],
        'status' => $validated['status'],
    ]);

    // Remove old details
    $order->details()->delete();

    // Recreate details
    foreach ($validated['order_details'] as $detail) {
        $order->details()->create([
            'product_id' => $detail['product_id'] ?? null,
            'component_id' => $detail['component_id'] ?? null,
            'quantity' => $detail['quantity'],
            'price' => $detail['price'],
        ]);
    }

    return response()->json([
        'success' => true,
        'message' => 'Order updated successfully!',
        'redirect' => route('orders.index')
    ]);
}
public function show($id)
{
    $order = Order::with([
        'details.product',
        'details.component',
        'user'
    ])->findOrFail($id);

    return response()->json($order);
}

}