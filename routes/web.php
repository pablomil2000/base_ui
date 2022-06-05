<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/AddProfessor', [ProfessorController::class, 'newForm'])->name('profesor.new');
    Route::post('/AddProfessor', [ProfessorController::class, 'new']);
    Route::get('/listProfessor', [ProfessorController::class, 'list'])->name('profesor.list');

    Route::get('/AddAlumno', [StudentController::class, 'newForm'])->name('alumno.new');
    Route::post('/AddAlumno', [StudentController::class, 'new']);
    Route::get('/listAlumno', [StudentController::class, 'list'])->name('alumno.list');

});


Auth::routes(['register'=> false]);