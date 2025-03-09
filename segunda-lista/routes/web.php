<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Htto\Request;
use App\Http\Controllers\ExerciciosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ex1', [ExerciciosController::class, 'abrirFormEx1']);
Route::post('/respEx1', [ExerciciosController::class, 'respEx1']);

Route::get('/ex2', [ExerciciosController::class, 'abrirFormEx2']);
Route::post('/respEx2', [ExerciciosController::class, 'respEx2']);

Route::get('/ex3', [ExerciciosController::class, 'abrirFormEx3']);
Route::post('/respEx3', [ExerciciosController::class, 'respEx3']);

Route::get('/ex4', [ExerciciosController::class, 'abrirFormEx4']);
Route::post('/respEx4', [ExerciciosController::class, 'respEx4']);

Route::get('/ex5', [ExerciciosController::class, 'abrirFormEx5']);
Route::post('/respEx5', [ExerciciosController::class, 'respEx5']);

Route::get('/ex6', [ExerciciosController::class, 'abrirFormEx6']);
Route::post('/respEx6', [ExerciciosController::class, 'respEx6']);

Route::get('/ex7', [ExerciciosController::class, 'abrirFormEx7']);
Route::post('/respEx7', [ExerciciosController::class, 'respEx7']);

Route::get('/ex8', [ExerciciosController::class, 'abrirFormEx8']);
Route::post('/respEx8', [ExerciciosController::class, 'respEx8']);

Route::get('/ex9', [ExerciciosController::class, 'abrirFormEx9']);
Route::post('/respEx9', [ExerciciosController::class, 'respEx9']);

Route::get('/ex10', [ExerciciosController::class, 'abrirFormEx10']);
Route::post('/respEx10', [ExerciciosController::class, 'respEx10']);