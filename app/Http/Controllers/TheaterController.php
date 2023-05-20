<?php

namespace App\Http\Controllers;

use App\Models\Theater;

class TheaterController extends Controller
{
    public function __construct()
    {
    }

    public function theater()
    {
        $theaters = Theater::all();
        return view('admin.theater.list', [
            'theaters' => $theaters,
        ]);
    }
}
