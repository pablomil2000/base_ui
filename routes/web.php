<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComentController;
// use App\Http\Controllers\LikesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::get('/configuracion',[UserController::class, 'setting'])->name('settings');
    Route::post('/configuracion',[UserController::class, 'userUpdate'])->name('settings.update');

    Route::get('/perfil/{nick}',[UserController::class, 'perfil'])->name('perfil');

    Route::get('/upload', [PostController::class, 'upload'])->name('post.upload');
    Route::POST('/upload', [PostController::class, 'publish'])->name('post.upload');
    Route::get('/home', [PostController::class, 'index'])->name('home');

    // Route::get('/like/{id}', [LikesController::class, 'like'])->name('like');
    Route::get('/like/{id}', [UserController::class, 'like'])->name('like');

    Route::get('/post/{id}', [Postcontroller::class, 'show'])->name('post.show');
    Route::post('/post/{id}', [ComentController::class, 'public'])->name('post.publiComent');

    Route::get('/post/{id}/edit', [Postcontroller::class, 'edit'])->name('post.edit');
    Route::post('/post/{id}/edit', [Postcontroller::class, 'show'])->name('post.update');

    Route::delete('/post/{id}', [ComentController::class, 'delete'])->name('post.delete.coment');
    Route::delete('/post/{id}/delete', [PostController::class, 'delete'])->name('post.delete');
});

Auth::routes();
