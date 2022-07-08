<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\admin\CursoController as AdminCursoController; ;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('inicio');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/cursos/{id}', [RecipeController::class, 'show'])->name('cursos.show');

Route::middleware(['auth'])->group(function () {

    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/user/{id}', [UserController::class, 'update'])->name('user.show');

    Route::post('/cursos/{id}', [RecipeController::class, 'inscribir'])->name('cursos.show');

    Route::get('/curso/{id}/delete', [RecipeController::class, 'delete'])->name('cursos.delete');
});

Route::middleware(['auth', 'profesor'])->group(function () {
    Route::get('/cursos/new', [AdminCursoController::class, 'new'])->name('curso.new');

    Route::get('/user/{id}', [UserController::class, 'show'])->name('admin.user.show');
    Route::post('/user/{id}', [UserController::class, 'update'])->name('admin.user.update');

    Route::get('/cursos/{id}/edit', [AdminCursoController::class, 'view'])->name('admin.user.update');
    Route::post('/cursos/{id}/edit', [AdminCursoController::class, 'edit'])->name('admin.user.edit');

});
