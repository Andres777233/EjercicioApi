<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\President;
use App\Models\Team;
use App\Models\Player;
use App\Models\Game;
use App\Models\Goal;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $president = President::create(['name' => 'Juan Perez', 'year' => '2020-01-01']);
        $president2 = President::create(['name' => 'Maria Gomez', 'year' => '2021-05-15']);

        $team = Team::create([
            'name' => 'Los Tigres', 'city' => 'Bogota', 'stadium' => 'Estadio Central',
            'capacity' => 50000, 'year_of_foundation' => '1980-01-01', 'president_id' => $president->id
        ]);
        $team2 = Team::create([
            'name' => 'Las Aguilas', 'city' => 'Medellin', 'stadium' => 'Estadio Norte',
            'capacity' => 30000, 'year_of_foundation' => '1995-06-01', 'president_id' => $president2->id
        ]);

        $player = Player::create(['name' => 'Carlos Lopez', 'position' => 'Delantero', 'team_id' => $team->id]);
        $player2 = Player::create(['name' => 'Luis Martinez', 'position' => 'Arquero', 'team_id' => $team->id]);
        $player3 = Player::create(['name' => 'Ana Torres', 'position' => 'Defensa', 'team_id' => $team2->id]);
        $player4 = Player::create(['name' => 'Pedro Ramirez', 'position' => 'Mediocampista', 'team_id' => $team2->id]);

        $game = Game::create(['date' => '2026-01-15', 'local_goals' => 2, 'visitor_goals' => 1]);
        $game2 = Game::create(['date' => '2026-02-20', 'local_goals' => 0, 'visitor_goals' => 3]);

        $team->games()->attach($game->id);
        $team2->games()->attach($game->id);
        $team->games()->attach($game2->id);
        $team2->games()->attach($game2->id);

        Goal::create(['name' => 'Gol de cabeza', 'description' => 'Gol de tiro de esquina', 'player_id' => $player->id, 'game_id' => $game->id]);
        Goal::create(['name' => 'Gol de penal', 'description' => 'Penal bien ejecutado', 'player_id' => $player->id, 'game_id' => $game->id]);
        Goal::create(['name' => 'Gol de media distancia', 'description' => 'Remate desde fuera del area', 'player_id' => $player2->id, 'game_id' => $game->id]);
        Goal::create(['name' => 'Gol de tiro libre', 'description' => 'Tiro libre directo', 'player_id' => $player4->id, 'game_id' => $game2->id]);
        Goal::create(['name' => 'Gol de jugada', 'description' => 'Jugada colectiva', 'player_id' => $player3->id, 'game_id' => $game2->id]);
        Goal::create(['name' => 'Gol de cabeza', 'description' => 'Centro al area', 'player_id' => $player4->id, 'game_id' => $game2->id]);
        Goal::create(['name' => 'Gol de contraataque', 'description' => 'Contraataque rapido', 'player_id' => $player3->id, 'game_id' => $game2->id]);
    }
}
