<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;

class HomeController extends Controller
{
    // Show all ongoint tournaments on the main page
    public function index() {
        $date = date('Y-m-d');

        // Ongoing or approved tournaments
        $tournaments = Tournament::where('is_approved', 1)
            ->where('end_date', '>=', $date)->get();

        return view('index', [
            'tournaments' => $tournaments,
        ]);
    }
}
