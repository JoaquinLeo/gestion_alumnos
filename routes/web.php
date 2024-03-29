<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\AlumnoController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/alumnos');
}); 

Route::resource('generos', GeneroController::class ); 
Route::resource('carreras', CarreraController::class ); 
Route::resource('alumnos', AlumnoController::class ); 


