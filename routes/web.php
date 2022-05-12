<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'inicio']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'inicio'])->name('home');

Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');

Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'getProduct'])->name('detail');

Route::get('/car', [App\Http\Controllers\CarController::class, 'getCar'])->name('car');
Route::get('/car/{id}', [App\Http\Controllers\CarDetailController::class, 'addCar']);

