<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;

class StationController extends Controller
{
    public function index()
    {
        return view('settings.stations.index');
    }

    public function fetchStations(Request $request)
    {
        $query = Station::with('creator'); // eager load creator relationship

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $stations = $query->orderBy('created_at', 'desc')
                        ->paginate($request->per_page ?? 10);

        // Transform the data to include creator name
        $stations->getCollection()->transform(function ($station) {
            $station->created_by_name = $station->creator->name ?? 'System';
            return $station;
        });

        return response()->json($stations);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $station = Station::create([
            'name' => $request->name,
            'status' => 'active', // default to active
            'description' => $request->description,
            'created_by' => auth()->id(),
        ]);

        return response()->json(['message' => 'Station created successfully', 'station' => $station], 201);
    }
    public function update(Request $request, $id)
    {
        $station = Station::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $station->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Station updated successfully', 'station' => $station]);
    }
    public function destroy($id)
    {
        $station = Station::findOrFail($id);
        $station->delete();

        return response()->json(['message' => 'Station deleted successfully']);
    }
    public function archive($id)
    {
        $station = Station::findOrFail($id);
        $station->update(['status' => 'archived']);

        return response()->json(['message' => 'Station archived successfully']);
    }
    public function restore($id)
    {
        $station = Station::findOrFail($id);
        $station->update(['status' => 'active']);

        return response()->json(['message' => 'Station restored successfully']);
    }
    
}
