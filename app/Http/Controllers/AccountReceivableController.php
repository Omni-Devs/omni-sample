<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountReceivableController extends Controller
{
    public function index()
    {
        return view('accounts-receivable.index');
    }

    public function create()
    {
        return view('accounts-receivable.form');
    }
}
