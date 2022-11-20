<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'SPORT';
    protected $primaryKey = 'sport_id';


    protected $fillable = [
        'name',
        'number_of_players',
    ];

}
