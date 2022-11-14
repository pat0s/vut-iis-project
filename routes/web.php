<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Main page
Route::get('/', function () {
    return view('index');
});

// --------------------- User ---------------------------
// Show user registration form
Route::get('/registration', function () {
    return view('user.registration');
});

// Show user login form
Route::get('/login', function () {
    return view('user.login');
});

// Log user out
Route::post('/logout', function () {
    return view('index');
});

// Create new user
Route::post('/user', function () {
    return view('welcome');
});

// Log user in
Route::post('/user/authenticate', function () {
    return view('welcome');
});

// Single user
Route::get('/user/{user_id}', function () {
    return view('user.index');
});

// List of all users
Route::get('/users', function () {
    return view('user.users');
});


Route::get('/user/{user_id}/edit', function () {
    return view('welcome');
});
// -----------------------------------------------------

// --------------------- Team ---------------------------
Route::get('/team/create', function () {
    return view('team.create');
});

// Route::get("/team/{team_id}", function($team_id){
//     dd($team_id);
//     return response("Post " . $team_id);
// })->where('team_id', '[0-9]+');

Route::get('/team/{team_id}', function () {
    return view('team.index');
});

Route::get('/team/{team_id}/edit', function () {
    return view('welcome');
});

Route::get('/teams', function () {
    return view('team.teams');
});


// -----------------------------------------------------
Route::get('/tournament/create', function () {
    return view('welcome');
});

Route::get('/tournament/{tournament_id}', function () {
    return view('tournament.index');
});

Route::get('/tournament/{tournament_id}/edit', function () {
    return view('welcome');
});

Route::get('/tournaments', function () {
    return view('tournament.tournaments');
});

Route::get('/statistics', function () {
    return view('welcome');
});

