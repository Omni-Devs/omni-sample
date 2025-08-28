<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index()
    {
        $components = Component::all();
        return view('components.index', compact('components'));
    }

    public function create()
    {
        return view('components.create'); // make sure you have resources/views/components/create.blade.php
    }

    // Store the component into Access DB
    public function store(Request $request)
    {
        $validated = $request->validate([
            'component_name' => 'required|string',
            'category_id'     => 'required|integer',
            'sub_category_id'     => 'required|integer',
            'component_cost'     => 'required|numeric',
            'component_price'     => 'required|numeric',
            'component_unit'      => 'required|string',
            'onhand'    => 'required|integer',
            // Remove 'for_sale' from validation, handle manually
        ]);

        $validated['for_sale'] = $request->has('for_sale') ? 1 : 0;
        Component::create($validated);

        return redirect()->route('components.index')->with('success', 'Component created successfully.');
    }

    // Show the edit form
    public function edit($id)
    {
        $component = Component::find($id);
        if (!$component) {
            return redirect()->route('components.index')->with('error', 'Component not found.');
        }
        return view('components.edit', compact('component'));
    }

    // Update the component in Access DB
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'component_name' => 'required|string',
            'category_id'     => 'required|integer',
            'sub_category_id'     => 'nullable|integer',
            'component_cost'     => 'required|numeric',
            'component_price'     => 'required|numeric',
            'component_unit'      => 'required|string',
            'onhand'    => 'required|integer',
            // Remove 'for_sale' from validation, handle manually
        ]);

        $validated['for_sale'] = $request->has('for_sale') ? 1 : 0;
        Component::updateComponent($id, $validated);

        return redirect()->route('components.index')->with('success', 'Component updated successfully.');
    }

    public function destroy($id)
    {
        $deleted = Component::deleteComponent($id);

        if ($deleted) {
            return redirect()->route('components.index')->with('success', 'Component deleted successfully.');
        }

        return redirect()->route('components.index')->with('error', 'Failed to delete component.');
    }
}
