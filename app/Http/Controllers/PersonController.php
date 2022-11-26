<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
    /**
     * List of users
     */
    public function index(Request $request)
    {
        $username = '';
        $input = $request->all();

        if (isset($input['search'])) {
            $username = $input['search'];
        }

        $users = Person::orWhere('username', 'like', '%'. $username .'%')
            ->orWhere('first_name', 'like', '%'. $username .'%')
            ->orWhere('surname', 'like', '%'. $username .'%')
            ->get();

        $viewData = array(
            'users' => $users,
        );

        return view('users.index')->with($viewData);
    }


    /**
     * User profile
     */
    public function show(Request $request)
    {
        $userId = $request->user_id;
        $user = Person::findOrFail($userId);  // fail -> show page "Error 404"

        $statistics = $this->_loadStatistics($user);

        $viewData = array(
            'user' => $user,
            'profileOwner' => $this->_isProfileOwner($user),
            'teams' => $user->teams,
            'statistics' => $statistics,
        );

        return view('users.show')->with($viewData);
    }


    /**
     * Show register form
     */
    public function create()
    {
        return view('users.registration');
    }


    /**
     * Register/create new user
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'first_name' => ['required', 'min:3', 'max:50'],
            'surname' => ['required', 'min:3', 'max:50'],
            'username' => ['required', 'min:3', 'max:50', Rule::unique('PERSON', 'username')],
            'email' => ['required', 'email'],
            'password' => 'required|confirmed|min:6'
        ]);

        // hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        $user = Person::create($formFields);

        // login user
        auth()->login($user);

        return redirect('/')->with('message', 'Registration was successful.');
    }


    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');
    }


    /**
     * Show login form
     */
    public function login()
    {
        return view('users.login');
    }


    /**
     * Login user
     */
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are logged in.');
        }

        return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
    }


    /**
     * Edit profile
     */
    public function edit(Request $request)
    {
        $userId = $request->user_id;

        $formFields = $request->validate([
            'first_name' => ['required', 'min:3', 'max:50'],
            'surname' => ['required', 'min:3', 'max:50'],
            'username' => ['required', 'min:3', 'max:50', Rule::unique('PERSON', 'username')->ignore($userId, 'person_id')],
            'email' => 'required|email',
            'profile_image' => 'image',
        ]);

        $destinationPath = 'public/users/img';
        $profileImage = $request->file('profile_image');
        $name = $profileImage->hashName();
        $profileImage->storeAs($destinationPath, $name);

        $user = Person::find($userId);
        $user->first_name = $formFields['first_name'];
        $user->surname = $formFields['surname'];
        $user->username = $formFields['username'];
        $user->email = $formFields['email'];
        $user->profile_image = $name;

        try {
            $user->update();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update your profile.');
        }

        return redirect()->back()->with('message', 'Your profile has been updated.');
    }


    /**
     * Edit profile - add or remove admin role
     */
    public function admin(Request $request)
    {
        $userId = $request->user_id;
        $user = Person::find($userId);

        if($request->get('btn-add')) {
            $message = 'Admin role has been added.';
            $user->role_id = 2;
        } elseif ($request->get('btn-remove')) {
            $message = 'Admin role has been remove.';
            $user->role_id = 1;
        }

        try {
            $user->save();
        } catch (\Exception $e) {
            return back()->with('error','Failed to update admin role.');
        }

        return redirect()->back()->with('message', $message);
    }


    /**
     * Show change password form
     */
    public function password()
    {
        return view('users.password');
    }


    /**
     * Update user password
     */
    public function updatePassword(Request $request)
    {
        $formFields = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6|different:old_password',
        ]);

        // check old password
        if (!Hash::check($formFields['old_password'], auth()->user()->password)) {
            return back()->withErrors(['old_password' => 'Current password is invalid.']);
        }

        // update password
        $user = Person::find(auth()->user()->person_id);
        $user->password = bcrypt($formFields['new_password']);

        try {
            $user->save();
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to change your password.');
        }

        return redirect('/')->with('message', 'Your password has been changed.');
    }


    /**
     * Check if user is profile owner.
     *
     * @param Person $user
     * @return bool
     */
    private function _isProfileOwner(Person $user): bool
    {
        $profileOwner = false;
        if (auth()->user() and auth()->user()->person_id == $user->person_id) {
            $profileOwner = true;
        }

        return $profileOwner;
    }


    /**
     * @param Person $person
     * @return \int[][]
     */
    private function _loadStatistics(Person $person)
    {
        $ret = array(
            'matches' => array('wins' => 0, 'losses' => 0),
            'tournaments' => array('first' => 0, 'second' => 0),
        );

        $asParticipant = $person->asParticipant;

        foreach ($asParticipant as $participant) {
            $participantId = $participant->participant_id;

            $tournament = $participant->inTournament;
            $matches = $tournament->matches;

            foreach ($matches as $match) {

                // check, if the match is finished
                if (!$match->is_finished) {continue;}

                // check, if the participant is in the match
                if ($match->participant1_id == $participantId || $match->participant2_id == $participantId) {
                    if ($match->winner_id == $participantId) {
                        $ret['matches']['wins'] += 1;
                    } else {
                        $ret['matches']['losses'] += 1;
                    }

                    // final match
                    if ($match->round == 1) {
                        if ($match->winnner_id == $participantId) {
                            $ret['tournaments']['first'] += 1;
                        } else {
                            $ret['tournaments']['second'] += 1;
                        }
                    }

                } // end if
            } // end foreach
        } // end foreach

        return $ret;
    }
}
