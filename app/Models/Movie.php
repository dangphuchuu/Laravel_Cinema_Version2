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

    public function casts()
    {
        return $this->belongsToMany(Cast::class, 'casts_movies', 'movie_id', 'cast_id');
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class, 'directors_movies', 'movie_id', 'director_id');
    }

    public function movieGenres()
    {
        return $this->belongsToMany(MovieGenres::class, 'moviegenres_movies', 'movie_id', 'movieGenre_id');
    }
}
