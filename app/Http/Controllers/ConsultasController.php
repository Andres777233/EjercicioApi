<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;
use App\Models\Game;
use App\Models\President;

class ConsultasController extends Controller
{
    public function equipos(){
        return response()->json(Team::equiposConPresidentes());
    }

    public function jugadores(){
        return response()->json(Player::jugadoresConGoles());
    }

    public function juegos(){
        return response()->json(Game::juegosConGoles());
    }
}