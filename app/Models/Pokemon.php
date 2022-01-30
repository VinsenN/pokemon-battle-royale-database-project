<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    public function pokemon_types()
    {
        return $this->belongsToMany(PokemonTypes::class, 'pokemon_type_details')->withTimestamps();
    }


    // public function matchs()
    // {
    //     return $this->belongsToMany(Matchs::class, 'match_details')->withTimestamps();
    // }
    // public function players()
    // {
    //     return $this->belongsToMany(Players::class, 'match_details')->withTimestamps();
    // }
    // public function pokemon()
    // {
    //     return $this->belongsToMany(Pokemon::class, 'match_details')->withTimestamps();
    // }
}
