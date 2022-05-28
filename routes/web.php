<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\Admin\PartyController as AdminPartyController;
use App\Http\Controllers\Admin\SpecialtyController as AdminSpecialtyController;
use App\Http\Controllers\Admin\AnimatorController as AdminAnimatorController;


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
    return view('inicio');
});

Route::middleware('auth')->group(function () {
    Route::get('/newParty', [PartyController::class, 'newPartyform'])->name('newParty');
    Route::post('/newParty', [PartyController::class, 'newParty'])->name('newParty');
    Route::get('/showParty/{id}', [PartyController::class, 'showParty'])->name('acceptParty');
    Route::get('/indexParties', [PartyController::class, 'index'])->name('acceptParty');
    

    Route::get('/cancel/{id}', [PartyController::class, 'delete'])->name('cancel');
    Route::get('/acept/{id}', [PartyController::class, 'acept'])->name('acept');
});

Route::middleware('admin')->prefix('/admin')->group(function () {
    // Especialidades 
    Route::get('/Specialties', [AdminSpecialtyController::class, 'index'])->name('specialties');
    
    Route::get('/newSpecialties', [AdminSpecialtyController::class, 'newForm'])->name('NewSpecialties');
    Route::post('/newSpecialties', [AdminSpecialtyController::class, 'newSpecialties']);
    
    Route::get('/deleteSpecialties/{id}', [AdminSpecialtyController::class, 'deleteSpecialties'])->name('deleteSpecialties');

    Route::get('/editSpecialties/{id}', [AdminSpecialtyController::class, 'editForm'])->name('deleteSpecialties');
    Route::post('/editSpecialties/{id}', [AdminSpecialtyController::class, 'update'])->name('deleteSpecialties');

    // Animadores
    Route::get('/Animador', [AdminAnimatorController::class, 'index'])->name('Animador');

    Route::get('/newAnimador', [AdminAnimatorController::class, 'newForm'])->name('newAnimador');
    Route::post('/newAnimador', [AdminAnimatorController::class, 'newAnimator']);

    Route::get('/deleteAnimador/{id}', [AdminAnimatorController::class, 'deleteAnimador'])->name('deleteAnimador');

    Route::get('/editAnimador/{id}', [AdminAnimatorController::class, 'editAnimador'])->name('deleteAnimador');
    Route::post('/editAnimador/{id}', [AdminAnimatorController::class, 'update'])->name('deleteAnimador');
    
    // Consultas
    Route::get('/allParties', [AdminPartyController::class, 'allParties']);
    Route::get('/partiesUser', [AdminPartyController::class, 'partiesUser']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
