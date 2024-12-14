<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiPenjualanController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MetodePembayaranController;

Route::get('/', function () {
    return redirect('/login');
});

// main routes
Route::resource('/products', ProductController::class);
Route::resource('/suppliers', SupplierController::class);
Route::resource('/transaksi', TransaksiPenjualanController::class);
Route::resource('/categories', CategoryProductController::class);
Route::resource('metodePembayarans', MetodePembayaranController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// routes for send email
Route::post('/send-transaction-email/{id}', [TransaksiPenjualanController::class, 'sendTransaksiEmail']);

// auth routes
Auth::routes();
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::delete('/user/destroy', [UserController::class, 'destroy'])->name('users.destroy');