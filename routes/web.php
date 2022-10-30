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
    return view('welcome');
});

// --------------------- User ---------------------------
// Show user registration form
Route::get('/registration', function () {
    return view('welcome');
});

// Show user sign-in form
Route::get('/sign-in', function () {
    return view('welcome');
});

// Log user out
Route::post('/logout', function () {
    return view('welcome');
});

// Create new user
Route::post('/users', function () {
    return view('welcome');
});

// Log user in
Route::post('/users/authenticate', function () {
    return view('welcome');
});

// Single user
Route::get('/users/{user_id}', function () {
    return view('welcome');
});


Route::get('/user/{user_id}/edit', function () {
    return view('welcome');
});
// -----------------------------------------------------

// --------------------- Team ---------------------------

Route::get('/teams/{team_id}', function () {
    return view('welcome');
});

Route::get('/teams/create', function () {
    return view('welcome');
});

// -----------------------------------------------------

Route::get('/create-tournament', function () {
    return view('welcome');
});


Route::get('/tournament/{tournament_id}/edit', function () {
    return view('welcome');
});

Route::get('/team/{team_id}/edit', function () {
    return view('welcome');
});

Route::get('/statistics', function () {
    return view('welcome');
});

Route::get("/team/{team_id}", function($team_id){
    dd($team_id);
    return response("Post " . $team_id);
})->where('team_id', '[0-9]+');
