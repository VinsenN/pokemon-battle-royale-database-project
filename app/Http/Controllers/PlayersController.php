<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Players;

class PlayersController extends Controller
{
    public function view_player(){
        $players = players::orderBy('name', 'asc') -> get();
        return view('player') -> with ('players', $players);
    }

    public function view_player_id($id){
        $players = players::find($id);
        return view('player_detail') -> with('players', $players);
    }

    public function add_player(Request $request){
        $request -> validate ([
            'name' => ['required'],
        ]);

        if (players::where('name', '=', $request -> name)->exists()) {
            return redirect() -> back() -> with ('status', 'Player name already exists');
        }

        $note = new players;
        $note -> name = $request -> name;
        $note -> save();

        return redirect() -> back() -> with ('status', 'Player added successfully');
    }

    public function update_player($id, Request $request){
        $request -> validate ([
            'name' => ['required'],
        ]);

        if (players::where('name', '=', $request -> name)->exists()) {
            return redirect() -> back() -> with ('status', 'Player name already exists');
        }
        players::where('id', $id)->update(['name' => $request -> name]);
        return redirect() -> back() -> with ('status', 'Player name updated successfully');
    }

    public function delete_player($id, Request $request){
        players::where('id', $id) -> delete();
        return redirect('/player');
    }
}
