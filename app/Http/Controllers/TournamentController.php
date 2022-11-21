<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Sport;
use Illuminate\Http\Request;

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

        $approved = $this->_isApproved($tournament);

        $viewData = array(
            'name' => $tournament->tournament_name,
            'description' => $tournament->description,
            'start_date' => date('d-m-Y', strtotime($tournament->start_date)),
            'end_date' => date('d-m-Y', strtotime($tournament->end_date)),
            'capacity' => $tournament->number_of_participants,
            'price_pool' => round($tournament->pricepool),
            'sport' => $tournament->sport->name,
            'approved' => $approved,
            'tournament' => $tournament,
        );

        return view('tournaments.show')->with($viewData);
    }

    // Show create form
    public function create() {
        return view('tournaments.create');
    }

    // Store tournament data
    public function store() {
        return back();
    }

    private function _isApproved(Tournament $tournament) {
        $approved = "False";
        if ($tournament->approved){
            $approved = "True";
        }
        return $approved;
    }
}
