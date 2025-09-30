<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Component;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComponentController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'active');

        // eager load category + subcategory for efficiency
        $components = Component::with(['category', 'subcategory'])
            ->where('status', $status)
                        ->orderBy('created_at', 'desc')
                        ->get();
                        
        return view('components.index', compact('components', 'status'));
    }

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        $subcategories = Subcategory::all();
        return view('components.create', compact('categories', 'subcategories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string',
            'code'          => 'required|string|unique:components,code',
            'category_id'   => 'required|integer|exists:categories,id',
            'subcategory_id'=> 'nullable|integer|exists:subcategories,id',
            'cost'          => 'required|numeric',
            'price'         => 'required|numeric',
            'unit'          => 'required|string',
            'onhand'        => 'required|integer',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'for_sale'      => 'nullable|boolean',
        ]);

        $validated['for_sale'] = $request->has('for_sale') ? 1 : 0;

        // ✅ Handle single image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('components', 'public');
        }

        Component::create($validated);

        return redirect()->route('components.index')->with('success', 'Component created successfully.');
    }

    public function edit($id)
    {
        // eager load recipes so the view can pre-fill rows
        $component = Component::with('recipes')->findOrFail($id);

        // pass categories, subcategories and components to the edit view
        $categories = Category::where('status', 'active')->get();
        $subcategories = Subcategory::all();
        $components = Component::all();

        return view('components.edit', compact('component', 'categories', 'subcategories', 'components'));
    }

    public function update(Request $request, Component $component)
    {
        $validated = $request->validate([
            'code'        => 'required|string|unique:components,code,' . $component->id,
            'name'        => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'subcategory_id' => 'nullable|integer|exists:subcategories,id',
            'cost'        => 'required|numeric',
            'price'       => 'required|numeric',
            'unit'        => 'required|string',
            'onhand'      => 'required|numeric',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'for_sale'    => 'nullable|boolean',
        ]);

        $validated['for_sale'] = $request->has('for_sale') ? 1 : 0;

        // ✅ Replace old image if new one is uploaded
        if ($request->hasFile('image')) {
            if ($component->image && Storage::disk('public')->exists($component->image)) {
                Storage::disk('public')->delete($component->image);
            }
            $validated['image'] = $request->file('image')->store('components', 'public');
        }

        $component->update($validated);

        return redirect()->route('components.index')->with('success', 'Component updated successfully!');
    }

    public function destroy($id)
    {
        $component = Component::findOrFail($id);
        $component->delete();

        return redirect()->route('components.index')->with('success', 'Component deleted successfully.');
    }

    /**
     * Move the specified Component to archive (status change).
     */
    public function archive(Component $component)
    {
        $component->update([
            'status' => 'archived'
        ]);

        return redirect()
            ->route('components.index')
            ->with('success', 'Unit moved to archive successfully.');
    }

    /**
     * Restore a component from archive.
     */
    public function restore(Component $component)
    {
        $component->update([
            'status' => 'active'
        ]);

        return redirect()
            ->route('components.index')
            ->with('success', 'Component restored to active successfully.');
    }
}
