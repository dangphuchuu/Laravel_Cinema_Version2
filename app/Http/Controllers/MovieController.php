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

        $movies = Movie::orderBy('id', 'DESC')->Paginate(5);
        return view('admin.movie.list', ['movies' => $movies]);
    }

    public function getCreate()
    {
        $casts = Cast::all();
        $directors = Director::all();
        $movieGenres = MovieGenres::all();
        return view('admin.movie.create', ['movieGenres' => $movieGenres, 'directors' => $directors, 'casts' => $casts]);
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

            $movie->casts()->create($request->casts);
            $movie->directors()->create($request->directors);
            $movie->movieGenres()->create($request->movieGenres);

            $movie->save();
        }
        return redirect('admin/movie');
    }

    public function edit_movie()
    {
        return view('admin.movie.edit');
    }
}
