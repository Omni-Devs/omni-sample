<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $recipe = new Recipe();
        $recipe->product_id = $request->input('product_id');
        $recipe->component_id = $request->input('component_id');
        $recipe->quantity = $request->input('quantity');;
        $recipe->save();

        return redirect()->route('recipes.show', $recipe);
    }
}