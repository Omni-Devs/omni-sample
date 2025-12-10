<?php

namespace App\Http\Controllers;

use App\Models\CashAudit;
use Illuminate\Http\Request;

class PosClossingController extends Controller
{
    public function index()
    {
        
        return view('closing.index');
    }
    public function getClosed()
    {
        $cashAudits = CashAudit::with('cashier')->get();

        return response()->json($cashAudits);
    }
}

