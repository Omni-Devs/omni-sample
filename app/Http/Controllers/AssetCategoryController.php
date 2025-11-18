<?php

namespace App\Http\Controllers;

use App\Models\AssetCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetCategoryController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'active');
        $assetCategories = AssetCategory::where('status', $status)->orderBy('created_at', 'desc')->get();
        return view('asset-categories.index', compact('assetCategories', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $name = $request->input('name');

        // enforce case-insensitive uniqueness at application level (DB also enforces via collation)
        $exists = AssetCategory::whereRaw('LOWER(name) = ?', [strtolower($name)])->exists();
        if ($exists) {
            return back()->withErrors(['name' => 'An asset category with that name already exists.'])->withInput();
        }

        AssetCategory::create([
            'name' => $name,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('asset-categories.index', ['status' => 'active']);
    }

    public function update(Request $request, AssetCategory $assetCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $name = $request->input('name');

        $exists = AssetCategory::whereRaw('LOWER(name) = ?', [strtolower($name)])->where('id', '!=', $assetCategory->id)->exists();
        if ($exists) {
            return back()->withErrors(['name' => 'An asset category with that name already exists.'])->withInput();
        }

        $assetCategory->update(['name' => $name]);

        return redirect()->route('asset-categories.index', ['status' => $assetCategory->status]);
    }

    public function archive(AssetCategory $assetCategory)
    {
        $assetCategory->update(['status' => 'archived']);
        return redirect()->route('asset-categories.index', ['status' => 'active']);
    }

    public function restore(AssetCategory $assetCategory)
    {
        $assetCategory->update(['status' => 'active']);
        return redirect()->route('asset-categories.index', ['status' => 'archived']);
    }

    public function destroy(AssetCategory $assetCategory)
    {
        $assetCategory->delete();
        return redirect()->route('asset-categories.index');
    }
}
