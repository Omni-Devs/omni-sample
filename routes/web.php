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

Route::get('/', function () {
    return redirect()->route('login');
})->middleware('redirect.auth');

Route::get('/pos', function () {
    return view('point-of-sale');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/orders', function () {
    return view('orders.index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

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

Route::get('/discounts', [DiscountController::class, 'index'])->name('discounts.index');
Route::post('/discounts', [DiscountController::class, 'store'])->name('discounts.store');
Route::get('/discounts/{id}/edit', [DiscountController::class, 'edit'])->name('discounts.edit');
Route::put('/discounts/{discount}', [DiscountController::class, 'update'])->name('discounts.update');
Route::delete('/discounts/{id}', [DiscountController::class, 'destroy'])->name('discounts.destroy');
Route::put('/discounts/{discount}/archive', [DiscountController::class, 'archive'])->name('discounts.archive');
Route::put('/discounts/{discount}/restore', [DiscountController::class, 'restore'])->name('discounts.restore');
