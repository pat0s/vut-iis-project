<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PersonController extends Controller
{
    // Show Register Form
    public function create()
    {
        return view('user.registration');
    }


    // Register/Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'first_name' => ['required', 'min:3'],
            'surname' => ['required', 'min:3'],
            'username' => ['required', Rule::unique('PERSON', 'username')],
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


    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');
    }


    // Show Login Form
    public function login()
    {
        return view('user.login');
    }


    // Login User
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
}
