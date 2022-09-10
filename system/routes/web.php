<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// // frontview
Route::get('/', [ClientController::class, 'showHome']);

// admin
Route::get('beranda', [HomeController::class, 'showBeranda']);
Route::get('beranda/{status}', [HomeController::class, 'showBeranda']);
Route::get('kategori', [HomeController::class, 'showKategori']);
Route::get('promo', [HomeController::class, 'showPromo']);
Route::get('pelanggan', [HomeController::class, 'showPelanggan']);
Route::get('supplier', [HomeController::class, 'showSupplier']);

// // Login as Penjual
// Route::prefix('admin')->middleware('auth:penjual')->group(function () {
//     Route::resource('produk', ProdukController::class);
//     Route::resource('user', UserController::class);
//     Route::post('produk/filter', [ProdukController::class, 'filter']);
// });

// // Login as Pembeli
// Route::prefix('admin')->middleware('auth:pembeli')->group(function () {
//     Route::post('produk/filter', [ProdukController::class, 'filter']);
//     Route::resource('produk', ProdukController::class);
//     Route::resource('user', UserController::class);
// });

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::post('produk/filter', [ProdukController::class, 'filter']);
    Route::resource('produk', ProdukController::class);
    Route::resource('user', UserController::class);
});

// Setting
Route::get('setting', [SettingController::class, 'index']);
Route::post('setting', [SettingController::class, 'store']);

// Login
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout']);

// frontview client
Route::get('home', [ClientController::class, 'showHome']);
Route::get('home/{status}', [ClientController::class, 'showHome']);
Route::get('cart', [ClientController::class, 'showCart']);
Route::get('shop', [ClientController::class, 'showShop']);
Route::post('shop/filter', [ClientController::class, 'filter']);
Route::post('shop/filter2', [ClientController::class, 'filter2']);
Route::post('shop/sortby', [ClientController::class, 'sortBy']);
Route::get('product', [ClientController::class, 'showProduct']);
Route::get('product/{produk}', [ClientController::class, 'showProduct']);
Route::get('cart/{produk}', [ClientController::class, 'showCart']);
Route::get('checkout/{produk}', [ClientController::class, 'showCheckout']);
Route::get('checkout', [ClientController::class, 'showCheckout']);

// test
Route::get('test-collection', [HomeController::class, 'testCollection']);
Route::get('test-ajax', [HomeController::class, 'testAjax']);
