<?php

use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SystemSettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pos', function () {
    return view('point-of-sale');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/components', [ComponentController::class, 'index'])->name('components.index');
Route::get('/components/create', [ComponentController::class, 'create'])->name('components.create');
Route::post('/components', [ComponentController::class, 'store'])->name('components.store');
Route::get('/components/{id}/edit', [ComponentController::class, 'edit'])->name('components.edit');
Route::put('/components/{component}', [ComponentController::class, 'update'])->name('components.update');
Route::delete('/components/{id}', [ComponentController::class, 'destroy'])->name('components.destroy');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
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