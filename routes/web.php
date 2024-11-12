<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiPenjualanController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//route resource for products
Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/suppliers', SupplierController::class);
Route::resource('/transaksi', TransaksiPenjualanController::class);
Route::get('/send-email/{to}/{id}', [TransaksiPenjualanController::class, 'sendEmail']);
Route::post('/users', [UserController::class, 'store']);
