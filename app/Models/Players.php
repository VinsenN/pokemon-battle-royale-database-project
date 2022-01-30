<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;

    public function matchs()
    {
        return $this->belongsToMany(Matchs::class, 'match_details')
            ->withPivot(
                'matchs_id',
                'players_id',
                'pokemon_id',
                'match_score',
            )
            ->withTimestamps();
    }
    public function pokemon()
    {
        return $this->belongsToMany(Pokemon::class, 'match_details')
            ->withPivot(
                'matchs_id',
                'players_id',
                'pokemon_id',
                'match_score',
            )
            ->withTimestamps();
    }
    // public function players()
    // {
    //     return $this->belongsToMany(Players::class, 'match_details')->withTimestamps();
    // }
    // public function pokemon()
    // {
    //     return $this->belongsToMany(Pokemon::class, 'match_details')->withTimestamps();
    // }
}
