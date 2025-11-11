<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index()
    {
        return view('inventory_audit.index');
    }
    public function create()
    {
        $users = User::all(['id', 'name']);

        $products = Product::with([
            'category:id,name',
            'subcategory:id,name' // make sure your Product model has a subcategory() relation
        ])
        ->select('id', 'code', 'name', 'status', 'category_id', 'subcategory_id')
        ->get();

    return view('inventory_audit.create', compact('users', 'products'));
    }
}
