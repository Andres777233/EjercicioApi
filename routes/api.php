<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/presidents', [ApiController::class, 'getPresidents']);
Route::get('/presidents/{id}', [ApiController::class, 'getPresident']);
Route::post('/presidents', [ApiController::class, 'createPresident']);
Route::put('/presidents/{id}', [ApiController::class, 'updatePresident']);
Route::delete('/presidents/{id}', [ApiController::class, 'deletePresident']);

Route::get('/teams', [ApiController::class, 'getTeams']);
Route::get('/teams/{id}', [ApiController::class, 'getTeam']);
Route::post('/teams', [ApiController::class, 'createTeam']);
Route::put('/teams/{id}', [ApiController::class, 'updateTeam']);
Route::delete('/teams/{id}', [ApiController::class, 'deleteTeam']);

Route::get('/players', [ApiController::class, 'getPlayers']);
Route::get('/players/{id}', [ApiController::class, 'getPlayer']);
Route::post('/players', [ApiController::class, 'createPlayer']);
Route::put('/players/{id}', [ApiController::class, 'updatePlayer']);
Route::delete('/players/{id}', [ApiController::class, 'deletePlayer']);

Route::get('/games', [ApiController::class, 'getGames']);
Route::get('/games/{id}', [ApiController::class, 'getGame']);
Route::post('/games', [ApiController::class, 'createGame']);
Route::put('/games/{id}', [ApiController::class, 'updateGame']);
Route::delete('/games/{id}', [ApiController::class, 'deleteGame']);

Route::get('/goals', [ApiController::class, 'getGoals']);
Route::get('/goals/{id}', [ApiController::class, 'getGoal']);
Route::post('/goals', [ApiController::class, 'createGoal']);
Route::put('/goals/{id}', [ApiController::class, 'updateGoal']);
Route::delete('/goals/{id}', [ApiController::class, 'deleteGoal']);
