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
     * The people that belong to the team.
     */
    public function persons()
    {
        return $this->belongsToMany(Person::class, 'MEMBER_OF_TEAM', 'team_id', 'person_id');
    }
}
