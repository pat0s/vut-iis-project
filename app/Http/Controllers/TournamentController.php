<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{
    // Show all tournaments
    public function index() {
        return view('tournament.tournaments', [
            'tournaments' => Tournament::all()
        ]);
    }

    // Show single tournament
    public function show(Tournament $tournament) {
        return view('tournament.index', [
            'tournament' => $tournament
        ]);
    }

    // Show create form
    public function create() {
        return view('tournament.create');
    }

    // Store tournament data
    public function store() {
        return view('tournament.show');
    }

}
