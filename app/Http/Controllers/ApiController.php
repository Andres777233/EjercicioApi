<?php

namespace App\Http\Controllers;

use App\Models\President;
use App\Models\Team;
use App\Models\Player;
use App\Models\Game;
use App\Models\Goal;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getPresidents()
    {
        return response()->json(President::presidentesCompleto());
    }

    public function getPresident($id)
    {
        $president = President::with('team.players.goals.game')->find($id);
        if (!$president) {
            return response()->json(['mensaje' => 'Presidente no encontrado'], 404);
        }
        return response()->json($president);
    }

    public function getTeams()
    {
        return response()->json(Team::equiposConPresidentes());
    }

    public function getTeam($id)
    {
        $team = Team::with('president', 'players.goals', 'games')->find($id);
        if (!$team) {
            return response()->json(['mensaje' => 'Equipo no encontrado'], 404);
        }
        return response()->json($team);
    }

    public function getPlayers()
    {
        return response()->json(Player::jugadoresConGoles());
    }

    public function getPlayer($id)
    {
        $player = Player::with('team', 'goals.game')->find($id);
        if (!$player) {
            return response()->json(['mensaje' => 'Jugador no encontrado'], 404);
        }
        return response()->json($player);
    }

    public function getGames()
    {
        return response()->json(Game::juegosConGoles());
    }

    public function getGame($id)
    {
        $game = Game::with('goals.player.team', 'teams')->find($id);
        if (!$game) {
            return response()->json(['mensaje' => 'Juego no encontrado'], 404);
        }
        return response()->json($game);
    }

    public function getGoals()
    {
        $goals = Goal::with('player.team', 'game')->get();
        return response()->json($goals);
    }

    public function getGoal($id)
    {
        $goal = Goal::with('player.team', 'game')->find($id);
        if (!$goal) {
            return response()->json(['mensaje' => 'Gol no encontrado'], 404);
        }
        return response()->json($goal);
    }
}
