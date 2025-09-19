<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'subcategory'])->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('products.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:products,code',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            // Recipe validation
            'recipes.component_id.*' => 'required|exists:components,id',
            'recipes.quantity.*' => 'required|numeric',
            'recipes.unit.*' => 'required|string',
        ]);

        // Create product
        $product = Product::create($validated);

        // Save recipes
        if ($request->has('recipes')) {
            foreach ($request->recipes['component_id'] as $index => $component_id) {
                $quantity = $request->recipes['quantity'][$index];
                $unit = $request->recipes['unit'][$index];
                $product->recipes()->create([
                    'component_id' => $component_id,
                    'quantity' => $quantity,
                    'unit' => $unit,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created with recipes.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'code' => 'required|string|unique:products,code,' . $product->id,
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
