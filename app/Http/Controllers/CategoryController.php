<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'active'); // default active

        $categories = Category::where('status', $status)
        ->orderBy('created_at', 'desc')
        ->get();

        $allCategories = Category::pluck('name', 'id');
        
        return view('categories.index', compact('categories', 'status', 'allCategories'));
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

    /**
     * Move the specified Category to archive (status change).
     */
    public function archive(Category $category)
    {
        $category->update([
            'status' => 'archived'
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category moved to archive successfully.');
    }

    /**
     * Restore a category from archive.
     */
    public function restore(Category $category)
    {
        $category->update([
            'status' => 'active'
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category restored to active successfully.');
    }
}
