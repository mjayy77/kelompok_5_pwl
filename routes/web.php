<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiPenjualanController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return redirect('/products');
});

//route resource for products
Route::resource('/products', ProductController::class);
Route::resource('/suppliers', SupplierController::class);
Route::resource('/transaksi', TransaksiPenjualanController::class);
Route::resource('/categories', CategoryProductController::class);

//route for send email
Route::get('/send-email/{to}/{id}', [TransaksiPenjualanController::class, 'sendEmail']);

Auth::routes();

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');