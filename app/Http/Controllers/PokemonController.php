<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pokemon;
use App\Models\PokemonTypes;
use App\Models\PokemonTypeDetails;

class PokemonController extends Controller
{
    public function view_pokemon(){
        $pokemon = pokemon::orderBy('name', 'asc') -> get();
        return view('pokemon') -> with ('pokemon', $pokemon);
    }

    public function view_pokemon_id($id){
        $pokemon = pokemon::find($id);
        $pokemon_types = PokemonTypes::orderBy('name', 'asc') -> get();
        return view('pokemon_detail') -> with('pokemon', $pokemon) -> with ('pokemon_types', $pokemon_types) ;
    }

    public function add_pokemon() {
        $pokemon_types = PokemonTypes::orderBy('name', 'asc') -> get();
        return view('pokemon_add') -> with ('pokemon_types', $pokemon_types);
    }

    public function add_pokemon_process(Request $request){
        $request -> validate ([
            'name' => ['required'],
            'health' => 'required|integer',
            'attack' => 'required|integer',
            'speed' => 'required|integer',
            'defense' => 'required|integer',

            'pokemon_type_name' => 'required|array|min:1',
        ]);

        if (pokemon::where('name', '=', $request -> name)->exists()) {
            return redirect() -> back() -> with ('status', 'Pokemon name already exists');
        }

        // dd($request);
        $pokemon_type = $request -> pokemon_type_name;

        $pokemon = new pokemon;
        $pokemon -> name = $request -> name;
        $pokemon -> health = $request -> health;
        $pokemon -> attack = $request -> attack;
        $pokemon -> speed = $request -> speed;
        $pokemon -> defense = $request -> defense;
        $pokemon -> save();

        $pokemon -> pokemon_types() -> attach($pokemon_type);
        return redirect() -> back() -> with ('status', 'Pokemon added successfully');
    }

    public function update_pokemon($id, Request $request){
        $request -> validate ([
            'name' => 'required',
            'health' => 'required|integer',
            'attack' => 'required|integer',
            'speed' => 'required|integer',
            'defense' => 'required|integer',

            'pokemon_type_name' => 'required|array|min:1',
        ]);

        // dd($request);

        pokemon::where('id', $id)->update( ['name'   => $request -> name,
                                            'health' => $request -> health,
                                            'attack' => $request -> attack,
                                            'speed'  => $request -> speed,
                                            'defense'=> $request -> defense]);

        $pokemon = pokemon::find($id);
        $pokemon -> pokemon_types() -> detach();

        $pokemon_type = $request -> pokemon_type_name;
        $pokemon -> pokemon_types() -> attach($pokemon_type);

        return redirect() -> back() -> with ('status', 'Pokemon updated successfully');
    }

    public function delete_pokemon($id, Request $request){
        $pokemon = pokemon::find($id);
        $pokemon -> pokemon_types() -> detach();

        pokemon::where('id', $id) -> delete();
        return redirect('/pokemon');
    }
}
