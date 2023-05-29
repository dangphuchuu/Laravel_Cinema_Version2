<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SeatType;
use App\Models\Theater;
use Illuminate\Http\Request;

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
    public function status(Request $request){
        $theaters = Theater::find($request->theater_id);
        $theaters['status'] = $request->active;
        $theaters->save();
        return response();
    }
}
