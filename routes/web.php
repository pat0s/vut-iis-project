<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\SportController;
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
Route::get('/', [HomeController::class, 'index']);

// --------------------- User ---------------------------
// Show user registration form
Route::get('/registration', [PersonController::class, 'create'])
    ->middleware('guest');

// List of all users
Route::get('/users', [PersonController::class, 'index']);

// Create new user
Route::post('/users', [PersonController::class, 'store']);

// Show user login form
Route::get('/login', [PersonController::class, 'login'])
    ->name('login')
    ->middleware('guest');

// Log user out
Route::get('/logout', [PersonController::class, 'logout'])
    ->middleware('auth');

// Show change password form
Route::get('/password', [PersonController::class, 'password'])
    ->middleware('auth');

// Change user password
Route::post('/password/update', [PersonController::class, 'updatePassword'])
    ->middleware('auth');

// Log user in
Route::post('/users/authenticate', [PersonController::class, 'authenticate']);

// Single user
Route::get('/users/{user_id}', [PersonController::class, 'show'])
    ->where('user_id', '[0-9]+');

// Edit profile info
Route::post('/users/{user_id}/edit', [PersonController::class, 'edit'])
    ->where('user_id', '[0-9]+')
    ->middleware('auth');

// Edit profile info
Route::post('/users/{user_id}/admin', [PersonController::class, 'admin'])
    ->where('user_id', '[0-9]+')
    ->middleware('auth');

// -----------------------------------------------------

// --------------------- TeamController ---------------------------
// List of teams
Route::get('/teams', [TeamController::class, 'index']);

// Create new team
Route::post('/teams', [TeamController::class, 'store']);

// Show create team form
Route::get('/teams/create', [TeamController::class, 'create'])
    ->middleware('auth');

// Single team
Route::get('/teams/{team_id}', [TeamController::class, 'show'])
    ->where('team_id', '[0-9]+');

// Add member to team
Route::post('/teams/{team_id}/add-member', [TeamController::class, 'addMember'])
    ->where('team_id', '[0-9]+')
    ->middleware('auth');

// Remove member from team
Route::delete('/teams/{team_id}/remove-member/{user_id}', [TeamController::class, 'removeMember'])
    ->where('team_id', '[0-9]+')
    ->where('user_id', '[0-9]+')
    ->middleware('auth');

// -----------------------------------------------------
// ----------------------- TournamentController ------------------------------

// Show list of tournaments
Route::get('/tournaments', [TournamentController::class, 'index']);

// Store tournament data
Route::post('/tournaments', [TournamentController::class, 'store']);

// Show create form
Route::get('/tournaments/create', [TournamentController::class, 'create'])
    ->middleware('auth');

// Single tournament
Route::get('/tournaments/{tournament_id}', [TournamentController::class, 'show'])
    ->where('tournament_id', '[0-9]+');

// Joint tournament for person
Route::post('/tournaments/{tournament_id}/join-tournament-person', [TournamentController::class, 'joinTournamentPerson'])
    ->where('tournament_id', '[0-9]+')
    ->middleware('auth');

// Joint tournament for team
Route::post('/tournaments/{tournament_id}/join-tournament-team', [TournamentController::class, 'joinTournamentTeam'])
    ->where('tournament_id', '[0-9]+')
    ->middleware('auth');

    // Edit tournament 
Route::post('/tournaments/{tournament_id}/edit', [TournamentController::class, 'edit'])
    ->where('tournament_id', '[0-9]+')
    ->middleware('auth');

Route::get('/statistics', function () {
    return view('welcome');
});

// -----------------------------------------------------

//--------------------- Sport ---------------------
Route::get('/sport', [SportController::class, 'index']);

Route::post('/sport/create', [SportController::class, 'store']);
