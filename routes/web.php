<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultasController;


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
    return response()->json();
});  

Route::get('/consultas/equipos', [ConsultasController::class, 'equipos']);
Route::get('/consultas/jugadores', [ConsultasController::class, 'jugadores']);
Route::get('/consultas/juegos', [ConsultasController::class, 'juegos']);