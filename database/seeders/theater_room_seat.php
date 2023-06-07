<?php

use App\Models\Room;
use App\Models\Seat;
use Illuminate\Support\Facades\DB;

//TODO: theater
DB::table('theaters')->insert([
    [
        'name' => 'Theater 1',
        'address' => '180 Cao Lỗ, Phường 4, Quận 8',
        'city' => 'Hồ Chí Minh',
        'location' => 'https://goo.gl/maps/byH5EsfDuzKR1fYu6',
        'status' => true,
    ], [
        'name' => 'Theater 2',
        'address' => '180 Lỗ Cao, Phường 5, Quận 9',
        'city' => 'Hà Nội',
        'location' => 'https://goo.gl/maps/byH5EsfDuzKR1fYu6',
        'status' => true,
    ], [
        'name' => 'Theater 3',
        'address' => '180 Cỗ Lao, Phường 6, Quận 10',
        'city' => 'Đà Nẵng',
        'location' => 'https://goo.gl/maps/byH5EsfDuzKR1fYu6',
        'status' => true
    ]
]);


//TODO: room_types
DB::table('roomTypes')->insert([
    [
        'name' => '2D',
        'surcharge' => 0,
    ], [
        'name' => '3D',
        'surcharge' => 40000,
    ], [
        'name' => '4D',
        'surcharge' => 60000,
    ], [
        'name' => 'IMAX',
        'surcharge' => 100000,
    ]
]);

//TODO: room
DB::table('rooms')->insert([
    [
        'name' => 'Room 1',
        'roomType_id' => 1,
        'theater_id' => 1,
        'status' => true,
    ], [
        'name' => 'Room 2',
        'roomType_id' => 1,
        'theater_id' => 1,
        'status' => true,
    ], [
        'name' => 'Room 1',
        'roomType_id' => 1,
        'theater_id' => 2,
        'status' => true,
    ], [
        'name' => 'Room 2',
        'roomType_id' => 1,
        'theater_id' => 2,
        'status' => true,
    ], [
        'name' => 'Room 3',
        'roomType_id' => 1,
        'theater_id' => 2,
        'status' => true,
    ], [
        'name' => 'Room 1',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ], [
        'name' => 'Room 2',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ], [
        'name' => 'Room 3',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ], [
        'name' => 'Room 4',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ], [
        'name' => 'Room 5',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ], [
        'name' => 'Room 6',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ]
]);

//TODO: seat_types
DB::table('seatTypes')->insert([
    [
        'name' => 'standard',
        'surcharge' => 0,
        'color' => '#FFF0C7',
    ],
    [
        'name' => 'vip',
        'surcharge' => 20000,
        'color' => '#FFC8CB',
    ],
    [
        'name' => 'couple',
        'surcharge' => 30000,
        'color' => '#FF62B0',
    ]
]);
function seat_type()
{
    $room = Room::find(1);
    for ($i = 65; $i <= (65 + 8); $i++) {
        for ($j = 1; $j <= 15; $j++) {
            $seat = new Seat([
                'row' => chr($i),
                'col' => $j,
                'room_id' => $room->id,
            ]);
            if ($j == 3) {
                $seat->me = 2;
            }
            if (15 - 2 == $j) {
                $seat->ms = 2;
            }
            if ($i <= 68 && $room->roomType_id == 1) {
                $seat->seatType_id = 1;
            } else {
                $seat->seatType_id = 2;
            }
            $seat->save();
        }
    }
}

function seat_type2()
{
    $room = Room::find(2);
    for ($i = 65; $i <= (65 + 8); $i++) {
        for ($j = 1; $j <= 15; $j++) {
            $seat = new Seat([
                'row' => chr($i),
                'col' => $j,
                'room_id' => $room->id,
            ]);
            if ($j == 3) {
                $seat->me = 2;
            }
            if (15 - 2 == $j) {
                $seat->ms = 2;
            }
            if ($i <= 68 && $room->roomType_id == 1) {
                $seat->seatType_id = 1;
            } else {
                $seat->seatType_id = 2;
            }
            $seat->save();
        }
    }
}

seat_type();
seat_type2();



