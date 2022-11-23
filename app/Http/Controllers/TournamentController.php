<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Tournament;
use App\Models\Sport;
use App\Models\TournamentMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $tournament = Tournament::findOrFail($request->tournament_id);


        $matches = TournamentMatch::where('tournament_id', $request->tournament_id)->orderBy('round', 'desc')->orderBy('index_of_match', 'asc')->get();

        $approved = $this->_isApproved($tournament);
        $startDate = date('d-m-Y', strtotime($tournament->start_date));
        $endDate = date('d-m-Y', strtotime($tournament->end_date));
        $pricepool = round($tournament->pricepool);
//        $isManager = $this->_isTournamentManager($tournament);


        $viewData = array(
            'tournament' => $tournament,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'pricepool' => $pricepool,
            'approved' => $approved,
            'participants' => $tournament->participants,
            'matches' => $matches,
        );

        return view('tournaments.show')->with($viewData);
    }

    // Show create form
    public function create() {
        $sports = Sport::all();
        return view('tournaments.create', ['sports' => $sports]);
    }

    // Join tournament
    public function joinTournament(Request $request) {
        $input = $request->all();
        $teamId = $input['team-selection'];

        $tournament = Tournament::findOrFail($request->tournament_id);


        return redirect()->back()->with('message', 'Your team joined to tournament');
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

    private function _isTournamentManager(Tournament $tournament) {
        $tournamentManager = false;
        if (auth()->user() and auth()->user()->person_id == $tournament->manager_id) {
            $tournamentManager = true;
        }
        return $tournamentManager;
    }
}
