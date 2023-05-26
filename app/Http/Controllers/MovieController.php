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
    function __construct(){
        $cloud_name = cloud_name();
        view()->share('cloud_name',$cloud_name);
    }
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

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'movies',
                'format' => 'jpg',
            ])->getPublicId();
            $movie = new Movie(
                [
                    'name' => $request->name,
                    'image' => $cloud,
                    'showTime' => $request->showTime,
                    'releaseDate' => $request->releaseDate,
                    'endDate' => $request->endDate,
                    'national' => $request->national,
                    'rating_id' => $request->rating,
                    'description' => $request->description
                ]
            );

            $movie->save();

            $casts = Cast::find($request->casts);
            $movie->casts()->attach($casts);

            $directors = Director::find($request->directors);
            $movie->directors()->attach($directors);

            $movieGenres = MovieGenres::find($request->movieGenres);
            $movie->movieGenres()->attach($movieGenres);
        }
        return redirect('admin/movie');
    }

    public function getEdit($id)
    {
        $casts = Cast::all();
        $directors = Director::all();
        $movieGenres = MovieGenres::all();
        $rating = Rating::all();
        $movie = Movie::find($id);
        return view('admin.movie.edit', ['movie' => $movie,
            'movieGenres' => $movieGenres,
            'directors' => $directors,
            'casts' => $casts,
            'rating' => $rating]);
    }

    public function postEdit(Request $request,$id)
    {

        $movie = Movie::find($id);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'movies',
                'format' => 'jpg',
            ])->getPublicId();
            $request['image'] = $cloud;
            $movie['image'] = $request['image'];
        }
            $movie['name'] = $request['name'];
            $movie['showTime'] = $request['showTime'];
            $movie['releaseDate'] = $request['releaseDate'];
            $movie['endDate'] = $request['endDate'];
            $movie['national'] = $request['national'];
            $movie['description'] = $request['description'];
            $movie['trailer'] = $request['trailer'];
            $movie['rating_id'] = $request['rating'];

            $movie->update();

            $casts = Cast::find($request->casts);
            $movie->casts()->detach();
            $movie->casts()->attach($casts);

            $directors = Director::find($request->directors);
            $movie->directors()->detach();
            $movie->directors()->attach($directors);

            $movieGenres = MovieGenres::find($request->movieGenres);
            $movie->movieGenres()->detach();
            $movie->movieGenres()->attach($movieGenres);



        return redirect('admin/movie')->with('success',"Updated Sucessfully!");
    }

    public function delete($id)
    {
        $movie = Movie::find($id);
        Cloudinary::destroy($movie['image']);
        $movie->delete();
        return response()->json(['success' => 'Delete Successfully']);
    }
}
