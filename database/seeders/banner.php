<?php

use Illuminate\Support\Facades\DB;

DB::table('banners')->insert([
    [
        'name' => 'https://www.heyuguys.com/images/2012/11/Gangster-Squad-Banner.jpg',
        'status' => 1,
    ], [
        'name' => 'https://teaser-trailer.com/wp-content/uploads/Avengers-Infinity-War-Banner.jpg',
        'status' => 1,
    ], [
        'name' => 'https://collider.com/wp-content/uploads/inception_movie_poster_banner_01.jpg',
        'status' => 1,
    ], [
        'name' => 'https://tedhicksfilmetc.files.wordpress.com/2013/06/world-war-z-banner-poster.jpg',
        'status' => 1,
    ]
]);
