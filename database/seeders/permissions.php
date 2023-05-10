<?php

use Spatie\Permission\Models\Permission;


//TODO: Movie_Genres
Permission::create(['name' => 'list movie_genre']);
Permission::create(['name' => 'create movie_genre']);
Permission::create(['name' => 'edit movie_genre']);

//TODO: List Movies
Permission::create(['name' => 'list movies']);
Permission::create(['name' => 'create movies']);
Permission::create(['name' => 'edit movies']);

//TODO: Cinema
Permission::create(['name' => 'list cinema']);
Permission::create(['name' => 'create cinema']);
Permission::create(['name' => 'edit cinema']);

//TODO: Schedule Movies
Permission::create(['name' => 'list schedule_movie']);
Permission::create(['name' => 'create schedule_movie']);
Permission::create(['name' => 'edit schedule_movie']);

//TODO: Events
Permission::create(['name' => 'list events']);
Permission::create(['name' => 'create events']);
Permission::create(['name' => 'edit events']);

//TODO: Ticket
Permission::create(['name' => 'list ticket']);
Permission::create(['name' => 'create ticket']);
Permission::create(['name' => 'edit ticket']);

//TODO: Food/Combo
Permission::create(['name' => 'list food_combo']);
Permission::create(['name' => 'create food_combo']);
Permission::create(['name' => 'edit food_combo']);

//TODO: User
Permission::create(['name' => 'list user']);
Permission::create(['name' => 'create user']);
Permission::create(['name' => 'edit user']);

//TODO: staff
Permission::create(['name' => 'list staff']);
Permission::create(['name' => 'create staff']);
Permission::create(['name' => 'edit staff']);

//TODO: Banners
Permission::create(['name' => 'list banners']);
Permission::create(['name' => 'create banners']);
Permission::create(['name' => 'edit banners']);

//TODO: statistical
Permission::create(['name' => 'list statistical']);
Permission::create(['name' => 'create statistical']);
Permission::create(['name' => 'edit statistical']);
