<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'TEAM';
    protected $primaryKey = 'team_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'team_name',
        'image',
        'number_of_players',
        'manager_id',
    ];


    /**
     * Get team image name
     *
     * @param string|null $value
     * @return string
     */
    public function getImageAttribute($value): string
    {
        if ($value) {
            return asset('storage/teams/img/'. $value);
        } else {
            return asset('img/profilePlaceholder.svg');
        }
    }


    /**
     * The people that belong to the team.
     */
    public function members()
    {
        return $this->belongsToMany(Person::class, 'MEMBER_OF_TEAM', 'team_id', 'person_id');
    }


    /**
     * Get participants for the team.
     */
    public function asParticipant()
    {
        return $this->hasMany(Participant::class, 'team_id', 'team_id');
    }

}
