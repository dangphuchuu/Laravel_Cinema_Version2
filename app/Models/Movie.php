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
        'director_id',
        'cast_id',
        'description',
        'rating_id',
        'upcomming',
        'status'
    ];
    public function generes()
    {
        return $this->hasMany(Movie_genres_movie::class, 'movie_id', 'id');
    }
    public function directors()
    {
        return $this->hasMany(Director::class, 'id', 'director_id');
    }
}
