<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as PostControllerAdmin;

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

Route::middleware(['auth'])->prefix('admin/')->group(function () {
    Route::get('/', [PostControllerAdmin::class, 'index'])->name('admin.index');
    Route::get('/posts/create', [PostControllerAdmin::class, 'createForm'])->name('admin.posts.create');
    Route::post('/posts/create', [PostControllerAdmin::class, 'create']);
    Route::get('/posts/{id}/delete', [PostControllerAdmin::class, 'delete'])->name('admin.posts.delete');
    Route::get('/posts/{id}/edit', [PostControllerAdmin::class, 'edit'])->name('admin.posts.edit');
    Route::post('/posts/{id}/edit', [PostControllerAdmin::class, 'update'])->name('admin.posts.update');

});

Auth::routes();

Route::get('/', [PostController::class, 'index'])->name('inicio');
Route::get('/home', [PostController::class, 'index'])->name('home');

Route::get('/post/{id}', [PostController::class, 'getPost'])->name('post');
