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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
// use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return redirect('/home');
});

// main routes
Route::resource('/products', ProductController::class);
Route::resource('/suppliers', SupplierController::class);
Route::resource('/transaksi', TransaksiPenjualanController::class);
Route::resource('/categories', CategoryProductController::class);
Route::resource('/metode-pembayaran', MetodePembayaranController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// routes for user
Route::resource('/home', HomeController::class);
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});
// Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
// Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// routes for send email
Route::post('/send-transaction-email/{id}', [TransaksiPenjualanController::class, 'sendTransaksiEmail']);

// auth routes
Auth::routes();
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::delete('/user/destroy', [UserController::class, 'destroy'])->name('users.destroy');