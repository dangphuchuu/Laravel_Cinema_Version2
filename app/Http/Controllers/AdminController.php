<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function __construct()
    {
    }
    public function home()
    {
        return view('admin.home.list');
    }
    //! Movie Genres
    public function movie_genres()
    {
        return view('admin.movie_genres.list');
    }
    public function create_movie_genres()
    {
        return view('admin.movie_genres.create');
    }
    public function edit_movie_genres()
    {
        return view('admin.movie_genres.edit');
    }

    //! List Movie
    public function list_movie()
    {
        return view('admin.list_movie.list');
    }
    public function create_list_movie()
    {
        return view('admin.list_movie.create');
    }
    public function edit_list_movie()
    {
        return view('admin.list_movie.edit');
    }
}
