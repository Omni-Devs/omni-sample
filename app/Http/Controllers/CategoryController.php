<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('creator')->get();
        return view('categories.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'created_at'  => 'nullable|date',
        ]);

        // Assign the logged-in user ID as the creator
        $validated['created_by'] = auth()->id();

        // If user didn’t select a manual created_at, default to now()
        if (empty($validated['created_at'])) {
            $validated['created_at'] = now();
        }

        // Manually handle timestamps so updated_at is also set
        $category = new Category($validated);
        $category->updated_at = now();
        $category->save();

        if ($request->expectsJson()) {
            return response()->json([
                'id'          => $category->id,
                'name'        => $category->name,
                'description' => $category->description,
                'created_by'  => $category->creator?->username,
                'created_at'  => $category->created_at->format('Y-m-d H:i'),
            ]);
        }

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

        public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'created_at' => 'nullable|date',
        ]);

        // If created_at is empty, keep existing timestamp
        if (empty($validated['created_at'])) {
            unset($validated['created_at']);
        }

        $category->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'id'         => $category->id,
                'name'       => $category->name,
                'description' => $category->description,
                'created_by' => $category->creator?->username,
                'created_at' => $category->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
}
