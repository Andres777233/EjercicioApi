<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TeamGame extends Pivot
{
    use HasFactory;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}