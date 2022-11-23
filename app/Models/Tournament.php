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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tournament_name',
        'description',
        'start_date',
        'pricepool',
        'is_approved',
        'number_of_participants',
        'manager_id',
        'sport_id',
        'end_date',
        'is_generated',
    ];

    /**
     * Tournament has many participants
     */
    public function participants()
    {
        return $this->hasMany(Participant::class, 'tournament_id', 'tournament_id');
    }

    /**
     * Tournament has sport
    */
    public function sport() {
        return $this->belongsTo(Sport::class, 'sport_id', 'sport_id');
    }
}
