<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableController;

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

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

    Route::get('/admin/tables', [TableController::class, 'index'])->name('admin.tables');


    Route::POST('/admin/users/create', [UserController::class, 'registrarWaiter'])->name('admin.create.waiter');
    Route::POST('/admin/tables/create', [TableController::class, 'registrarTable'])->name('admin.create.table');

    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::POST('/admin/users/{id}/edit', [UserController::class, 'update'])->name('admin.users.update');

    Route::get('/admin/table/{id}/edit', [TableController::class, 'edit'])->name('admin.table.edit');
    Route::POST('/admin/table/{id}/edit', [TableController::class, 'update'])->name('admin.table.update');

    Route::get('/admin/users/{id}/delete', [UserController::class, 'delete'])->name('admin.users.delete');
    Route::get('/admin/table/{id}/delete', [Tablecontroller::class, 'delete'])->name('admin.table.delete');
});


Auth::routes();

