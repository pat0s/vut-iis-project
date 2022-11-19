<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{
    // Show all tournaments
    public function index(Request $request) {

        $tournamentName = '';
        if (isset($request['search'])) {
            $tournamentName = $request['search'];
        }

        $tournaments = Tournament::where('tournament_name', 'like', '%'. $tournamentName .'%')
            ->get();

        return view('tournaments.index', [
            'tournaments' => $tournaments,
        ]);
    }

    // Show single tournament
    public function show(Request $request) {

        $tournament = Tournament::find($request->tournament_id);

        return view('tournaments.show', [
            'tournament' => $tournament
        ]);
    }

    // Show create form
    public function create() {
        return view('tournaments.create');
    }

    // Store tournament data
    public function store() {
        return back();
    }

}
