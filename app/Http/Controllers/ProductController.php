<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Component;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
        // eager load recipes so the view can pre-fill rows
        $product = Product::with('recipes')->findOrFail($id);

        // pass categories, subcategories and components to the edit view
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $components = Component::all();

        return view('products.edit', compact('product', 'categories', 'subcategories', 'components'));
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

        'recipes' => 'nullable|array',
        'recipes.*.component_id' => 'required|exists:components,id',
        'recipes.*.quantity' => 'required|numeric',
        'recipes.*.unit' => 'required|string',
        'recipes.*.cost' => 'nullable|numeric',
    ]);

    DB::beginTransaction();
    try {
        // update product main info
        $productData = Arr::only($validated, ['code', 'name', 'price', 'category_id', 'subcategory_id']);
        $product->update($productData);

        if ($request->has('recipes')) {
            $existingIds = $product->recipes()->pluck('id')->toArray();
            $submittedIds = [];

            foreach ($validated['recipes'] as $recipeData) {
                if (!empty($recipeData['id'])) {
                    // update existing
                    $recipe = $product->recipes()->find($recipeData['id']);
                    if ($recipe) {
                        $recipe->update($recipeData);
                        $submittedIds[] = $recipe->id;
                    }
                } else {
                    // create new
                    $newRecipe = $product->recipes()->create($recipeData);
                    $submittedIds[] = $newRecipe->id;
                }
            }

            // delete removed recipes
            $toDelete = array_diff($existingIds, $submittedIds);
            if (!empty($toDelete)) {
                $product->recipes()->whereIn('id', $toDelete)->delete();
            }
        }

        DB::commit();
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withInput()->withErrors(['error' => 'Failed to update product: ' . $e->getMessage()]);
    }
}

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
