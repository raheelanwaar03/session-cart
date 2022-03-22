<?php

use App\Http\Controllers\AdminproductController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//Admin Routes

Route::get('/adminproduct.index',[AdminproductController::class,'index'])->name('adminproduct.index');
Route::get('/adminproduct.create',[AdminproductController::class,'create'])->name('adminproduct.create');
Route::post('/adminproduct.store',[AdminproductController::class,'store'])->name('adminproduct.store');
Route::get('/adminproduct.show/{product}',[AdminproductController::class,'show'])->name('adminproduct.show');
Route::delete('/adminproduct.destroy/{product}',[AdminproductController::class,'destroy'])->name('adminproduct.destroy');

// guset route

Route::resource('product',ProductController::class);

//cart Routes

Route::resource('cart',cartController::class);