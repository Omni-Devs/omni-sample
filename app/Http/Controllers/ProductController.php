<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\AccessDatabase;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create'); // make sure you have resources/views/products/create.blade.php
    }

    // Store the product into Access DB
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_code'   => 'required|string',
            'product_name' => 'required|string',
            'category_id'  => 'required|numeric',
            'sub_category_id'  => 'required|numeric',
            'product_price'    => 'required|numeric',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Show the edit form
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
        return view('products.edit', compact('product'));
    }

    // Update the product in Access DB
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_code'   => 'required|string',
            'product_name' => 'required|string',
            'category_id'  => 'required|numeric',
            'sub_category_id'  => 'required|numeric',
            'product_price'    => 'required|numeric', 
        ]);

        Product::updateProduct($id, $validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $deleted = Product::deleteProduct($id);

        if ($deleted) {
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        }

        return redirect()->route('products.index')->with('error', 'Failed to delete product.');
    }
}
