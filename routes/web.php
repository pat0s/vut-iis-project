<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
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
Route::get('/registration', [PersonController::class, 'create']);

// List of all users
Route::get('/users', [PersonController::class, 'index']);

// Create new user
Route::post('/users', [PersonController::class, 'store']);

// Show user login form
Route::get('/login', [PersonController::class, 'login'])
    ->name('login');

// Log user out
Route::get('/logout', [PersonController::class, 'logout']);

// Show change password form
Route::get('/password', [PersonController::class, 'password'])
    ->middleware('auth');

// Change user password
Route::post('/password/update', [PersonController::class, 'updatePassword']);

// Log user in
Route::post('/users/authenticate', [PersonController::class, 'authenticate']);

// Single user
Route::get('/users/{user_id}', [PersonController::class, 'show'])
    ->where('user_id', '[0-9]+');

// Edit profile info
Route::post('/users/{user_id}/edit', [PersonController::class, 'edit'])
    ->where('user_id', '[0-9]+');

// Edit profile info
Route::post('/users/{user_id}/admin', [PersonController::class, 'admin'])
    ->where('user_id', '[0-9]+');

// -----------------------------------------------------

// --------------------- TeamController ---------------------------
// List of teams
Route::get('/teams', [TeamController::class, 'index']);

// Create new team
Route::post('/teams', [TeamController::class, 'store']);

// Show create team form
Route::get('/teams/create', [TeamController::class, 'create']);

// Single team
Route::get('/teams/{team_id}', [TeamController::class, 'show'])
    ->where('team_id', '[0-9]+');

// Add member to team
Route::post('/teams/{team_id}/add-member', [TeamController::class, 'addMember'])
    ->where('team_id', '[0-9]+');

// -----------------------------------------------------

// Show create form
Route::get('/tournaments/create', [TournamentController::class, 'create']);

// Show list of tournaments
Route::get('/tournaments', [TournamentController::class, 'index']);

// Store tournament data
Route::post('/tournaments', [TournamentController::class, 'store']);

// Single tournament
Route::get('/tournaments/{tournament_id}', [TournamentController::class, 'show'])
    ->where('tournament_id', '[0-9]+');

//Route::get('/tournaments/{tournament}/edit', [TournamentController::class, 'e'])



//Route::get('/tournament/{tournament_id}', [TournamentController::class, 'show'])->where('tournament_id', '[0-9]+');
//
//Route::get('/tournament/{tournament_id}/edit', function () {
//    return view('welcome');
//});
//
//
//Route::get('/tournaments', [TournamentController::class, 'index']);

Route::get('/statistics', function () {
    return view('welcome');
});

//--------------------- Sport ---------------------
Route::get('/sport', function () {
    return view('sport.index');
});

Route::get('/sport/create', function () {
    return view('sport.create');
});
