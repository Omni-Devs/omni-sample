<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting as ModelsSystemSetting;
use App\SystemSetting;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $systemSettings = ModelsSystemSetting::all();
        return view('settings.create', compact('systemSettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
        {
            $validatedData = $request->validate([
                'default_currency' => 'required|string',
                'company_name' => 'required|string',
                'default_language' => 'required|string',
                'time_zone' => 'required|string',
            ]);

            $systemSetting = ModelsSystemSetting::create($validatedData);

            // Retrieve values from the configuration file
            $developed_by = config('system_settings.developed_by');
            $footer = config('system_settings.footer');
            $image = config('system_settings.image');

            // Update the system setting with the retrieved values
            $systemSetting->update([
                'developed_by' => $developed_by,
                'footer' => $footer,
                'image' => $image,
            ]);

            return redirect()->route('settings.index')->with('success', 'System Setting created successfully!');
        }
}