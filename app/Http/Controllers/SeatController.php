<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function postCreate(Request $request)
    {
        $seat = new Seat([
            'row' => $request->row,
            'col' => $request->col,
            'seat_type_id' => 1,
            'room_id' => $request->room,
            'status' => true
        ]);

        $seat->save();
        return redirect('/admin/theater');
    }
}
