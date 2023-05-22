<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Director;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieGenres;

class MovieController extends Controller
{
    public function movie()
    {
        $movie = Movie::orderBy('id', 'DESC')->Paginate(5);
        return view('admin.movie.list', ['movie' => $movie]);
    }

    public function getCreate()
    {
        $cast = Cast::all();
        $director = Director::all();
        $movie_genres = MovieGenres::all();
        return view('admin.movie.create', ['movie_genres' => $movie_genres, 'director' => $director,'cast'=>$cast]);
    }

    public function postCreate()
    {
    }

    public function edit_movie()
    {
        return view('admin.movie.edit');
    }
}
