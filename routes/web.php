<?php

use App\Http\Controllers\PersonController;
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
Route::get('/login', [PersonController::class, 'login']);

// Log user out
Route::post('/logout', [PersonController::class, 'logout']);

// Log user in
Route::post('/user/authenticate', [PersonController::class, 'authenticate']);

// Single user
Route::get('/user/{user_id}', function () {
    return view('user.index');
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

Route::get('/statistics', function () {
    return view('welcome');
});

