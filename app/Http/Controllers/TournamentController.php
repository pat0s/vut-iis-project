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
        $tournaments1 = Tournament::where('tournament_name', 'like', '%'. $tournamentName .'%')
            ->get();

        $date = date('Y-m-d');;
        $requestFilterValue = $request['filterValue'];
//        $request['filterValue'];


        if ($requestFilterValue == "finished") {
            $tournaments2 = Tournament::all()->where('end_date', '<=', $date);
        } elseif ($requestFilterValue == 'ongoing') {
            $tournaments2 = Tournament::all()->where('end_date', '>=', $date)
                ->where('start_date', '<=', $date);
        } elseif ($requestFilterValue == 'unstarted') {
            $tournaments2 = Tournament::all()->where('start_date', '<=', $date);
        } elseif ($requestFilterValue == 'approved') {
            $tournaments2 = Tournament::all()->where('is_approved', 1);
        } elseif ($requestFilterValue == 'unapproved') {
            $tournaments2 = Tournament::all()->where('is_approved', 0);
        } else {
            $tournaments2 = Tournament::all();
        }

        $tournaments = $tournaments1->intersect($tournaments2);

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
        $sports = Sport::all();
        return view('tournaments.create', ['sports' => $sports]);
    }

    // Store tournament data
    public function store(Request $request) {
        $formFields = $request->validate([
            'tournament_name' => ['required', 'min:3', 'max:50'],
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'pricepool' => 'required',
            'number_of_participants' => 'required',
            'sport_id' => 'required',
        ]);

        $params = $formFields;
        $params['manager_id'] = auth()->user()->person_id;
        $params['is_approved'] = 0;

        // create tournament
        Tournament::create($params);

        return redirect('/tournaments')->with('message', 'Tournament was successfully created.');
    }

    private function _isApproved(Tournament $tournament) {
        $approved = "False";
        if ($tournament->is_approved){
            $approved = "True";
        }
        return $approved;
    }
}
