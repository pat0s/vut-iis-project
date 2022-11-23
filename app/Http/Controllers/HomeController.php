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
            ->orWhere(function ($query) use ($date) {
                $query->where('end_date', '>=', $date)
                      ->where('start_date', '<=', $date);
            })->get();

        return view('index', [
            'tournaments' => $tournaments,
        ]);
    }
}
