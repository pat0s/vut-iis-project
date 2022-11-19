<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'TOURNAMENT';
    protected $primaryKey = 'tournament_id';


    /**
     * Tournament has many participants
     */
    public function participants()
    {
        return $this->hasMany(Participant::class, 'tournament_id', 'tournament_id');
    }
}
