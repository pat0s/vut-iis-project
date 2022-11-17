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

//    protected $fillable = [
//        'tournament_name',
//        'description',
//        'start_date',
//        'pricepool',
//    ];
}
