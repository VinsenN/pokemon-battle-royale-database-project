<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PokemonTypes;

class PokemonTypesController extends Controller
{
    public function add_pokemon_type_view(){
        $pokemon_types = PokemonTypes::orderBy('updated_at', 'desc') -> get();
        return view('pokemon_type_add') -> with ('pokemon_types', $pokemon_types);
    }

    public function add_pokemon_type_view_id($id){
        $pokemon_types = PokemonTypes::find($id);
        return view('pokemon_type_add_detail') -> with('pokemon_types', $pokemon_types);
    }

    public function add_pokemon_type(Request $request){
        $request -> validate ([
            'name' => ['required']
        ]);

        if (PokemonTypes::where('name', '=', $request -> name)->exists()) {
            return redirect() -> back() -> with ('status', 'Pokemon type already exists');
        }

        $pokemon_types = new PokemonTypes;
        $pokemon_types -> name = $request -> name;
        $pokemon_types -> save();

        return redirect() -> back() -> with ('status', 'Pokemon type added successfully');
    }


    public function add_pokemon_type_update_id($id, Request $request){
        $request -> validate ([
            'name' => ['required'],
        ]);

        if (PokemonTypes::where('name', $request -> name) -> exists()) {
            return redirect() -> back() -> with ('status', 'Pokemon type already exists');
        }

        PokemonTypes::where('id', $id) -> update(['name' => $request -> name]);
        return redirect() -> back() -> with ('status', 'Pokemon type updated successfully');
    }

    public function add_pokemon_type_delete_id($id, Request $request){
        PokemonTypes::where('id', $id) -> delete();
        return redirect('/pokemon/add_pokemon_type') -> with ('status', 'Pokemon type deleted successfully');
    }
}
