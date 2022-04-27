<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as HomeControllerAdmin;
use App\Http\Controllers\PostController;
use App\Http\Controllers\admin\PostController as PostControllerAdmin;

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

Route::get('/', [HomeController::class, 'loadUser']);
Route::get('/home', [HomeController::class, 'loadUser'])->name('home');

Route::get('/post/{id}', [PostController::class, 'getPost'])->name('posts');


// rutas de admin
Route::middleware(['auth','admin'])->prefix('/admin')->group(function(){
    Route::get('/', [HomeControllerAdmin::class, 'loadAdmin'])->name('admin');
    Route::get('/newPost', [PostControllerAdmin::class, 'formuNewPost'])->name('newPost');
    Route::post('/newPost', [PostControllerAdmin::class, 'newPost']);
    Route::get('/post/{id}', [PostControllerAdmin::class, 'getPost'])->name('posts');
    Route::get('edit/{id}', [PostControllerAdmin::class, 'editPost'])->name('editPost');
    Route::post('edit/', [PostControllerAdmin::class, 'update'])->name('admin.update');
    Route::get('/delete/{id}', [PostControllerAdmin::class, 'deletePost'])->name('deletePost');
});

Auth::routes(["register" => false]);
