<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'PARTICIPANT';
    protected $primaryKey = 'participant_id';


    /**
     * Get the tournament that owns the participant.
     */
    public function inTournament()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id', 'tournament_id');
    }

    /**
     * Get the team that is the participant.
     */
    public function teamParticipant()
    {
        return $this->belongsTo(Team::class, 'team_id', 'team_id');
    }

    /**
     * Get the user that is the participant.
     */
    public function userParticipant()
    {
        return $this->belongsTo(Person::class, 'person_id', 'person_id');
    }
}
