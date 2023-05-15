<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

DB::table('rating')->insert([[
    'name' => 'C13',
    'description' => 'PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 13 TUỔI TRỞ LÊN (13+)',
], [
    'name' => 'C16',
    'description' => 'PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)',
], [
    'name' => 'C18',
    'description' => 'PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 18 TUỔI TRỞ LÊN (18+)',
], [
    'name' => 'P',
    'description' => 'PHIM ĐƯỢC PHÉP PHỔ BIẾN ĐẾN NGƯỜI XEM Ở MỌI ĐỘ TUỔI.',
]]);

DB::table('audio')->insert([[
    'audio' => 'Việt'
], [
    'audio' => 'Anh'
], [
    'audio' => 'Trung Quốc'
], [
    'audio' => 'Ấn Độ'
], [
    'audio' => 'Nga'
], [
    'audio' => 'Nhật'
], [
    'audio' => 'Hàn Quốc'
], [
    'audio' => 'Pháp'
], [
    'audio' => 'Lồng tiếng'
]]);

DB::table('sub')->insert([
    [
        'sub' => 'Việt'
    ], [
        'sub' => 'Anh'
    ],
]);
