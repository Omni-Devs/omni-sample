<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Remark;

class ComponentRemarkController extends Controller
{
    public function index()
    {
        return response()->json(Remark::with(['component', 'user'])->latest()->get());
    }

    public function create()
    {
        return view('remarks.create');
    }

    public function store(Request $request)
    {
            try {
            $validated = $request->validate([
                'product_id' => 'nullable|exists:products,id',
                'component_id' => 'required|exists:components,id', // ✅ make required for component remarks
                'remarks' => 'required|string',
            ]);

            $remark = Remark::create([
                'product_id' => $validated['product_id'] ?? null,
                'component_id' => $validated['component_id'],
                'user_id' => auth()->id() ?? 1, // 👈 fallback to user 1 for testing
                'remarks' => $validated['remarks'],
                'status' => 'unread', // 👈 added
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
