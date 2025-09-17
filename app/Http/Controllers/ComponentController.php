<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Component;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index()
    {
        // eager load category + subcategory for efficiency
        $components = Component::with(['category', 'subcategory'])->get();

        return view('components.index', compact('components'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('components.create', compact('categories', 'subcategories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string',
            'category_id'   => 'required|integer|exists:categories,id',
            'subcategory_id'=> 'nullable|integer|exists:subcategories,id',
            'cost'          => 'required|numeric',
            'price'         => 'required|numeric',
            'unit'          => 'required|string',
            'onhand'        => 'required|integer',
            'for_sale'      => 'nullable|boolean',
        ]);

        $validated['for_sale'] = $request->has('for_sale') ? 1 : 0;

        Component::create($validated);

        return redirect()->route('components.index')->with('success', 'Component created successfully.');
    }

    public function edit($id)
    {
        $component = Component::findOrFail($id);

        return view('components.edit', compact('component'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'          => 'required|string',
            'category_id'   => 'required|integer|exists:categories,id',
            'subcategory_id'=> 'nullable|integer|exists:subcategories,id',
            'cost'          => 'required|numeric',
            'price'         => 'required|numeric',
            'unit'          => 'required|string',
            'onhand'        => 'required|integer',
            'for_sale'      => 'nullable|boolean',
        ]);

        $validated['for_sale'] = $request->has('for_sale') ? 1 : 0;

        $component = Component::findOrFail($id);
        $component->update($validated);

        return redirect()->route('components.index')->with('success', 'Component updated successfully.');
    }

    public function destroy($id)
    {
        $component = Component::findOrFail($id);
        $component->delete();

        return redirect()->route('components.index')->with('success', 'Component deleted successfully.');
    }
}
