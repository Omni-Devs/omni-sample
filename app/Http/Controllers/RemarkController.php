<?php

namespace App\Http\Controllers;

use App\Models\Remark;
use Illuminate\Http\Request;

class RemarkController extends Controller
{
    public function index()
    {
        return response()->json(Remark::with(['product', 'user'])->latest()->get());
    }

    public function create()
    {
        return view('remarks.create');
    }

    public function store(Request $request)
    {
            try {
            $validated = $request->validate([
                'product_id' => 'required|exists:products,id',
                'remarks' => 'required|string',
                'component_id' => 'nullable|exists:components,id',
            ]);

            $remark = \App\Models\Remark::create([
                'product_id' => $validated['product_id'],
                'component_id' => $validated['component_id'] ?? null,
                'user_id' => auth()->id() ?? 1, // 👈 fallback to user 1 for testing
                'remarks' => $validated['remarks'],
            ]);

            return response()->json([
                'message' => 'Remark added successfully',
                'remark' => $remark
            ]);
        } catch (\Exception $e) {
            // 👇 send back full error so you can see it in the browser
            return response()->json([
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    public function markRead($id)
    {
        $remark = Remark::findOrFail($id);
        $remark->update(['status' => 'read']);

        return response()->json(['message' => 'Marked as read']);
    }

    public function markUnread($id)
    {
        $remark = Remark::findOrFail($id);
        $remark->update(['status' => 'unread']);

        return response()->json(['message' => 'Marked as unread']);
    }
}
