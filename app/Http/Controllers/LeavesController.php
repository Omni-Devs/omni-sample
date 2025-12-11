<?php

namespace App\Http\Controllers;

use App\Models\WorkforceLeaves;
use Illuminate\Http\Request;

class LeavesController extends Controller
{
    public function index(Request $req)
    {
        $leaves = WorkforceLeaves::paginate(10);
    return view('leaves.index', compact('leaves'));
    }
}
