<?php

use App\Http\Controllers\AdminproductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/adminproduct.index',[AdminproductController::class,'index'])->name('adminproduct.index');
Route::get('/adminproduct.create',[AdminproductController::class,'create'])->name('adminproduct.create');
Route::post('/adminproduct.store',[AdminproductController::class,'store'])->name('adminproduct.store');
Route::delete('/adminproduct.destroy',[AdminproductController::class,'destroy'])->name('adminproduct.destroy');


// guset route
Route::resource('product',ProductController::class);