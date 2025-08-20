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
            'prod_id'   => 'required|string',
            'prod_name' => 'required|string',
            'category'  => 'required|string',
            'uprice'    => 'required|numeric',
        ]);

        $db = new \App\Services\AccessDatabase();
        $sql = "INSERT INTO Product (PROD_ID, PRODNAME, CATNAME, UPRICE) VALUES (?, ?, ?, ?)";
        $db->execute($sql, [
            $validated['prod_id'],
            $validated['prod_name'],
            $validated['category'],
            $validated['uprice']
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
}
