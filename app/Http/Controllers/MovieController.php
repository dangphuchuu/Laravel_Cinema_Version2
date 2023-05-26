<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Director;
use App\Models\Movie;
use App\Models\MovieGenres;
use App\Models\Rating;
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
        $rating = Rating::all();
        return view('admin.movie.create', [
            'movieGenres' => $movieGenres,
            'directors' => $directors,
            'casts' => $casts,
            'rating' => $rating
        ]);
    }

    public function postCreate(Request $request)
    {
//        if ($request->hasFile('Image')) {
        $file = $request->file('image');
        $img = $request['image'] = $file;
        dd($file);
        $cloud = Cloudinary::upload($img->getRealPath(), [
            'folder' => 'movies',
            'format' => 'jpg',

        ])->getPublicId();
//        $movie = new Movie(
//            [
//                'name' => $request->name,
//                'image' => null,
//                'showTime' => $request->showTime['hour'] . ':' . $request->showTime['minute'],
//                'releaseDate' => $request->releaseDate,
//                'endDate' => $request->endDate,
//                'national' => $request->national,
//                'rating_id' => $request->rating,
//                'description' => $request->description
//            ]
//        );
//
//        $movie->save();
//
//        $casts = Cast::find($request->casts);
//        $movie->casts()->attach($casts);
//
//        $directors = Director::find($request->directors);
//        $movie->directors()->attach($directors);
//
//        $movieGenres = MovieGenres::find($request->movieGenres);
//        $movie->movieGenres()->attach($movieGenres);
//        }
        return redirect('admin/movie');
    }

    public function edit_movie()
    {
        return view('admin.movie.edit');
    }
}
