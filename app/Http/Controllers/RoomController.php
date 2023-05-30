<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Seat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function postCreate(Request $request)
    {
        $room = new Room([
            'name' => $request->name,
            'roomType_id' => $request->roomType,
            'theater_id' => $request->theaterId,
            'created_at' => Carbon::today(),
        ]);

        for ($i = 65; $i <= (65 + $request->row); $i++) {
            for ($j = 1; $j <= $request->col; $j++) {
                $seat = new Seat([
                    'row' => chr($i),
                    'col' => $j,
                ]);
                
            }
        }
    }
}
