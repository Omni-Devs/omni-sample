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
            'component' => 'required|string',
            'catid'     => 'required|integer',
            'ucost'     => 'required|numeric',
            'unit'      => 'required|string',
            'onhand'    => 'required|integer',
        ]);

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
            'component' => 'required|string',
            'catid'     => 'required|integer',
            'ucost'     => 'required|numeric',
            'unit'      => 'required|string',
            'onhand'    => 'required|integer',
        ]);

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
