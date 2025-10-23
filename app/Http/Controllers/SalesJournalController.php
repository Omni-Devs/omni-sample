<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;

class SalesJournalController extends Controller
{
    // public function index(Request $request)
    // {
    //     $year = $request->input('year');
    //     $month = $request->input('month');

    //     // Base query: only "payments" orders
    //     $query = Order::where('status', 'payments');

    //     // Apply filters if provided
    //     if ($year) {
    //         $query->whereYear('created_at', $year);
    //     }

    //     if ($month && $month != 'all') {
    //         $query->whereMonth('created_at', $month);
    //     }

    //     // Get the filtered data
    //     $orders = $query->with(['details', 'paymentDetails'])->latest()->get();

    //     // Compute summary (totals)
    //     $summary = [
    //         'total_transactions' => $orders->count(),
    //         'gross_total' => $orders->sum('total_charge'),
    //     ];

    //     return view('reports.sales-journal', compact('orders', 'summary', 'year', 'month'));
    // }

    // with many data
//    public function index(Request $request)
// {
//     $year = $request->input('year');
//     $month = $request->input('month');
//     $from = $request->input('from_date');
//     $to = $request->input('to_date');

//     // Base query: only "payments" orders
//     $query = Order::where('status', 'payments');

//     // Apply year/month filter (for non-date-range requests)
//     if ($year) {
//         $query->whereYear('created_at', $year);
//     }

//     if ($month && $month != 'all') {
//         $query->whereMonth('created_at', $month);
//     }

//     // Apply date range filter (for Z-report date picker)
//     if ($from && $to) {
//         $query->whereBetween('created_at', [$from, $to]);
//     }

//     // Load relationships
//     $orders = $query->with(['details', 'paymentDetails.payment'])->latest()->get();

//     // === Z-READING CALCULATIONS ===
//     $grossSales = $orders->sum('gross_amount');
//     $lessDiscount = $orders->sum('sr_pwd_discount') + $orders->sum('other_discounts');
//     $taxExempt = $orders->sum('non_taxable');

//     $vat12 = $orders->sum('vat_12');
//     $vatIncl = $orders->sum('vatable');
//     $vatExcl = $orders->sum('non_taxable');

//     // Category-based totals (optional)
//     $food = $orders->flatMap->details->where('category', 'Food')->sum('total_amount');
//     $drinks = $orders->flatMap->details->where('category', 'Drinks')->sum('total_amount');

//     // Totals for payments (from PaymentDetail + Payment)
//     $paymentTotals = [
//         'Cash' => 0,
//         'Gcash' => 0,
//     ];

//     foreach ($orders as $order) {
//         foreach ($order->paymentDetails as $paymentDetail) {
//             $paymentName = strtolower($paymentDetail->payment->name ?? '');
//             $amount = $paymentDetail->amount_paid ?? 0;

//             if (isset($paymentTotals[$paymentName])) {
//                 $paymentTotals[$paymentName] += $amount;
//             }
//         }
//     }

//     // Build summary
//     $summary = [
//         'total_transactions' => $orders->count(),
//         'gross_sales' => $grossSales,
//         'less_discount' => $lessDiscount,
//         'tax_exempt' => $taxExempt,
//         'vat_12' => $vat12,
//         'vat_inclusive' => $vatIncl,
//         'vat_exclusive' => $vatExcl,
//         'food' => $food,
//         'drinks' => $drinks,
//         'discount' => $lessDiscount,
//         'tax_exempt_total' => $taxExempt,
//         'total_revenue' => ($food + $drinks) - $lessDiscount,
//         'Cash' => $paymentTotals['Cash'],
//         'Gcash' => $paymentTotals['Gcash'],
//         'gross_total' => $orders->sum('total_charge'),
//     ];

//     // ✅ Handle AJAX requests (for your JS)
//     if ($request->ajax() || $request->has('ajax')) {
//         return response()->json([
//             'from' => $from,
//             'to' => $to,
//             'grossSales' => number_format($grossSales, 2),
//             'lessDiscount' => number_format($lessDiscount, 2),
//             'taxExempt' => number_format($taxExempt, 2),
//             'vat12' => number_format($vat12, 2),
//             'vatIncl' => number_format($vatIncl, 2),
//             'vatExcl' => number_format($vatExcl, 2),
//             'food' => number_format($food, 2),
//             'drinks' => number_format($drinks, 2),
//             'discount' => number_format($lessDiscount, 2),
//             'taxExemptTotal' => number_format($taxExempt, 2),
//             'totalRevenue' => number_format(($food + $drinks) - $lessDiscount, 2),
//             'collections' => [
//                 'Cash' => number_format($paymentTotals['Cash'], 2),
//                 'Gcash' => number_format($paymentTotals['Gcash'], 2),
//             ],
//             'totalTransactions' => $orders->count(),
//             'gross_total' => $orders->sum('total_charge'),
//         ]);
//     }

//     // 🖥️ Normal view rendering
//     return view('reports.sales-journal', compact('orders', 'summary', 'year', 'month'));
// }


// public function index(Request $request)
// {
//     $year = $request->input('year');
//     $month = $request->input('month');
//     $from = $request->input('from_date');
//     $to = $request->input('to_date');

//     $query = Order::where('status', 'payments');

//     if ($year) {
//         $query->whereYear('created_at', $year);
//     }

//     if ($month && $month != 'all') {
//         $query->whereMonth('created_at', $month);
//     }

//     if ($from && $to) {
//         $from = Carbon::createFromFormat('m/d/Y', $from)->startOfDay();
//         $to = Carbon::createFromFormat('m/d/Y', $to)->endOfDay();
//         $query->whereBetween('created_at', [$from, $to]);
//     }

//     $orders = $query->get();

//     // 🧮 Z Reading Computations
//     $discounts = $orders->sum('sr_pwd_discount') + $orders->sum('other_discounts');

//     $grossTotal = $orders->sum('total_charge') + $discounts;
//     $lessDiscount = $discounts;
//     $taxExempt = $orders->sum('sr_pwd_discount') - $orders->sum('vat_12');
//     $total = $grossTotal - $lessDiscount - $taxExempt;
//     $netTotal = $grossTotal - $lessDiscount - $taxExempt;

//     $vat12 = $orders->sum('vat_12');
//     $vatIncl = $orders->sum('vatable');
//     $vatExcl = $orders->sum('non_taxable');

//     // 🍽 FOOD TOTAL
//     $foodTotal = OrderDetail::whereHas('order', function ($query) {
//             $query->where('status', 'payments');
//         })
//         ->where(function ($query) {
//             $query->whereHas('product.category', function ($q) {
//                 $q->where('name', 'Food');
//             })->orWhereHas('component.category', function ($q) {
//                 $q->where('name', 'Food');
//             });
//         })
//         ->sum(\DB::raw('price * quantity'));

//     // 🍹 DRINKS TOTAL
//     $drinksTotal = OrderDetail::whereHas('order', function ($query) {
//             $query->where('status', 'payments');
//         })
//         ->where(function ($query) {
//             $query->whereHas('product.category', function ($q) {
//                 $q->where('name', 'Drinks');
//             })->orWhereHas('component.category', function ($q) {
//                 $q->where('name', 'Drinks');
//             });
//         })
//         ->sum(\DB::raw('price * quantity'));
//     $FoodAndDrinksDiscountTotal = $orders->sum('sr_pwd_discount') + $orders->sum('other_discounts');

//      // 💵 COLLECTION PER PAYMENT TYPE
//     $paymentTypes = ['Cash', 'GCash', 'Debit Card', 'Credit Card', 'Check'];
//     $collections = [];
//     $totalCollection = 0;

//     // foreach ($paymentTypes as $type) {
//     //     $collectionAmount = PaymentDetail::whereHas('order', fn($q) => 
//     //             $q->where('status', 'payments')
//     //         )
//     //         ->whereHas('payment', fn($q) => 
//     //             $q->where('name', $type)
//     //         )
//     //         ->get()
//     //         ->sum(fn($detail) => $detail->amount_paid - $detail->order->change_amount);

//     //     $key = strtolower(str_replace(' ', '_', $type));
//     //     $collections[$key] = $collectionAmount;
//     //     $totalCollection += $collectionAmount;
//     // }
//     foreach ($paymentTypes as $type) {
//     $collections[strtolower(str_replace(' ', '_', $type))] = PaymentDetail::whereHas('order', fn($q) => 
//             $q->where('status', 'payments')
//         )
//         ->whereHas('payment', fn($q) => 
//             $q->where('name', $type)
//         )
//         ->get()
//         ->sum(function ($detail) use ($type) {
//             // ✅ Subtract change_amount only for CASH
//             if ($type === 'Cash') {
//                 return $detail->amount_paid - $detail->order->change_amount;
//             }

//             // ❌ Other payments (GCash, Debit, Credit, Check) no subtraction
//             return $detail->amount_paid;
//         });
// }
//     $summary = [
//         'total_transactions' => $orders->count(),
//         'gross_total' => $grossTotal,
//         'less_discount' => $lessDiscount,
//         'tax_exempt' => $taxExempt,
//         'net_total' => $netTotal,
//         'vat_12' => $vat12,
//         'vat_inclusive' => $vatIncl,
//         'vat_exclusive' => $vatExcl,
//         'food_total' => $foodTotal,
//         'drinks_total' => $drinksTotal,
//         'food_and_drinks_discount_total' => $FoodAndDrinksDiscountTotal,
//         'collections' => $collections,
//         'total_collection' => $totalCollection,
//     ];

//      // ✅ Handle AJAX requests (for your JS)
//     if ($request->ajax()) {
//         return response()->json([
//             'from' => $from,
//             'to' => $to,
//             'gross_total' => $grossTotal,
//             'less_discount' => $lessDiscount,
//             'tax_exempt' => $taxExempt,
//             'net_total' => $netTotal,
//             'vat_12' => $vat12,
//             'vat_inclusive' => $vatIncl,
//             'vat_exclusive' => $vatExcl,
//             'food_total' => $foodTotal,
//             'drinks_total' => $drinksTotal,
//             'food_and_drinks_discount_total' => $FoodAndDrinksDiscountTotal,
//             'collections' => $collections,
//             'total_collection' => $totalCollection,
//         ]);
//     }

//     return view('reports.sales-journal', compact('orders', 'summary', 'year', 'month'));
// }

public function index(Request $request)
{
    $year = $request->input('year');
    $month = $request->input('month');
    $from = $request->input('from_date');
    $to = $request->input('to_date');

    $query = Order::where('status', 'payments');

    // 🗓 Apply filters
    if ($year) {
        $query->whereYear('created_at', $year);
    }

    if ($month && $month != 'all') {
        $query->whereMonth('created_at', $month);
    }

    if ($from && $to) {
        try {
            // Detect whether date is "YYYY-MM-DD" or "MM/DD/YYYY"
            if (strpos($from, '/') !== false) {
                $from = Carbon::createFromFormat('m/d/Y', $from)->startOfDay();
                $to = Carbon::createFromFormat('m/d/Y', $to)->endOfDay();
            } else {
                $from = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
                $to = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
            }

            $query->whereBetween('created_at', [$from, $to]);
        } catch (\Exception $e) {
            \Log::error('Invalid date format: ' . $e->getMessage());
        }
    }

    $orders = $query->get();

    // 🧮 Z Reading Computations
    $discounts = $orders->sum('sr_pwd_discount') + $orders->sum('other_discounts');

    $grossTotal = $orders->sum('total_charge');
    $lessDiscount = $discounts;
    $taxExempt = $orders->sum('sr_pwd_discount') - $orders->sum('vat_12');
    $total = $grossTotal - $lessDiscount - $taxExempt;
    $netTotal = $grossTotal - $lessDiscount - $taxExempt;

    $vat12 = $orders->sum('vat_12');
    $vatIncl = $orders->sum('vatable');
    $vatExcl = $orders->sum('total_charge');

    // 🍽 FOOD TOTAL (filtered by date)
    $foodQuery = OrderDetail::whereHas('order', function ($query) use ($from, $to) {
        $query->where('status', 'payments');
        if ($from && $to) {
            $query->whereBetween('created_at', [$from, $to]);
        }
    })
    ->where(function ($query) {
        $query->whereHas('product.category', function ($q) {
            $q->where('name', 'Food');
        })->orWhereHas('component.category', function ($q) {
            $q->where('name', 'Food');
        });
    });

    $foodTotal = $foodQuery->sum(\DB::raw('price * quantity'));

    // 🍹 DRINKS TOTAL (filtered by date)
    $drinksQuery = OrderDetail::whereHas('order', function ($query) use ($from, $to) {
        $query->where('status', 'payments');
        if ($from && $to) {
            $query->whereBetween('created_at', [$from, $to]);
        }
    })
    ->where(function ($query) {
        $query->whereHas('product.category', function ($q) {
            $q->where('name', 'Drinks');
        })->orWhereHas('component.category', function ($q) {
            $q->where('name', 'Drinks');
        });
    });

    $drinksTotal = $drinksQuery->sum(\DB::raw('price * quantity'));

    $FoodAndDrinksDiscountTotal = $orders->sum('sr_pwd_discount') + $orders->sum('other_discounts');

    // 💵 COLLECTION PER PAYMENT TYPE (filtered by date)
    $paymentTypes = ['Cash', 'GCash', 'Debit Card', 'Credit Card', 'Check'];
    $collections = [];
    $totalCollection = 0;

    foreach ($paymentTypes as $type) {
        $collectionQuery = PaymentDetail::whereHas('order', function ($q) use ($from, $to) {
            $q->where('status', 'payments');
            if ($from && $to) {
                $q->whereBetween('created_at', [$from, $to]);
            }
        })
        ->whereHas('payment', fn($q) => $q->where('name', $type))
        ->get();

        $collections[strtolower(str_replace(' ', '_', $type))] = $collectionQuery->sum(function ($detail) use ($type) {
            if ($type === 'Cash') {
                return $detail->amount_paid - $detail->order->change_amount;
            }
            return $detail->amount_paid;
        });

        $totalCollection += $collections[strtolower(str_replace(' ', '_', $type))];
    }

    // 📊 Summary
    $summary = [
        'total_transactions' => $orders->count(),
        'gross_total' => $grossTotal,
        'less_discount' => $lessDiscount,
        'tax_exempt' => $taxExempt,
        'net_total' => $netTotal,
        'vat_12' => $vat12,
        'vat_inclusive' => $vatIncl,
        'vat_exclusive' => $vatExcl,
        'food_total' => $foodTotal,
        'drinks_total' => $drinksTotal,
        'food_and_drinks_discount_total' => $FoodAndDrinksDiscountTotal,
        'collections' => $collections,
        'total_collection' => $totalCollection,
    ];

    // ✅ AJAX Response
    if ($request->ajax()) {
        return response()->json($summary);
    }

    return view('reports.sales-journal', compact('orders', 'summary', 'year', 'month'));
}

}