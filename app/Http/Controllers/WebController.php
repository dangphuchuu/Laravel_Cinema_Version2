<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cast;
use App\Models\Director;
use App\Models\Movie;
use App\Models\MovieGenres;
use App\Models\Post;
use App\Models\Price;
use App\Models\Rating;
use App\Models\RoomType;
use App\Models\Schedule;
use App\Models\SeatType;
use App\Models\Theater;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
        $banners = Banner::get()->where('status', 1);
        $movies = Movie::get()->where('status', 1)->take(6);
        return view('web.pages.home', ['movies' => $movies, 'banners' => $banners]);
    }

    public function movieDetail($id, Request $request)
    {
        $movie = Movie::find($id);
        $roomTypes = RoomType::all();
        $cities = [];
        $theaters = Theater::where('status', 1)->get();
        foreach ($theaters as $theater) {
            if (array_search($theater->city, $cities)) {
                continue;
            } else {
                array_push($cities, $theater->city);
            }
        }
        if (isset($request->city)) {
            $city_cur = $request->city;
        } else {
            $city_cur = $cities[0];
        }
        if (isset($request->date)) {
            $date_cur = $request->date;
        } else {
            $date_cur = date('Y-m-d');
        }
        $theaters_city = Theater::where('status', 1)->where('city', $city_cur)->get();
        return view('web.pages.movieDetail', [
            'movie' => $movie,
            'theater_city' => $theaters_city,
            'date_cur' => $date_cur,
            'cities' => $cities,
            'city_cur' => $city_cur,
            'roomTypes' => $roomTypes,
            'theaters_city' => $theaters_city,
        ]);
    }

    public function ticket($schedule_id)
    {

        $seatTypes = SeatType::all();
        $schedule = Schedule::find($schedule_id);
        if (strtotime($schedule->startTime) < strtotime('17:00')) {
            $price = Price::where('generation', 'vtt')
                ->where('day', 'like', '%' . date('l', strtotime($schedule->date)) . '%')
                ->where('after', '08:00')->get()->first()->price;
        } else {
            $price = Price::where('generation', 'vtt')
                ->where('day', 'like', '%' . date('l', strtotime($schedule->date)) . '%')
                ->where('after', '17:00')->get()->first()->price;
        }
        $roomSurcharge = $schedule->room->roomType->surcharge;
        $room = $schedule->room;
        $movie = $schedule->movie;
        return view('web.pages.ticket', [
            'schedule' => $schedule,
            'room' => $room,
            'seatTypes' => $seatTypes,
            'roomSurcharge' => $roomSurcharge,
            'price' => $price,
            'movie' => $movie,
        ]);
    }

    public function schedulesByMovie(Request $request)
    {
        $cities = [];
        $theaters = Theater::where('status', 1)->get();
        foreach ($theaters as $theater) {
            if (array_search($theater->city, $cities)) {
                continue;
            } else {
                array_push($cities, $theater->city);
            }
        }
        if (isset($request->city)) {
            $city_cur = $request->city;
        } else {
            $city_cur = $cities[0];
        }
        if (isset($request->date)) {
            $date_cur = $request->date;
        } else {
            $date_cur = date('Y-m-d');
        }
        $theaters_city = Theater::where('status', 1)->where('city', $city_cur)->get();
        $roomTypes = RoomType::all();
        $movies = Movie::whereDate('releaseDate', '<=', Carbon::today()->format('Y-m-d'))
            ->where('endDate', '>=', Carbon::today()->format('Y-m-d'))
            ->where('status', 1)->get();

        $schedules = Schedule::select('schedules.*', 'theaters.name as theater', 'roomTypes.name as roomType')
            ->join('rooms', 'schedules.room_id', '=', 'rooms.id')
            ->join('theaters', 'rooms.theater_id', '=', 'theaters.id')
            ->join('roomTypes', 'rooms.roomType_id', '=', 'roomTypes.id')
            ->orderBy('theaters.name', 'asc')
            ->orderBy('roomTypes.name', 'asc')->get();


        return view('web.pages.schedulesMovie', [
            'movies' => $movies,
            'theaters' => $theaters,
            'cities' => $cities,
            'date_cur' => $date_cur,
            'city_cur' => $city_cur,
            'roomTypes' => $roomTypes,
            'theaters_city' => $theaters_city,
        ]);
    }

    public function schedulesbyTheater(Request $request)
    {
        $cities = [];
        $theaters = Theater::where('status', 1)->get();
        foreach ($theaters as $theater) {
            if (array_search($theater->city, $cities)) {
                continue;
            } else {
                array_push($cities, $theater->city);
            }
        }
        if (isset($request->date)) {
            $date_cur = $request->date;
        } else {
            $date_cur = date('Y-m-d');
        }
        $roomTypes = RoomType::all();
        $movies = Movie::whereDate('releaseDate', '<=', Carbon::today()->format('Y-m-d'))
            ->where('endDate', '>=', Carbon::today()->format('Y-m-d'))
            ->where('status', 1)->get();

        $schedules = Schedule::select('schedules.*', 'theaters.name as theater', 'roomTypes.name as roomType')
            ->join('rooms', 'schedules.room_id', '=', 'rooms.id')
            ->join('theaters', 'rooms.theater_id', '=', 'theaters.id')
            ->join('roomTypes', 'rooms.roomType_id', '=', 'roomTypes.id')
            ->orderBy('theaters.name', 'asc')
            ->orderBy('roomTypes.name', 'asc')->get();


        return view('web.pages.schedulesTheater', [
            'movies' => $movies,
            'theaters' => $theaters,
            'cities' => $cities,
            'date_cur' => $date_cur,
            'roomTypes' => $roomTypes,
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

    public function search(Request $request)
    {
        $request->validate(
            [
                'word' => 'required|min:3',
            ],
            [
                'word.required' => 'Please enter your word!',
            ]
        );
        $result = new Collection();
        $movies = Movie::select('movies.*')
            ->join('movieGenres_movies', 'movies.id', '=', 'movieGenres_movies.movie_id')
            ->join('movie_genres', 'movieGenres_movies.movieGenre_id', '=', 'movie_genres.id')
            ->join('casts_movies', 'movies.id', '=', 'casts_movies.movie_id')
            ->join('directors_movies', 'movies.id', '=', 'directors_movies.movie_id')
            ->join('casts', 'casts_movies.cast_id', '=', 'casts.id')
            ->join('directors', 'directors_movies.director_id', '=', 'directors.id')
            ->where('movie_genres.name', 'like', '%' . $request->word . '%')
            ->orWhere('movies.name', 'like', '%' . $request->word . '%')
            ->orWhere('casts.name', 'like', '%' . $request->word . '%')
            ->orWhere('directors.name', 'like', '%' . $request->word . '%')->groupBy('movies.name')->get();

        $posts = Post::where('title', 'like', '%' . $request->word . '%')->get();

        foreach ($movies as $movie) {
            $movie->setAttribute('type', 'movie');
            $result->push($movie);
        }
        foreach ($posts as $post) {
            $post->setAttribute('type', 'post');
            $result->push($post);
        }
        return view('web.pages.search', ['result' => $result]);
    }

    public function events()
    {
        $posts = Post::all();
        return view('web.pages.events', [
            'posts' => $posts
        ]);
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
