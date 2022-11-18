<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\TeamController;
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

// Create new user
Route::post('/user', [PersonController::class, 'store']);

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
Route::post('/user/authenticate', [PersonController::class, 'authenticate']);

// Single user
Route::get('/user/{user_id}', [PersonController::class, 'index'])->where('user_id', '[0-9]+');

// Edit profile info
Route::post('/user/{user_id}/edit', [PersonController::class, 'edit'])->where('user_id', '[0-9]+');

// List of all users
Route::get('/users', function () {
    return view('user.users');
});

// -----------------------------------------------------

// --------------------- TeamController ---------------------------
// Create new team
Route::post('/team/create', [TeamController::class, 'store']);

// Single team
Route::get('/team/{team_id}', [TeamController::class, 'show'])->where('team_id', '[0-9]+');

// Add member to team
Route::post('/team/{team_id}/add-member', [TeamController::class, 'addMember'])->where('team_id', '[0-9]+');

// Edit team
Route::post('/team/{team_id}/edit', [TeamController::class, 'edit'])->where('team_id', '[0-9]+');

// List of teams
Route::get('/teams', function () {
    return view('team.teams');
});


// -----------------------------------------------------
Route::get('/tournament/create', function () {
    return view('tournament.create');
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

