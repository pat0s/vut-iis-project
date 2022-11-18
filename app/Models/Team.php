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
        'logo_url',
        'number_of_players',
        'manager_id',
    ];

    /**
     * The people that belong to the team.
     */
    public function members()
    {
        return $this->belongsToMany(Person::class, 'MEMBER_OF_TEAM', 'team_id', 'person_id');
    }
}
