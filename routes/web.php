<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');

    Route::POST('/admin/users', [AdminController::class, 'registrarWaiter'])->name('admin.create.waiter');

    Route::get('/admin/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::POST('/admin/users/{id}/edit', [AdminController::class, 'update'])->name('admin.users.update');

    Route::get('/admin/users/{id}/delete', [AdminController::class, 'delete'])->name('admin.users.delete');
});


Auth::routes();

