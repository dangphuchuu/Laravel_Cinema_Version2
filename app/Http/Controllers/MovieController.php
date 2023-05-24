<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Director;
use App\Models\Movie;
use App\Models\MovieGenres;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

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
        return view('admin.movie.create', ['movie_genres' => $movie_genres, 'director' => $director, 'cast' => $cast]);
    }

    public function postCreate(Request $request)
    {
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['Image'] = $file;
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'movies',
                'format' => 'jpg',

            ])->getPublicId();
            $movie = new Movie(
                [
                    'name' => $request->name,
                    'image' => $cloud,
                    'showTime' => $request->showTime['hour'] . ':' . $request->showTime['minute'],
                    'releaseDate' => $request->releaseDate,
                    'endDate' => $request->endDate,
                    'national' => $request->national,
                    'rating_id' => $request->rating,
                    'description' => $request->description
                ]
            );

//            $movie->casts = $request->casts;
//            $movie->directors = $request->directors;
//            $movie->movieGenres = $request->movieGenres;

            $movie->save();
        }
        return redirect('admin/movie');
    }

    public function edit_movie()
    {
        return view('admin.movie.edit');
    }
}
