<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->latest()->paginate(10);
        return view('subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $subcategory = Subcategory::create($validated);

        // Return JSON if request expects it
        if ($request->expectsJson()) {
            return response()->json([
                'id'          => $subcategory->id,
                'name'        => $subcategory->name,
                'category_id' => $subcategory->category_id,
                'description' => $subcategory->description,
            ]);
        }

        return redirect()
            ->route('subcategories.index')
            ->with('success', 'Subcategory created successfully.');
    }

}
