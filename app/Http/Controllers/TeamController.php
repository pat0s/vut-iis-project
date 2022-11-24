<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Person;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * List of teams
     */
    public function index(Request $request)
    {
        $teamName = '';
        $input = $request->all();

        if (isset($input['search'])) {
            $teamName = $input['search'];
        }

        $teams = Team::where('team_name', 'like', '%'. $teamName .'%')->get();

        $viewData = array(
            'teams' => $teams,
        );

        return view('teams.index')->with($viewData);
    }


    /**
     * Team Detail
     */
    public function show(Request $request)
    {
        $teamId = $request->team_id;
        $team = Team::findOrFail($teamId);  // fail -> show page "Error 404"

        $tournaments = Tournament::with('participants')
                ->whereHas('participants', function ($query) use ($teamId) {
                $query->where("PARTICIPANT.team_id", $teamId);
                })->get();

        $users = Person::with('teams')
            ->whereDoesntHave('teams', function ($query) use ($teamId) {
            $query->where('MEMBER_OF_TEAM.team_id', $teamId);
            })->get();

        $viewData = array(
            'team' => $team,
            'members' => $team->members,
            'tournaments' => $tournaments,
            'isTeamManager' => $this->_isTeamManager($team),
            'users' => $users,
        );

        return view('teams.show')->with($viewData);
    }


    /**
     * Show create form
     */
    public function create()
    {
        $users = Person::where('person_id', '!=', auth()->user()->person_id)->get();

        $viewData = array(
            'users' => $users
        );

        return view('teams.create')->with($viewData);
    }


    /**
     * Add member(s) to team
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addMember(Request $request)
    {
        $input = $request->all();
        $userIds = $input['members'];

        $team = Team::findOrFail($request->team_id);

        $team->members()->attach($userIds);
        $team->number_of_players += count($userIds);
        $team->save();

        return redirect()->back()->with('message', 'List of team members was updated.');
    }

    /**
     * Remove member(s) from team
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeMember(Request $request)
    {
        $team = Team::findOrFail($request->team_id);

        $team->members()->detach($request->user_id);
        $team->number_of_players -= 1;
        $team->save();

        return redirect()->back()->with('message', 'List of team members was updated.');
    }


    /**
     * Create new team
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'team_name' => ['required', 'min:3', 'max:50'],
            'image' => 'image',
        ]);

        $userIds = $request->get('members');
        $params = $formFields;
        $params['manager_id'] = auth()->user()->person_id;
        $params['number_of_players'] = count($userIds);

        if (array_key_exists('image', $formFields)) {
            $destinationPath = 'public/teams/img';
            $teamImage = $request->file('image');
            $imageName = $teamImage->hashName();
            $teamImage->storeAs($destinationPath, $imageName);

            $params['image'] = $imageName;
        }

        // create team
        $team = Team::create($params);

        // many to many relationship
        $team->members()->attach($userIds);
        $team->save();

        return redirect('/teams')->with('message', 'Team was successfully created.');
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
