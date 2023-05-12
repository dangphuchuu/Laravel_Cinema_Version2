<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

DB::table('users')->insert([
    'fullName' => 'Phúc Hữu',
    'password' => bcrypt('1'),
    'email' => 'admin@gmail.com',
    'phone' => '123456789',
    'status' => true,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
DB::table('users')->insert([
    'fullName' => 'Quốc Minh',
    'password' => bcrypt('1'),
    'email' => 'minh@gmail.com',
    'phone' => '1212121212',
    'status' => true,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
