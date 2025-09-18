<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $category = Category::create($validated);

    // Return JSON if request expects it
    if ($request->expectsJson()) {
        return response()->json([
            'id' => $category->id,
            'name' => $category->name,
            'description' => $category->description,
        ]);
    }

    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
}
}
