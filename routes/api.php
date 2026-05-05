<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/presidents', [ApiController::class, 'getPresidents']);
Route::get('/presidents/{id}', [ApiController::class, 'getPresident']);

Route::get('/teams', [ApiController::class, 'getTeams']);
Route::get('/teams/{id}', [ApiController::class, 'getTeam']);

Route::get('/players', [ApiController::class, 'getPlayers']);
Route::get('/players/{id}', [ApiController::class, 'getPlayer']);

Route::get('/games', [ApiController::class, 'getGames']);
Route::get('/games/{id}', [ApiController::class, 'getGame']);

Route::get('/goals', [ApiController::class, 'getGoals']);
Route::get('/goals/{id}', [ApiController::class, 'getGoal']);
