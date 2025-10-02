<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Component;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Default to 'active'
        $status = $request->get('status', 'active');

        // Fetch only products with the given status
        $products = Product::with(['category', 'subcategory'])
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('products.index', compact('products', 'status'));
    }

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',

            // Recipe validation
            'recipes.component_id.*' => 'required|exists:components,id',
            'recipes.quantity.*' => 'required|numeric',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

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
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created with recipes.');
    }

    public function edit($id)
    {
        $product = Product::with('recipes')->findOrFail($id);
        $categories = Category::where('status', 'active')->get();
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',

            'recipes' => 'nullable|array',
            'recipes.*.component_id' => 'required|exists:components,id',
            'recipes.*.quantity' => 'required|numeric',
            'recipes.*.unit' => 'required|string',
            'recipes.*.cost' => 'nullable|numeric',
        ]);

        DB::beginTransaction();
        try {
            $productData = Arr::only($validated, ['code', 'name', 'price', 'category_id', 'subcategory_id']);

            // Handle new image upload
            if ($request->hasFile('image')) {
                // delete old image if exists
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }
                $productData['image'] = $request->file('image')->store('products', 'public');
            }

            $product->update($productData);

            if ($request->has('recipes')) {
                $existingIds = $product->recipes()->pluck('id')->toArray();
                $submittedIds = [];

                foreach ($validated['recipes'] as $recipeData) {
                    if (!empty($recipeData['id'])) {
                        $recipe = $product->recipes()->find($recipeData['id']);
                        if ($recipe) {
                            $recipe->update($recipeData);
                            $submittedIds[] = $recipe->id;
                        }
                    } else {
                        $newRecipe = $product->recipes()->create($recipeData);
                        $submittedIds[] = $newRecipe->id;
                    }
                }

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

    /**
     * Move the specified Product to archive (status change).
     */
    public function archive(Product $product)
    {
        $product->update([
            'status' => 'archived'
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Unit moved to archive successfully.');
    }

    /**
     * Restore a product from archive.
     */
    public function restore(Product $product)
    {
        $product->update([
            'status' => 'active'
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product restored to active successfully.');
    }
}
