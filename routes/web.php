<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiPenjualanController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//route resource for products
Route::resource('/products', ProductController::class);
Route::resource('/suppliers', SupplierController::class);
Route::resource('/transaksi', TransaksiPenjualanController::class);

//route for send email
Route::get('/send-email/{to}/{id}', [TransaksiPenjualanController::class, 'sendEmail']);
