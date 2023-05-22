<?php

namespace App\Http\Controllers;

use App\Models\SeatType;
use App\Models\Theater;

class TheaterController extends Controller
{
    public function __construct()
    {
    }

    public function theater()
    {
        $theaters = Theater::all();
        $seatTypes = SeatType::all();
        return view('admin.theater.list', [
            'theaters' => $theaters,
            'seatTypes' => $seatTypes
        ]);
    }
}
