<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'showTime',
        'releaseDate',
        'endDate',
        'director_id',
        'cast_id',
        'description',
        'rating_id',
        'upcomming',
        'status'
    ];
}
