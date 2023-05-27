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

class WebController extends Controller
{
    function __construct()
    {
        $cloud_name = cloud_name();
        view()->share('cloud_name',$cloud_name);
    }

    public function home()
    {
        $banners = Banner::all();
        $movie = Movie::get()->where('status',1)->take(6);
        return view('web.pages.home',['movie'=>$movie,'banners'=>$banners]);
    }

    public function movieDetail($id)
    {
        $movie = Movie::find($id);
        return view('web.pages.movieDetail',['movie'=>$movie]);
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
        $movies = Movie::all()->where('status',1);
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
            $movies = Movie::with(['casts' => function ($query) use ($request) {
                if ($request->casts)
                    $query->whereIn('cast_id', $request->casts);
            }, 'directors' => function ($query) use ($request) {
                if ($request->directors)
                    $query->whereIn('director_id', $request->directors);
            }, 'movieGenres' => function ($query) use ($request) {
                if ($request->movieGenres)
                    $query->whereIn('movieGenre_id', $request->movieGenres);
            }, 'rating' => function ($query) use ($request) {
                if ($request->rating)
                    $query->where('id', $request->rating);
            }])
                ->whereHas('casts', function ($query) use ($request) {
                    if ($request->casts)
                        $query->whereIn('cast_id', $request->casts);
                })
                ->whereHas('directors', function ($query) use ($request) {
                    if ($request->directors)
                        $query->whereIn('director_id', $request->directors);
                })
                ->whereHas('movieGenres', function ($query) use ($request) {
                    if ($request->movieGenres)
                        $query->whereIn('movieGenre_id', $request->movieGenres);
                })
                ->whereHas('rating', function ($query) use ($request) {
                    if ($request->rating) {
                        $query->where('id', $request->rating);
                    }
                })->get();

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
