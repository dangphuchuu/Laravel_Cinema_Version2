<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cast;
use App\Models\Director;
use App\Models\Movie;
use App\Models\MovieGenres;
use App\Models\Rating;
use App\Models\Theater;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    function __construct()
    {
        $cloud_name = cloud_name();
        view()->share('cloud_name', $cloud_name);
    }

    public function home()
    {
        $banners = Banner::get()->where('status',1);
        $movies = Movie::get()->where('status', 1)->take(6);
        return view('web.pages.home', ['movies' => $movies, 'banners' => $banners]);
    }

    public function movieDetail($id)
    {
        $movie = Movie::find($id);
        return view('web.pages.movieDetail', ['movie' => $movie]);
    }

    public function ticket()
    {
        return view('web.pages.ticket');
    }

    public function schedules()
    {
        $movies = Movie::whereDate('releaseDate', '<=', Carbon::today()->toDateString())->get();
        $theaters = Theater::all();
        $film = new Movie();
        foreach ($movies as $movie) {
            $film = $movie;
            break;
        }
        $cities = [];
        foreach ($theaters as $theater) {
            if (array_search($theater->city, $cities)) {
                continue;
            } else {
                array_push($cities, $theater->city);
            }
        }
        return view('web.pages.schedules', [
            'movies' => $movies,
            'film' => $film,
            'theaters' => $theaters,
            'cities' => $cities
        ]);
    }

    public function movies(Request $request)
    {
        $casts = Cast::all();
        $directors = Director::all();
        $movies = Movie::all()->where('status', 1);
        $movieGenres = MovieGenres::all();
        $rating = Rating::all();

        return view('web.pages.movies', [
            'movies' => $movies,
            'movieGenres' => $movieGenres,
            'rating' => $rating,
            'casts' => $casts,
            'directors' => $directors
        ]);
    }

    public function movieSearch(Request $request)
    {
        $casts = Cast::all();
        $directors = Director::all();
        $movieGenres = MovieGenres::all();
        $rating = Rating::all();


        if ($request->casts == null && $request->directors == null && $request->movieGenres == null && $request->rating == null) {
            return redirect('/movies');
        } else {

            $query = 'SELECT id FROM movies ';
            $join = '';
            $where = ' WHERE ';
            $groupby = ' GROUP BY movies.id';
            $arr = [];
            if ($request->movieGenres) {
                $i = 0;
                foreach ($request->movieGenres as $genre) {
                    $i++;
                    $join .= ' INNER JOIN moviegenres_movies AS genre_' . $i . ' ON movies.id = genre_' . $i . '.movie_id';
                    $where .= 'genre_' . $i . '.movieGenre_id = ? AND ';
                }
                $arr = array_merge($arr, $request->movieGenres);
            }
            if ($request->casts) {
                $i = 0;
                foreach ($request->casts as $cast) {
                    $i++;
                    $join .= ' INNER JOIN casts_movies AS cast_' . $i . ' ON movies.id = cast_' . $i . '.movie_id';
                    $where .= 'cast_' . $i . '.cast_id = ? AND ';
                }
                $arr = array_merge($arr, $request->casts);
            }
            if ($request->directors) {
                $i = 0;
                foreach ($request->directors as $director) {
                    $i++;
                    $join .= ' INNER JOIN directors_movies AS director_' . $i . ' ON movies.id = director_' . $i . '.movie_id';
                    $where .= 'director_' . $i . '.director_id = ? AND ';
                }
                $arr = array_merge($arr, $request->directors);
            }
            if ($request->rating) {
                $where .= 'rating_id = ? AND ';
                array_push($arr, $request->rating);
            }

            $query .= $join .= $where;
            $query = substr($query, 0, -5);
            $query .= $groupby;
            $moviesquery = DB::select($query, $arr);
            $movies_id = [];
            foreach ($moviesquery as $item) {
                array_push($movies_id, $item->id);
            }
            $movies = Movie::find($movies_id);

            return view('web.pages.movies', [
                'movies' => $movies,
                'movieGenres' => $movieGenres,
                'rating' => $rating,
                'casts' => $casts,
                'directors' => $directors
            ]);
        }


    }

    public function events()
    {
        return view('web.pages.events');
    }

    public function signIn(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Please enter your email!',
                'password.required' => 'Please enter your password!'
            ]
        );
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'fullName' => 'required|min:1',
            'email' => 'required|unique:users',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ], [
            'fullName.required' => 'fullName is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'repassword.required' => 'Password is required',
            'repassword.same' => "Password doesn't match",
        ]);
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->all());
        $user->syncRoles('user');
        return redirect('/')->with('success', 'Sign Up Successfully!');
    }

    public function signOut()
    {
        Auth::logout();
        return redirect('/');
    }
}
