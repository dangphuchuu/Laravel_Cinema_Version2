<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_genres_movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_id',
        'movie_genres_id',
    ];
    public function movies()
    {
        return $this->hasMany(Movie::class, 'id', 'movie_id');
    }
    public function movie_genres()
    {
        return $this->hasMany(MovieGenres::class, 'id', 'movie_genres_id');
    }
}
