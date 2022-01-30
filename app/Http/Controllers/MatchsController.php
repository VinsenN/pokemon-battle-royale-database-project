<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pokemon;
use App\Models\Matchs;
use App\Models\Players;
use App\Models\MatchDetails;

use Illuminate\Support\Facades\Schema;

class MatchsController extends Controller
{
    public function view(){
        $pokemons = pokemon::orderBy('name', 'asc') -> get();
        $players = players::orderBy('name', 'asc') -> get();
        $matchs = matchs::orderBy('schedule', 'desc') -> get();
        return view('welcome') -> with ('pokemons', $pokemons)
                               -> with ('players', $players)
                               -> with ('matchs', $matchs);
    }

    public function reset_simulator() {
        Schema::disableForeignKeyConstraints();
        MatchDetails::truncate();
        matchs::truncate();
        Schema::enableForeignKeyConstraints();
        return redirect() -> back();
    }

    public function add_match_process(Request $request) {
        $request -> validate ([
            'players' => 'required|array|min:2',
            'pokemon' => 'required|array|min:2',

            'players.*' => 'required|distinct',
        ]);

        do {
            $scores = array(
                random_int(1, 20),
                random_int(1, 20)
            );
        } while($scores[0] == $scores[1]);
        // dd ($scores);

        $player1 = $request -> players[0];
        $pokemon1 = $request -> pokemon[0];

        $player2 = $request -> players[1];
        $pokemon2 = $request -> pokemon[1];

        $match = new matchs;
        $match -> save();

        $match -> players() -> attach($player1, ['pokemon_id' => $pokemon1, 'match_score' => $scores[0]]);
        $match -> players() -> attach($player2, ['pokemon_id' => $pokemon2, 'match_score' => $scores[1]]);

        return redirect() -> back() -> with ('status', 'Match simulation success');
    }
}
