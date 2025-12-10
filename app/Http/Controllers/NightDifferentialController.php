<?php

namespace App\Http\Controllers;

use App\Models\NightDifferential;
use Illuminate\Http\Request;

class NightDifferentialController extends Controller
{
    public function index()
    {
        // pass the latest saved night differential so the form can be pre-filled after refresh
        $latest = NightDifferential::orderBy('created_at', 'desc')->first();
        return view('night_differentials.index', compact('latest'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'time_from' => ['required', 'date_format:H:i'],
            'time_to' => ['required', 'date_format:H:i'],
            'percentage' => ['required', 'integer'],
        ]);

        $nd = NightDifferential::create([
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'percentage' => $request->percentage,
        ]);

        return response()->json($nd);
    }
}

