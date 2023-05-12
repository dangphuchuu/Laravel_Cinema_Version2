<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\MovieType;

class MovieTypeController extends Controller
{
    public function movie_genres()
    {
        $movieType = MovieType::all();
        return view('admin.movie_genres.list', ['movieType' => $movieType]);
    }
    public function getCreate()
    {
        return view('admin.movie_genres.create');
    }
    public function postCreate()
    {
    }
    public function getEdit($id)
    {
        return view('admin.movie_genres.edit');
    }
    public function postEdit(Request $request, $id)
    {
    }
}
