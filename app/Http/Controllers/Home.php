<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;

class Home extends Controller
{
    // Show all ongoint tournaments on the main page
    public function index() {
        $date = date('Y-m-d');

        // Ongoing Tournaments
        $tournaments = Tournament::all()->where('end_date', '>=', $date)
            ->where('start_date', '<=', $date); //->where('is_approved', 1);

        return view('index', [
            'tournaments' => $tournaments,
        ]);
    }
}
