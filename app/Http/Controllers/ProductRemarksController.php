<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductRemarksController extends Controller
{
    public function index(Product $product)
    {
        // Load related remarks from your existing table
        return response()->json($product->remarks()->latest()->get());
    }

    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'remarks' => 'required|string|max:500',
        ]);

        // Log incoming payload for debugging
        Log::info('ProductRemarksController@store payload', [
            'product_id' => $product->id,
            'payload' => $request->all(),
        ]);

        // Save to your existing remarks table
        $remark = $product->remarks()->create([
            'remarks' => $validated['remarks'],
        ]);

        // Return the created remark so the frontend can confirm
        return response()->json(['success' => true, 'remark' => $remark]);
    }
}
