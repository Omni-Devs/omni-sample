<?php

namespace App\Http\Controllers;

use App\Models\CashEquivalent;
use App\Models\Category;
use App\Models\Component;
use App\Models\Discount;
use App\Models\DiscountEntry;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Default to 'serving' tab
        $status = $request->query('status', 'serving');

        // Allow only specific statuses
    $allowedStatuses = ['serving', 'billout', 'payments'];
        if (!in_array($status, $allowedStatuses)) {
            $status = 'serving';
        }

        // Fetch orders filtered by status
        $orders = Order::with(['details.product', 'user'])
            ->when($status === 'serving', fn($q) => $q->where('status', 'serving'))
            ->when($status === 'billout', fn($q) => $q->where('status', 'billout'))
            ->when($status === 'payments', fn($q) => $q->where('status', 'payments'))
            ->orderByDesc('created_at')
            ->get();

        // Load active discounts
        $discounts = Discount::where('status', 'active')->orderBy('name')->get();

        // Load payment methods and cash equivalents for Payment modal
        $paymentMethods = Payment::where('status', 'active')->orderBy('name')->get();
        $cashEquivalents = CashEquivalent::where('status', 'active')->orderBy('name')->get();

        // Load branch information (for receipt header). Use first branch as default.
        $branch = Branch::first();

        return view('orders.index', compact('orders', 'discounts', 'status', 'paymentMethods', 'cashEquivalents', 'branch'));
    }

   public function create()
{
    // ✅ Fetch categories with subcategories (include all products, filter components)
    $categories = Category::with([
        'subcategories' => function ($query) {
            $query->with([
                'products', // all products
                'components' => function ($c) {
                    $c->where('for_sale', '!=', 0); // only sellable components
                },
            ]);
        },
    ])->get();

    // ✅ Filter out empty subcategories (no products AND no for_sale components)
    $categories = $categories->filter(function ($category) {
        $category->subcategories = $category->subcategories->filter(function ($sub) {
            $hasProducts = $sub->products && $sub->products->count() > 0;
            $hasComponents = $sub->components && $sub->components->count() > 0;
            return $hasProducts || $hasComponents;
        })->values();

        // Keep category only if it has valid subcategories
        return $category->subcategories->count() > 0;
    })->values();

    // ✅ Fetch all products (no for_sale column)
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
    $localTime = Carbon::parse($request->created_at)->setTimezone('Asia/Manila');

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
        'created_at'=> $localTime,
        'updated_at'=> $localTime,
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

    // public function payment(Request $request, $orderId)
    // {
    //     $order = Order::findOrFail($orderId);

    //     $validated = $request->validate([
    //         'payments' => 'required|string', // JSON array
    //     ]);

    //     $decodedPayments = json_decode($validated['payments'], true);

    //     if (empty($decodedPayments) || !is_array($decodedPayments)) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Invalid or empty payment data.',
    //         ], 422);
    //     }

    //     $totalPaid = 0;

    //     foreach ($decodedPayments as $p) {
    //         if (empty($p['payment_method_id']) || empty($p['cash_equivalent_id']) || empty($p['amount_paid'])) {
    //             continue;
    //         }

    //         // ✅ Save each record in payment_details table
    //         PaymentDetail::create([
    //             'payment_id' => $p['payment_method_id'],
    //             'cash_equivalent_id' => $p['cash_equivalent_id'],
    //             'transaction_reference_no' => $p['reference_no'] ?? null,
    //             'amount_paid' => $p['amount_paid'],
    //         ]);

    //         $totalPaid += $p['amount_paid'];
    //     }

    //     // ✅ Update order status
    //     $order->update([
    //         'status' => 'payment',
    //         'charges_description' => ($order->charges_description ?? '') .
    //             "\nPayments added on " . now()->toDateTimeString(),
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Payment successfully recorded!',
    //         'order' => $order,
    //         'total_paid' => $totalPaid,
    //     ]);
    // }

    public function payment(Request $request, $orderId)
{
    $order = Order::findOrFail($orderId);

    $validated = $request->validate([
        'payments' => 'required|string', // JSON array
        'total_payment_rendered' => 'nullable|numeric|min:0',
        'change_amount' => 'nullable|numeric|min:0',
    ]);

    $decodedPayments = json_decode($validated['payments'], true);

    if (empty($decodedPayments) || !is_array($decodedPayments)) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid or empty payment data.',
        ], 422);
    }

    $totalPaid = 0;

    foreach ($decodedPayments as $p) {
        if (empty($p['payment_method_id']) || empty($p['cash_equivalent_id']) || empty($p['amount_paid'])) {
            continue;
        }

        PaymentDetail::create([
            'order_id' => $order->id,
            'payment_id' => $p['payment_method_id'],
            'cash_equivalent_id' => $p['cash_equivalent_id'],
            'transaction_reference_no' => $p['reference_no'] ?? null,
            'amount_paid' => $p['amount_paid'],
            'total_rendered' => $request->total_payment_rendered ?? 0,
            'change_amount' => $request->change_amount ?? 0,
        ]);

        $totalPaid += $p['amount_paid'];
    }

    // compute total rendered and change
    $totalCharge = floatval($order->total_charge ?? 0);
    $changeAmount = max(0, $totalPaid - $totalCharge);

    // update order
    $order->update([
        'status' => 'payments',
        'total_payment_rendered' => $totalPaid,
        'change_amount' => $changeAmount,
        'charges_description' => ($order->charges_description ?? '') . "\nPayments added on " . now()->toDateTimeString(),
    ]);

    // Optionally update last payment detail row with totals
    $lastPayment = PaymentDetail::where('order_id', $order->id)->latest()->first();
    if ($lastPayment) {
        $lastPayment->update([
            'total_rendered' => $totalPaid,
            'change_amount' => $changeAmount,
        ]);
    }

    // Reload order with relations for response (so view can render receipt)
    $order = Order::with([
        'details.product',
        'details.component',
        'user',
        'discountEntries',
        'paymentDetails.payment',
        'paymentDetails.cashEquivalent'
    ])->find($order->id);

    return response()->json([
        'success' => true,
        'message' => 'Payment successfully recorded!',
        'order' => $order,
        'total_paid' => $totalPaid,
        'change' => $changeAmount,
    ]);
}

}