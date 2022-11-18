<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Person;
use App\Models\Participant;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function show(Request $request)
    {
        $teamId = $request->team_id;
        $team = Team::findOrFail($teamId);  // fail -> show page "Error 404"

        // TODO
//        select *
//        from TEAM t
//          join PARTICIPANT p on t.team_id = p.team_id
//          join TOURNAMENT tour on p.tournament_id = tour.tournament_id
//        where
//          t.team_id = :team_id;
        $tournaments = array();

        $users = Person::with('teams')
            ->whereDoesntHave('teams', function ($query) use ($teamId) {
            $query->where('MEMBER_OF_TEAM.team_id', $teamId);
            })->get();

        $viewData = array(
            'team' => $team,
            'members' => $team->members,
            'tournaments' => $tournaments,
            'teamManager' => $this->_isTeamManager($team),
            'users' => $users,
        );

        return view('team.index')->with($viewData);
    }


    public function create()
    {
        return view('team.create');
    }


    public function addMember(Request $request)
    {
        $input = $request->all();
        $userIds = $input['members'];

        $team = Team::findOrFail($request->team_id);
        $team->members()->attach($userIds);

        return redirect()->back()->with('message', 'List of team members was updated.');
    }


    public function store(Request $request)
    {

        // TODO: redirect
        return redirect('/')->with('message', 'Team was successfully created.');
    }

    /**
     * Check if user is team manager.
     *
     * @param Team $team
     * @return bool
     */
    private function _isTeamManager(Team $team): bool
    {
        $teamManager = false;
        if (auth()->user() and auth()->user()->person_id == $team->manager_id) {
            $teamManager = true;
        }

        return $teamManager;
    }

}
