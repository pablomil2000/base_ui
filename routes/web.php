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

Route::get('/', [RecipeController::class, 'home']);

Route::get('/home', [RecipeController::class, 'home']);


Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/newRecipe', [RecipeController::class, 'newForm'])->name('newRecipe');
    Route::post('/newRecipe', [RecipeController::class, 'addRecipe']);

    Route::get('/recipes',[RecipeController::class, 'index'])->name('recipes');

    Route::get('/recipes/{id}',[RecipeController::class, 'show'])->name('recipes.show');

    Route::get('/recipes/{id}/edit',[RecipeController::class, 'editForm'])->name('recipes.edit');
    Route::post('/recipes/{id}/edit',[RecipeController::class, 'update']);
    
    Route::get('/recipes/{id}/delete',[RecipeController::class, 'delete'])->name('recipes.delete');
    
});