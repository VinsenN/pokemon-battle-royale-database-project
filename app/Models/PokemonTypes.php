<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonTypes extends Model
{
    use HasFactory;

    public function pokemon()
    {
        return $this->belongsToMany(Pokemon::class, 'pokemon_type_details')->withTimestamps();
    }
}
