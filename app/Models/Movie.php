<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'showTime',
        'releaseDate',
        'endDate',
        'national',
        'description',
        'trailer',
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

    public function rating()
    {
        return $this->belongsTo(Rating::class, 'rating_id', 'id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'movie_id', 'id');
    }

    public function schedulesByDate($date)
    {
        return $this->schedules()->where('date', $date)->get();
    }
}
