<?php

namespace App\Http\Controllers;

use App\Models\AccountingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountingCategoryController extends Controller
{
// public function index()
// {
//     // PAYABLE categories
//     $categoryPayableOptions = AccountingCategory::where('mode', 'payable')
//         ->pluck('category_payable')
//         ->filter()
//         ->unique()
//         ->values();

//     // RECEIVABLE categories
//     $categoryReceivableOptions = AccountingCategory::where('mode', 'receivable')
//         ->pluck('category_receivable')
//         ->filter()
//         ->unique()
//         ->values();

//     // TYPES GROUPED BY CATEGORY
//     $typesByCategoryPayable = AccountingCategory::where('mode', 'payable')
//         ->whereNotNull('type_payable')
//         ->select('category_payable', 'type_payable')
//         ->get()
//         ->groupBy('category_payable');

//     $typesByCategoryReceivable = AccountingCategory::where('mode', 'receivable')
//         ->whereNotNull('type_receivable')
//         ->select('category_receivable', 'type_receivable')
//         ->get()
//         ->groupBy('category_receivable');

//     return view('accounting-categories.index', compact(
//         'categoryPayableOptions',
//         'categoryReceivableOptions',
//         'typesByCategoryPayable',
//         'typesByCategoryReceivable'
//     ));
// }

public function index()
{
    // PAYABLE categories (only category records, type_payable is null)
    $categoryPayableOptions = AccountingCategory::where('mode', 'payable')
        ->whereNull('type_payable')
        ->get();

    // RECEIVABLE categories (only category records, type_receivable is null)
    $categoryReceivableOptions = AccountingCategory::where('mode', 'receivable')
        ->whereNull('type_receivable')
        ->get();

    // TYPES GROUPED BY CATEGORY
    $typesByCategoryPayable = AccountingCategory::where('mode', 'payable')
        ->whereNotNull('type_payable')
        ->select('id', 'category_payable', 'type_payable')
        ->get()
        ->groupBy('category_payable');

    $typesByCategoryReceivable = AccountingCategory::where('mode', 'receivable')
        ->whereNotNull('type_receivable')
        ->select('id', 'category_receivable', 'type_receivable')
        ->get()
        ->groupBy('category_receivable');

    return view('accounting-categories.index', compact(
        'categoryPayableOptions',
        'categoryReceivableOptions',
        'typesByCategoryPayable',
        'typesByCategoryReceivable'
    ));
}


    public function store(Request $request)
    {
        $request->validate([
            'mode' => 'required|in:payable,receivable',
            'category_payable' => 'nullable|required_if:mode,payable',
            'category_receivable' => 'nullable|required_if:mode,receivable',
            'type_payable' => 'nullable|string|max:255|required_if:mode,payable',
            'type_receivable' => 'nullable|string|max:255|required_if:mode,receivable',
        ]);

        // Duplicate check
        $exists = AccountingCategory::where('mode', $request->mode)
            ->when($request->mode === 'payable', function ($q) use ($request) {
                $q->where('category_payable', $request->category_payable)
                  ->whereRaw('LOWER(type_payable) = ?', [strtolower($request->type_payable)]);
            })
            ->when($request->mode === 'receivable', function ($q) use ($request) {
                $q->where('category_receivable', $request->category_receivable)
                  ->whereRaw('LOWER(type_receivable) = ?', [strtolower($request->type_receivable)]);
            })
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'type' => 'This category + type already exists.'
            ])->withInput();
        }

        AccountingCategory::create([
            'mode' => $request->mode,
            'category_payable' => $request->category_payable,
            'category_receivable' => $request->category_receivable,
            'type_payable' => $request->type_payable,
            'type_receivable' => $request->type_receivable,
            'status' => 'active',
        ]);

        return redirect()->route('accounting-categories.index');
    }

    public function update(Request $request, AccountingCategory $accountingCategory)
    {
        $request->validate([
            'mode' => 'required|in:payable,receivable',
            'category_payable' => 'nullable|required_if:mode,payable',
            'category_receivable' => 'nullable|required_if:mode,receivable',
            'type_payable' => 'nullable|string|max:255|required_if:mode,payable',
            'type_receivable' => 'nullable|string|max:255|required_if:mode,receivable',
        ]);

        $exists = AccountingCategory::where('mode', $request->mode)
            ->where('id', '!=', $accountingCategory->id)
            ->when($request->mode === 'payable', function ($q) use ($request) {
                $q->where('category_payable', $request->category_payable)
                  ->whereRaw('LOWER(type_payable) = ?', [strtolower($request->type_payable)]);
            })
            ->when($request->mode === 'receivable', function ($q) use ($request) {
                $q->where('category_receivable', $request->category_receivable)
                  ->whereRaw('LOWER(type_receivable) = ?', [strtolower($request->type_receivable)]);
            })
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'type' => 'This category + type already exists.'
            ])->withInput();
        }

        $accountingCategory->update([
            'mode' => $request->mode,
            'category_payable' => $request->category_payable,
            'category_receivable' => $request->category_receivable,
            'type_payable' => $request->type_payable,
            'type_receivable' => $request->type_receivable,
        ]);

        return redirect()->route('accounting-categories.index');
    }

    public function archive(AccountingCategory $accountingCategory)
    {
        $accountingCategory->update(['status' => 'archived']);
        return redirect()->route('accounting-categories.index');
    }

    public function restore(AccountingCategory $accountingCategory)
    {
        $accountingCategory->update(['status' => 'active']);
        return redirect()->route('accounting-categories.index');
    }

    // public function destroy(AccountingCategory $accountingCategory)
    // {
    //     $accountingCategory->delete();
    //     return redirect()->route('accounting-categories.index');
    // }

