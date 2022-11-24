<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Person;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\Sport;
use App\Models\TournamentMatch;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $requestFilterValue = $request['filter-value'];
        if ($requestFilterValue == "finished") {
            $tournaments2 = Tournament::where('end_date', '<=', $date)->get();
        } elseif ($requestFilterValue == 'ongoing') {
            $tournaments2 = Tournament::where('end_date', '>=', $date)
                ->where('start_date', '<=', $date)->get();
        } elseif ($requestFilterValue == 'unstarted') {
            $tournaments2 = Tournament::where('start_date', '<=', $date)->get();
        } elseif ($requestFilterValue == 'approved') {
            $tournaments2 = Tournament::where('is_approved', 1)->get();
        } elseif ($requestFilterValue == 'unapproved') {
            $tournaments2 = Tournament::where('is_approved', 0)->get();
        }
        if (isset($tournaments2)) {

            $tournaments = $tournaments1->intersect($tournaments2);
        } else {
            $tournaments = $tournaments1;
        }

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


    public function edit(Request $request){
        // dd($request);
        // if($request->parameters['generate-button'])
        if($request['generate-button']){

            $this->_generateSchedule($request->tournament_id);
            return redirect()->back()->with('message', 'You generated tournament schedule successfully');

        }
        elseif($request['submit-button']){

            return redirect()->back()->with('message', 'You edit tournament successfully');


        }

    }

    // Join tournament for person
    public function joinTournamentPerson(Request $request): \Illuminate\Http\RedirectResponse
    {
        $person = Auth::user();
        $tournament = Tournament::findOrFail($request->tournament_id);
        $maxParticipantsCount = $tournament->number_of_participants;
        $actualParticipantsCount = $tournament->participants->count();
        if ($maxParticipantsCount <= $actualParticipantsCount) {
            return back()->withErrors(['person_id' => 'Guess who fucked your mom 🤓'])->onlyInput('person_id');
        }

        $params['participant_name'] = $person->username;
        $params['is_approved'] = 1;
        $params['participant_type'] = "person";
        $params['person_id'] = $person->person_id;
        $params['tournament_id'] = $tournament->tournament_id;

        $partipipant = Participant::create($params);
//        $tournament->participants()->attach($tournament->tournament_id);
        $partipipant->save();
//        $tournament->save();
        return redirect()->back()->with('message', 'You joined to tournament');
    }

    // Join tournament for team
    public function joinTournamentTeam(Request $request): \Illuminate\Http\RedirectResponse
    {
//        $numberOfPlayersInTeam = $team->number_of_players;
        $person = Auth::user();
        $team = Team::findOrFail($request->get('team_id'));
        $tournament = Tournament::findOrFail($request->tournament_id);
        $maxParticipantsCount = $tournament->number_of_participants;
        $actualParticipantsCount = $tournament->participants->count();
        if ($maxParticipantsCount == $actualParticipantsCount) {
            return back()->withErrors(['team_id' => 'Guess who fucked your mom 🤓'])->onlyInput('team_id');
        }
        if ($team->manager_id != $person->person_id) {
            return back()->withErrors(['team_id' => 'You are kokot'])->onlyInput('team_id');
        }
        if ($team->number_of_players != $tournament->sport->number_of_players) {
            return back()->withErrors(['team_id' => 'Omg radsi zamri'])->onlyInput('team_id');
        }

//        $request->validate([
//            'team_id' => [
//                function($attribute, $value, $fail) {
//                    $person = Auth::user();
//                    $team = Team::findOrFail($value);
////                    dd($person, $team);
//                    if ($team->manager_id != $person->person_id) {
//                        $fail('You are kokot');
//                    }
//                },
//                function($attribute, $value, $fail) {
//                    $tournament = Tournament::findOrFail($request->tournament_id);
//                }
//            ],
//        ]);

        $params['participant_name'] = $team->team_name;
        $params['is_approved'] = 1;
        $params['participant_type'] = "team";
        $params['team_id'] = $team->team_id;
        $params['tournament_id'] = $tournament->tournament_id;

        $participant = Participant::create($params);
        $participant->save();

        return redirect()->back()->with('message', 'Your team joined to tournament');
    }

    // Store tournament data
    public function store(Request $request) {
        $formFields = $request->validate([
            'tournament_name' => ['required', 'min:3', 'max:50'],
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => ['required', 'after_or_equal:start_date'],
            'pricepool' => ['required', 'integer', 'min:0'],
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

    /**
     * Assign participants to the first round of tournament matches.
     *
     * @param int $tournamentId
     * @return void
     */
    private function _generateSchedule(int $tournamentId)
    {
        $tournament = Tournament::findOrFail($tournamentId);

        $noMatchesInRound = $tournament->number_of_participants / 2;
        $indexOfMatch = 0;
        $participants = $tournament->participants;
        $pos = 0;

        while ($indexOfMatch < $noMatchesInRound) {
            $match = $tournament->matches[$indexOfMatch];
            $match->participant1_id = $participants[$pos++]->participant_id;
            $match->participant2_id = $participants[$pos++]->participant_id;
            $match->save();

            $indexOfMatch++;
        }

        $tournament->is_generated = 1;
        $tournament->save();
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
