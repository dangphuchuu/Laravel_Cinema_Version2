<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieGenres;

class MovieGenresController extends Controller
{
    public function __construct()
    {
        $movieGenres = MovieGenres::all();
        view()->share('movieGenres', $movieGenres);
    }
    public function movie_genres()
    {
        $movieGenres = MovieGenres::all();
        return view('admin.movie_genres.list', ['movieGenres' => $movieGenres]);
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
    public function postEdit(Request $request, $id)
    {
        $movieGenres = MovieGenres::find($id);
        $request->validate([
            'name' => 'required|unique:movie_genres'
        ], [
            'name.required' => "Please enter movie genre",
            'name.unique' => 'Movie genre exists'
        ]);
        $movieGenres->update($request->all());
        return redirect('admin/movie_genres')->with('success', 'Updated Successfully!');
    }
    public function delete_movie_genres($id)
    {
        MovieGenres::destroy($id);
        return response()->json(['success' => 'Delete Successfully']);
    }
}
