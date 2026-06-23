<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'stadium', 'capacity', 'year_of_foundation', 'president_id'];

    public function president()
    {
        return $this->belongsTo(President::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'team_games');
    }

    
public static function equiposConPresidentes(){
    return self::with('president')->get();
}
}