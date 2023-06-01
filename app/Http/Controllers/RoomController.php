<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Seat;
use App\Models\Theater;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function postCreate(Request $request)
    {
        $roomType = RoomType::find($request->roomType);
        $theater = Theater::find($request->theaterId);
//        dd($roomType->id);
        $room = new Room([
            'name' => $request->name,
            'theater_id' => $theater->id,
            'created_at' => Carbon::today(),
        ]);
        $room->roomType_id = $request->roomType;
        $room->save();


        for ($i = 65; $i <= (65 + $request->row); $i++) {
            for ($j = 1; $j <= $request->col; $j++) {
                $seat = new Seat([
                    'row' => chr($i),
                    'col' => $j,
                    'room_id' => $room->id,
                ]);
                if ($j <= 4 && $roomType->name == '2D') {
                    $seat->seatType_id = 1;
                } else {
                    $seat->seatType_id = 2;
                }
                $seat->save();
            }
        }

        return redirect('admin/theater')->with('success', 'Add new room at ' . $theater->name . ' successfully!');
    }
}
