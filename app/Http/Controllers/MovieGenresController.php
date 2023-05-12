<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieGenres;

class MovieGenresController extends Controller
{
    public function movie_genres()
    {
        $movieGenres = MovieGenres::all();
        return view('admin.movie_genres.list', ['movieGenres' => $movieGenres]);
    }
    public function getCreate()
    {
        return view('admin.movie_genres.create');
    }
    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:movie_genres'
        ], [
            'name.required' => "Please enter movie genre",
            'name.unique' => 'Movie genre exists'
        ]);
        MovieGenres::create($request->all());
        return redirect('admin/movie_genres')->with('success', 'Added Successfully!');
    }
    public function getEdit($id)
    {
        return view('admin.movie_genres.edit');
    }
    public function postEdit(Request $request, $id)
    {
    }
    public function delete_movie_genres($id)
    {
        MovieGenres::destroy($id);
        return response()->json(['success' => 'Delete Successfully']);
    }
}
