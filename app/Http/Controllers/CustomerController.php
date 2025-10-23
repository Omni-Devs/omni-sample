<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Discount;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of customers.
     */
    public function index(Request $request)
    {
        $status = $request->get('status', 'active');
        $activeCount = Customer::where('status', 'active')->count();

        $customers = Customer::with('discount')
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customers.index', compact('customers', 'status', 'activeCount'));
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        $discounts = Discount::where('status', 'active')->get();

        return view('customers.create', compact('discounts'));
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name'      => 'required|string|max:255',
            'company_name'       => 'nullable|string|max:255',
            'mobile_no'          => 'nullable|string|max:50',
            'landline_no'        => 'nullable|string|max:50',
            'email'              => 'nullable|email|max:255',
            'address'            => 'nullable|string|max:255',
            'assigned_personnel' => 'nullable|string|max:255',
            'province'           => 'nullable|string|max:255',
            'city_municipality'  => 'nullable|string|max:255',
            'credit_limit'       => 'nullable|numeric|min:0',
            'payment_terms_days'      => 'nullable|integer|min:0',
            'customer_type'      => 'nullable|string|max:255',
            'discount_id'        => 'nullable|exists:discounts,id',
            'customer_since'     => 'nullable|date',
        ]);

        // Generate Customer No (e.g., CUS-000632)
        $latestCustomer = Customer::latest()->first();
        $nextId = $latestCustomer ? $latestCustomer->id + 1 : 1;
        $customerNo = 'CUS-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);
        $validated['customer_no'] = $customerNo;

        Customer::create($validated);

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit(Customer $customer)
    {
        $discounts = Discount::where('status', 'active')->get();

        return view('customers.edit', compact('customer', 'discounts'));
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'customer_name'      => 'required|string|max:255',
            'company_name'       => 'nullable|string|max:255',
            'mobile_no'          => 'nullable|string|max:50',
            'landline_no'        => 'nullable|string|max:50',
            'email'              => 'nullable|email|max:255',
            'address'            => 'nullable|string|max:255',
            'assigned_personnel' => 'nullable|string|max:255',
            'province'           => 'nullable|string|max:255',
            'city_municipality'  => 'nullable|string|max:255',
            'credit_limit'       => 'nullable|numeric|min:0',
            'payment_terms_days'      => 'nullable|integer|min:0',
            'customer_type'      => 'nullable|string|max:255',
            'discount_id'        => 'nullable|exists:discounts,id',
            'customer_since' => 'nullable|date', // default today
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }

    /**
     * Move the specified customer to archive.
     */
    public function archive(Customer $customer)
    {
        $customer->update(['status' => 'archived']);

        return redirect()->route('customers.index')
            ->with('success', 'Customer archived successfully.');
    }

    /**
     * Restore an archived customer.
     */
    public function restore(Customer $customer)
    {
        $customer->update(['status' => 'active']);

        return redirect()->route('customers.index')
            ->with('success', 'Customer restored successfully.');
    }
}
