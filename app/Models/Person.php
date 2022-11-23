<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Person extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;
    protected $table = 'PERSON';
    protected $primaryKey = 'person_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'surname',
        'username',
        'email',
        'profile_image',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];


    /**
     * Get profile image name
     *
     * @param string|null $value
     * @return string
     */
    public function getProfileImageAttribute($value): string
    {
        if ($value) {
            return asset('storage/users/img/'. $value);
        } else {
            return asset('img/profilePlaceholder.svg');
        }
    }


    /**
     * The teams that belong to the user.
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'MEMBER_OF_TEAM', 'person_id', 'team_id');
    }
}
