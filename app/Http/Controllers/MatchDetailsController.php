<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pokemon;
use App\Models\Matchs;
use App\Models\Players;
use App\Models\MatchDetails;

use Illuminate\Support\Facades\DB;

class MatchDetailsController extends Controller
{
    public function view_statistic(){
        $statistics = DB::select('
            SELECT players.name AS name, COUNT(match_details.matchs_id) AS cm, SUM(match_details.match_score) AS ms
            FROM match_details
            RIGHT JOIN players ON (match_details.players_id = players.id)
            GROUP BY players.name
            HAVING SUM(match_details.match_score) > (
                SELECT AVG(ms)
                FROM (
                    SELECT players.name, SUM(match_details.match_score) AS ms
                    FROM match_details
                    RIGHT JOIN players ON (match_details.players_id = players.id)
                    GROUP BY players.id, players.name
                )   sum_table
            )
            ORDER BY SUM(match_details.match_score) DESC');
        return view('leaderboard') -> with ('statistics', $statistics);
    }

    public function view_statistic_all(){
        $statistics = DB::select('
            SELECT players.name AS name, COUNT(match_details.matchs_id) AS cm, SUM(match_details.match_score) AS ms
            FROM match_details
            RIGHT JOIN players ON (match_details.players_id = players.id)
            GROUP BY players.name
            ORDER BY SUM(match_details.match_score) DESC');
        return view('leaderboard_all') -> with ('statistics', $statistics);
    }
}
