<?php

namespace App\Http\Controllers;

use App\Models\SeatType;
use App\Models\Theater;
use Carbon\Carbon;
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

    public function create(Request $request)
    {
        $theater = new Theater([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'location' => $request->location,
            'created_at' => Carbon::today(),
            'updated_at' => null,
        ]);

        $theater->save();
        return redirect('/admin/theater');
    }

    public function status(Request $request)
    {
        $theaters = Theater::find($request->theater_id);
        $theaters['status'] = $request->active;
        $theaters->save();
        return response();
    }
}
