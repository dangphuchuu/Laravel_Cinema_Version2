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
//        foreach ($theaters as $theater) {
//            foreach ($theater->rooms as $room) {
//                dd($room->roomType->name);
//            }
//        }
        return view('admin.theater.list', [
            'theaters' => $theaters,
        ]);
    }
}
