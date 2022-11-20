<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    //
    public function index(Request $request){
        $sportName = '';
        $input = $request->all();

        if (isset($input['search'])) {
            $sportName = $input['search'];
        }

        $sports = Sport::where('name', 'like', '%'. $sportName .'%')->get();

        $viewData = array(
            'sports' => $sports,
        );




        return view('sport.index')->with($viewData);
    }

    public function store(Request $request){

        $formFields = $request->validate([
            'name' => ['required', 'min:2', 'max:50'],
            'number_of_players' => ['required', 'min:1', 'max:20'],
        ]);


        Sport::create($formFields);


        return redirect('/sport')->with('message', 'Team was successfully created.');
    }
}
