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
    $db = new AccessDatabase();

    // Join CATEGORY and SUBCATEGORY
    $results = $db->query("
        SELECT c.CAT_ID, c.Category_Name, s.SUBCAT_ID, s.Subcategory_Name
        FROM CATEGORY c
        LEFT JOIN SUBCATEGORY s ON c.CAT_ID = s.CAT_ID
        ORDER BY c.Category_Name, s.Subcategory_Name
    ");

    // Group subcategories under categories
    $categories = [];
    foreach ($results as $row) {
        $catId = $row['CAT_ID'];
        if (!isset($categories[$catId])) {
            $categories[$catId] = [
                'CAT_ID' => $catId,
                'Category_Name' => $row['Category_Name'],
                'subcategories' => []
            ];
        }
        if (!empty($row['SUBCAT_ID'])) {
            $categories[$catId]['subcategories'][] = [
                'SUBCAT_ID' => $row['SUBCAT_ID'],
                'Subcategory_Name' => $row['Subcategory_Name']
            ];
        }
    }

   return view('products.create', ['categories' => array_values($categories)]);
}


    // Store the product into Access DB
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_code'   => 'required|string',
            'product_name' => 'required|string',
            'category_id'  => 'required|numeric',
            'sub_category_id'  => 'nullable|numeric',
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

    /**
     * AJAX endpoint: create a category and return JSON { id: <CAT_ID> }
     */
    public function storeCategory(Request $request)
    {
        try {
            $validated = $request->validate([
                'Category_Name' => 'required|string',
                'Description' => 'nullable|string'
            ]);

            $id = Product::createCategoryRecord($validated['Category_Name'], $validated['Description'] ?? '');
            if ($id) {
                return response()->json(['id' => $id]);
            }

            return response()->json(['error' => 'Failed to create category'], 500);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'details' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * AJAX endpoint: create a subcategory under a category and return JSON { id: <SUBCAT_ID> }
     */
    public function storeSubcategory(Request $request)
    {
        try {
            $validated = $request->validate([
                'SUBCATEGORY_NAME' => 'required|string',
                'CAT_ID' => 'required'
            ]);

            $id = Product::createSubcategoryRecord($validated['CAT_ID'], $validated['SUBCATEGORY_NAME'], $validated['Description'] ?? '');
            if ($id) {
                return response()->json(['id' => $id]);
            }

            return response()->json(['error' => 'Failed to create subcategory'], 500);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'details' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
