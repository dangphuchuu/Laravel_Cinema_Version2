<?php

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
        'status' => true,
    ], [
        'name' => '3D',
        'status' => true,
    ], [
        'name' => '4D',
        'status' => true,
    ], [
        'name' => 'IMAX',
        'status' => true,
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
        'price' => 120000,
        'color' => '#FFF0C7',
    ],
    [
        'name' => 'vip',
        'price' => 150000,
        'color' => '#FFC8CB',
    ],
    [
        'name' => 'couple',
        'price' => 250000,
        'color' => '#FF62B0',
    ]
]);
