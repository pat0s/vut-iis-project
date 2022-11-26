<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{

    /**
     * Remove participant
     *
     * @return void
     */
    public function destroy(Request $request)
    {
        $participant = Participant::findOrFail($request->participant_id);
        $participant->delete();

        return back()->with('message', 'Participant was deleted.');
    }
}
