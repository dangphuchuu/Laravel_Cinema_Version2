<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

DB::table('movies')->insert([
    'name' => 'Quốc Minh',
    'showTime' => bcrypt('1'),
    'releaseDate' => 'tqminh0907@gmail.com',
    'endDate' => '789456123',
    'director_id' => true,
    'cast_id' => '',
    "description" => '',
    'rating_id' => '',
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
