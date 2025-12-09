<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'active');

        $statuses = Status::where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('statuses.index', compact('statuses', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:statuses,name',
        ]);

        Status::create([
            'name' => $request->name,
            'created_by' => auth()->id(),
        ]);

        return back()->with('success', 'Status added successfully!');
    }

    public function edit(Status $status)
    {
        return response()->json($status);
    }


    public function update(Request $request, Status $status)
    {
        $request->validate([
            'name' => 'required|unique:statuses,name,' . $status->id,
        ]);

        $status->update([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Status updated successfully!');
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return back()->with('success', 'Status deleted permanently!');
    }

    public function archive(Status $status)
    {
        $status->update(['status' => 'archived']);
        return back()->with('success', 'Status archived!');
    }

    public function restore(Status $status)
    {
        $status->update(['status' => 'active']);
        return back()->with('success', 'Status restored!');
    }
}
