<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieGenres;

class MovieController extends Controller
{
    public function movie()
    {
        $movie = Movie::all();
        return view('admin.movie.list', ['movie' => $movie]);
    }
    public function getCreate()
    {
        $movie_genres = MovieGenres::all();
        return view('admin.movie.create', ['movie_genres' => $movie_genres]);
    }
    public function postCreate()
    {
    }
    public function edit_movie()
    {
        return view('admin.movie.edit');
    }
}
