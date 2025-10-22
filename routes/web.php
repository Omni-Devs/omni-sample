

<?php

use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SystemSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CashEquivalentController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RemarkController;
use App\Http\Controllers\SalesJournalController;use App\Http\Controllers\PosSessionController;


Route::get('/', function () {
    return redirect()->route('login');
})->middleware('redirect.auth');

Route::get('/pos', function () {
    return view('point-of-sale');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/order/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::post('/orders/{order}/billout', [OrderController::class, 'billout'])->name('orders.billout');
Route::get('/orders/{id}/show', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::post('/orders/update/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::post('/orders/{order}/payment', [OrderController::class, 'payment'])->name('orders.payment');
Route::get('/reports/sales-journal', [SalesJournalController::class, 'index'])->name('reports.sales-journal');

Route::get('/kitchen', [KitchenController::class, 'index'])->name('kitchen.index');
Route::get('/kitchen/served', [KitchenController::class, 'showServed'])->name('kitchen.served');
Route::get('/kitchen/walked', [KitchenController::class, 'showWalked'])->name('kitchen.walked');
Route::post('/order-items/update-or-create', [KitchenController::class, 'updateOrCreate']);


Route::post('/orders/{order}/payment', [OrderController::class, 'payment'])->name('orders.payment');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// routes/web.php
Route::prefix('pos/session')->group(function () {
    Route::get('/check', [PosSessionController::class, 'checkSession']);
    Route::post('/open', [PosSessionController::class, 'openSession']);
    Route::post('/close', [PosSessionController::class, 'closeSession']);
});



Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/profile', [UserController::class, 'viewProfile'])->name('users.profile');
Route::put('/users/{user}/archive', [UserController::class, 'archive'])->name('users.archive');
Route::put('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');



Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{product}/archive', [ProductController::class, 'archive'])->name('products.archive');
Route::put('/products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');

Route::get('/components', [ComponentController::class, 'index'])->name('components.index');
Route::get('/components/create', [ComponentController::class, 'create'])->name('components.create');
Route::post('/components', [ComponentController::class, 'store'])->name('components.store');
Route::get('/components/{id}/edit', [ComponentController::class, 'edit'])->name('components.edit');
Route::put('/components/{component}', [ComponentController::class, 'update'])->name('components.update');
Route::delete('/components/{id}', [ComponentController::class, 'destroy'])->name('components.destroy');
Route::put('/components/{component}/archive', [ComponentController::class, 'archive'])->name('components.archive');
Route::put('/components/{component}/restore', [ComponentController::class, 'restore'])->name('components.restore');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::put('/categories/{category}/archive', [CategoryController::class, 'archive'])->name('categories.archive');
Route::put('/categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
Route::post('/subcategories', [SubcategoryController::class, 'store'])->name('subcategories.store');
Route::get('/categories/{id}/subcategories', [SubcategoryController::class, 'byCategory']);

Route::get('/settings', [SystemSettingController::class, 'index'])->name('settings.index');
Route::get('/settings/create', [SystemSettingController::class, 'create'])->name('settings.create');
Route::post('/settings', [SystemSettingController::class, 'store'])->name('settings.store');

Route::get('/permission', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permission/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('/permission', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permission/{role}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('/permission/{role}', [PermissionController::class, 'update'])->name('permissions.update');
Route::delete('/permissions/{role}', [PermissionController::class, 'destroy'])->name('permissions.delete');

Route::get('/branches', [BranchesController::class, 'index'])->name('branches.index');
Route::post('/branches', [BranchesController::class, 'store'])->name('branches.store');
Route::get('/branches/{id}/edit', [BranchesController::class, 'edit'])->name('branches.edit');
Route::put('/branches/{id}/update', [BranchesController::class, 'update'])->name('branches.update');
Route::delete('/branches/{id}', [BranchesController::class, 'destroy'])->name('branches.destroy');

Route::get('/units', [UnitController::class, 'index'])->name('units.index');
Route::post('/units', [UnitController::class, 'store'])->name('units.store');
Route::get('/units/{id}/edit', [UnitController::class, 'edit'])->name('units.edit');
Route::put('/units/{unit}', [UnitController::class, 'update'])->name('units.update');
Route::delete('/units/{id}', [UnitController::class, 'destroy'])->name('units.destroy');
Route::put('/units/{unit}/archive', [UnitController::class, 'archive'])->name('units.archive');
Route::put('/units/{unit}/restore', [UnitController::class, 'restore'])->name('units.restore');

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
Route::put('/payments/{payment}/archive', [PaymentController::class, 'archive'])->name('payments.archive');
Route::put('/payments/{payment}/restore', [PaymentController::class, 'restore'])->name('payments.restore');

Route::get('/cash-equivalents', [CashEquivalentController::class, 'index'])->name('cash_equivalents.index');
Route::post('/cash-equivalents', [CashEquivalentController::class, 'store'])->name('cash_equivalents.store');
Route::get('/cash-equivalents/{id}/edit', [CashEquivalentController::class, 'edit'])->name('cash_equivalents.edit');
Route::put('/cash-equivalents/{cash_equivalent}', [CashEquivalentController::class, 'update'])->name('cash_equivalents.update');
Route::delete('/cash-equivalents/{id}', [CashEquivalentController::class, 'destroy'])->name('cash_equivalents.destroy');
Route::put('/cash-equivalents/{cash_equivalent}/archive', [CashEquivalentController::class, 'archive'])->name('cash_equivalents.archive');
Route::put('/cash-equivalents/{cash_equivalent}/restore', [CashEquivalentController::class, 'restore'])->name('cash_equivalents.restore');

Route::get('/discounts', [DiscountController::class, 'index'])->name('discounts.index');
Route::post('/discounts', [DiscountController::class, 'store'])->name('discounts.store');
Route::get('/discounts/{id}/edit', [DiscountController::class, 'edit'])->name('discounts.edit');
Route::put('/discounts/{discount}', [DiscountController::class, 'update'])->name('discounts.update');
Route::delete('/discounts/{id}', [DiscountController::class, 'destroy'])->name('discounts.destroy');
Route::put('/discounts/{discount}/archive', [DiscountController::class, 'archive'])->name('discounts.archive');
Route::put('/discounts/{discount}/restore', [DiscountController::class, 'restore'])->name('discounts.restore');

Route::get('/products/{product}/remarks', [ProductController::class, 'remarks']);
Route::post('/products/{product}/remarks', [ProductController::class, 'storeRemark']);

Route::get('/components/{component}/remarks', [ComponentController::class, 'remarks']);
Route::post('/components/{component}/remarks', [ComponentController::class, 'storeRemark']);
