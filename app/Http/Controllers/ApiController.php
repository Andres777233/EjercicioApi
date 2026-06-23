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

    public function createPresident(Request $request)
    {
        $president = President::create($request->all());
        return response()->json($president, 201);
    }

    public function updatePresident(Request $request, $id)
    {
        $president = President::find($id);
        if (!$president) {
            return response()->json(['mensaje' => 'Presidente no encontrado'], 404);
        }
        $president->update($request->all());
        return response()->json($president);
    }

    public function deletePresident($id)
    {
        $president = President::find($id);
        if (!$president) {
            return response()->json(['mensaje' => 'Presidente no encontrado'], 404);
        }
        $president->delete();
        return response()->json(['mensaje' => 'Presidente eliminado']);
    }

    public function createTeam(Request $request)
    {
        $team = Team::create($request->all());
        return response()->json($team, 201);
    }

    public function updateTeam(Request $request, $id)
    {
        $team = Team::find($id);
        if (!$team) {
            return response()->json(['mensaje' => 'Equipo no encontrado'], 404);
        }
        $team->update($request->all());
        return response()->json($team);
    }

    public function deleteTeam($id)
    {
        $team = Team::find($id);
        if (!$team) {
            return response()->json(['mensaje' => 'Equipo no encontrado'], 404);
        }
        $team->delete();
        return response()->json(['mensaje' => 'Equipo eliminado']);
    }

    public function createPlayer(Request $request)
    {
        $player = Player::create($request->all());
        return response()->json($player, 201);
    }

    public function updatePlayer(Request $request, $id)
    {
        $player = Player::find($id);
        if (!$player) {
            return response()->json(['mensaje' => 'Jugador no encontrado'], 404);
        }
        $player->update($request->all());
        return response()->json($player);
    }

    public function deletePlayer($id)
    {
        $player = Player::find($id);
        if (!$player) {
            return response()->json(['mensaje' => 'Jugador no encontrado'], 404);
        }
        $player->delete();
        return response()->json(['mensaje' => 'Jugador eliminado']);
    }

    public function createGame(Request $request)
    {
        $game = Game::create($request->all());
        return response()->json($game, 201);
    }

    public function updateGame(Request $request, $id)
    {
        $game = Game::find($id);
        if (!$game) {
            return response()->json(['mensaje' => 'Juego no encontrado'], 404);
        }
        $game->update($request->all());
        return response()->json($game);
    }

    public function deleteGame($id)
    {
        $game = Game::find($id);
        if (!$game) {
            return response()->json(['mensaje' => 'Juego no encontrado'], 404);
        }
        $game->delete();
        return response()->json(['mensaje' => 'Juego eliminado']);
    }

    public function createGoal(Request $request)
    {
        $goal = Goal::create($request->all());
        return response()->json($goal, 201);
    }

    public function updateGoal(Request $request, $id)
    {
        $goal = Goal::find($id);
        if (!$goal) {
            return response()->json(['mensaje' => 'Gol no encontrado'], 404);
        }
        $goal->update($request->all());
        return response()->json($goal);
    }

    public function deleteGoal($id)
    {
        $goal = Goal::find($id);
        if (!$goal) {
            return response()->json(['mensaje' => 'Gol no encontrado'], 404);
        }
        $goal->delete();
        return response()->json(['mensaje' => 'Gol eliminado']);
    }
}
