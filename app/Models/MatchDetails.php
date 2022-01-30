<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'matchs_id',
        'players_id',
        'pokemon_id',
        'match_score',
    ];

    public function matchs()
    {
        return $this->belongsTo(Matchs::class , 'matchs_id');
    }

    public function players()
    {
        return $this->belongsTo(Players::class , 'players_id');
    }

    public function pokemon()
    {
        return $this->belongsTo(Pokemon::class , 'pokemon_id');
    }
}
