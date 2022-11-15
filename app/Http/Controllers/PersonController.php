<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PersonController extends Controller
{
    /**
     * User profile
     */
    public function index(Request $request)
    {
        $userId = $request->user_id;
        $user = Person::findOrFail($userId);  // fail -> show page "Error 404"

        $viewData = array(
            'user' => $user,
            'profileOwner' => $this->_isProfileOwner($user),
        );

        return view('user.index')->with($viewData);
    }


    /**
     * Show register form
     */
    public function create()
    {
        return view('user.registration');
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
        dd(auth(), auth()->user());

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
        return view('user.login');
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
}
