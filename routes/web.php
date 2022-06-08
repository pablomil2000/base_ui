<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/cars', [CarController::class, 'index'])->name('cars');
    Route::get('/car/{id}', [CarController::class, 'find'])->name('car');
    Route::get('/newCar', [CarController::class, 'newCarForm'])->name('newCars');
    Route::post('/newCar', [CarController::class, 'storage'])->name('newCars');
});

Auth::routes();

