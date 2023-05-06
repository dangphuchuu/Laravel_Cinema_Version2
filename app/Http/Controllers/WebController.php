<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function home()
    {
        $movies = DB::select('select * from movies');
        return view('web.pages.home', ['movies' => $movies]);
    }

    public function movieDetail() {
        return view('web.pages.movieDetail');
    }
}
