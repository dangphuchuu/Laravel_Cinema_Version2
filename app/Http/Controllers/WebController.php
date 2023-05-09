<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function home()
    {
        return view('web.pages.home');
    }

    public function movieDetail() {
        return view('web.pages.movieDetail');
    }

    public function  ticket() {
        return view('web.pages.ticket', [
            "title"=>"warning",
            "content"=>"Huu ngu ngu ngu ngu"
        ]);
    }

}
