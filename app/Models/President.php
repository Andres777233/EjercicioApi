<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class President extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'year'];

    public function team()
    {
        return $this->hasOne(Team::class);
    }

    public static function presidentesCompleto(){
    return self::with('team.players.goals.game')->get();
}
}
