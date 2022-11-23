<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentMatch extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'TOURNAMENT_MATCH';
    protected $primaryKey = 'match_id';

    protected $fillable = [
        'participant1_id',
        'participant1_result',
        'participant2_id',
        'participant2_result',
        'winner_id',
        'is_finished',
    ];


    /**
     * Get the tournament that owns the tournament match.
     */
    public function inTournament()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id', 'tournament_id');
    }
}