public function destroy($id)
{
    $category = AccountingCategory::find($id);

    if (!$category) {
        return response()->json(['success' => false, 'message' => 'Category not found'], 404);
    }

    // Determine if payable or receivable
    if ($category->mode === 'receivable') {
        $categoryName = $category->category_receivable;

        // Delete ALL rows under same receivable category
        AccountingCategory::where('category_receivable', $categoryName)->delete();

    } else {
        $categoryName = $category->category_payable;

        // Delete ALL rows under same payable category
        AccountingCategory::where('category_payable', $categoryName)->delete();
    }

    return response()->json(['success' => true]);
}

    public function addPayable(Request $request)
    {
        $request->validate([
            'category_payable' => 'required|string|max:255',
        ]);

        AccountingCategory::create([
            'mode' => 'payable',
            'category_payable' => $request->category_payable,
            'type_payable' => null,
            'status' => 'active',
            'created_by' => auth()->id()
        ]);

        return response()->json(['success' => true]);
    }

    public function addReceivable(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        AccountingCategory::create([
            'mode' => 'receivable',
            'category_receivable' => $request->name,
            'type_receivable' => null,
            'status' => 'active',
            'created_by' => auth()->id()
        ]);

        return response()->json(['success' => true]);
    }

    public function addTypePayable(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $cat = AccountingCategory::create([
            'mode' => 'payable',
            'category_payable' => $request->category,
            'type_payable' => $request->name,
            'category_receivable' => null,
            'type_receivable' => null,
            'status' => 'active',
            'created_by' => auth()->id()
        ]);

        return response()->json(['success' => true, 'data' => $cat]);
    }

    public function addTypeReceivable(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $cat = AccountingCategory::create([
            'mode' => 'receivable',
            'category_receivable' => $request->category,
            'type_receivable' => $request->name,
            'category_payable' => null,
            'type_payable' => null,
            'status' => 'active',
            'created_by' => auth()->id()
        ]);

        return response()->json(['success' => true, 'data' => $cat]);
    }

    public function destroyType($id)
    {
        // Find the type record in AccountingCategory by ID
        $type = AccountingCategory::findOrFail($id);

        // Only delete if it's a type (has type_payable or type_receivable)
        if ($type->type_payable || $type->type_receivable) {
            $type->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Not a type record'], 400);
    }
}
