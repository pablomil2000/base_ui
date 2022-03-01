<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

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
Route::get('/', [RecipeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/recipes', [RecipeController::class, 'admin']);
    Route::get('/recipes/create', [RecipeController::class, 'createRecipe']);
    Route::POST('/recipes/create', [RecipeController::class, 'GuardarReceta']);
    Route::get('/like/{id}', [RecipeController::class, 'like']);
    Route::get('/dlike/{id}', [RecipeController::class, 'dlike']);

    Route::get('/recipes/{id}/delete', [RecipeController::class, 'delete']);
    Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit']);
    Route::post('/recipes/{id}/edit', [RecipeController::class, 'update']);
});

Route::get('/recipes/{id}', [RecipeController::class, 'ShowRecipe']);

Auth::routes();

