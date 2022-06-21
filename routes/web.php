<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\ProductController as adminProductController;
use App\Http\Controllers\CartDetailsController;
use App\Http\Controllers\admin\homeController as adminHomeController;

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




Route::get('/', [HomeController::class, 'inicio'])->name('inicio');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop/{slug}', [HomeController::class, 'shopFilter'])->name('shop.filter');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::POST('/product/{id}', [CartDetailsController::class, 'addCar'])->name('card.add');


Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartDetailsController::class, 'show'])->name('cart');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/cart', [CartDetailsController::class, 'delete'])->name('cart.delete');

    Route::get('/pedidos', [CartController::class, 'index'])->name('pedidos');
    Route::get('/pedidos/{id}', [CartDetailsController::class, 'show'])->name('pedidos.show');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [adminHomeController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin/products', [adminProductController::class, 'index'])->name('admin.product.list');

    Route::get('/admin/product/new', [adminProductController::class, 'newForm'])->name('admin.product.new');
    Route::post('/admin/product/new', [adminProductController::class, 'new'])->name('admin.product.new');

    Route::get('/admin/product/{id}/edit', [adminProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/admin/product/{id}/edit', [adminProductController::class, 'update'])->name('admin.product.update');

    Route::get('/admin/product/{id}/delete', [adminProductController::class, 'delete'])->name('admin.product.delete');
});


Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
