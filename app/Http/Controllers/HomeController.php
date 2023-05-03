<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $movies = DB::select('select * from movies');
        return view('user.pages.home', ['movies' => $movies]);
    }
}
