<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_games');
    }

    public static function juegosConGoles(){
        return self::with('goals.player')->get();
    }
}