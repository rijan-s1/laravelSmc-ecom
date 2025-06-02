<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/',[PagesController::class,'home'])->name('home');
Route::get('/categoryproducts/{catid}',[PagesController::class,'categoryproducts'])->name('categoryproducts');
Route::get('/viewproduct/{id}',[PagesController::class,'viewproduct'])->name('viewproduct');

Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {

//category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
//cretae category
Route::get('/category/create',[CategoryController::class,'create'])->name ('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name ('category.store');
Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name ('category.edit');
Route::post('/category/{id}/update',[CategoryController::class,'update'])->name ('category.update');
Route::post('/category/destroy',[CategoryController::class,'destroy'])->name ('category.destroy');
//product route
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
});
Route::get('/product/create',[ProductController::class,'create'])->name ('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name ('product.store');
Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name ('product.edit');
Route::post('/product/{id}/update',[ProductController::class,'update'])->name ('product.update');
Route::post('/product/destroy',[ProductController::class,'destroy'])->name ('product.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');
});

require __DIR__.'/auth.php';
