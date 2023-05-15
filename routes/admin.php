<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieGenresController;
use App\Http\Controllers\MovieTypeController;

Route::prefix('admin')->group(function () {
    //TODO Sign-in admin
    Route::get('/sign_in', [AdminController::class, 'sign_in']);
    Route::post('/sign_in', [AdminController::class, 'Post_sign_in']);
    Route::get('/sign_out', [AdminController::class, 'sign_out']);
});
Route::prefix('admin')->middleware('admin', 'role:admin|staff')->group(function () {
    Route::get('/', [AdminController::class, 'home']);

    //TODO Movie Genres

    Route::get('/movie_genres', [MovieGenresController::class, 'movie_genres']);
    Route::get('/movie_genres/create', [MovieGenresController::class, 'getCreate']);
    Route::post('/movie_genres/create', [MovieGenresController::class, 'postCreate']);
    Route::post('/movie_genres/edit/{id}', [MovieGenresController::class, 'postEdit']);
    Route::delete('ajax/delete_movie_genres/{id}', [MovieGenresController::class, 'delete_movie_genres']);

    //TODO Movie

    Route::get('/movie', [MovieController::class, 'movie']);
    Route::get('/movie/create', [MovieController::class, 'getCreate']);
    Route::post('/movie/create', [MovieController::class, 'postCreate']);
    Route::get('/movie/edit', [MovieController::class, 'edit_movie']);

    //TODO Cinema

    Route::get('/cinema', [AdminController::class, 'cinema']);
    Route::get('/cinema/create', [AdminController::class, 'create_cinema']);
    Route::get('/cinema/edit', [AdminController::class, 'edit_cinema']);

    //TODO Cinema

    Route::get('/schedule', [AdminController::class, 'schedule']);
    Route::get('/schedule/create', [AdminController::class, 'create_schedule']);
    Route::get('/schedule/edit', [AdminController::class, 'edit_schedule']);

    //TODO Events

    Route::get('/events', [AdminController::class, 'events']);
    Route::get('/events/create', [AdminController::class, 'create_events']);
    Route::get('/events/edit', [AdminController::class, 'edit_events']);

    //TODO Book_Ticket

    Route::get('/book_ticket', [AdminController::class, 'book_ticket']);

    //TODO Food/Topping

    Route::get('/book_ticket', [AdminController::class, 'book_ticket']);

    //TODO user_account

    Route::get('/user', [AdminController::class, 'user']);

    //TODO staff_account

    Route::get('/staff', [AdminController::class, 'staff']);
    Route::post('/staff/create', [AdminController::class, 'create_staff']);

    //TODO banners

    Route::get('/banners', [AdminController::class, 'banners']);
    Route::get('/banners/create', [AdminController::class, 'create_banners']);
    Route::get('/banners/edit', [AdminController::class, 'edit_banners']);

    //TODO Director

    Route::get('/director', [DirectorController::class, 'director']);
    Route::get('/director/create', [DirectorController::class, 'getCreate']);
    Route::post('/director/create', [DirectorController::class, 'postCreate']);
    Route::post('/director/edit', [DirectorController::class, 'postEdit']);

     //TODO Cast

     Route::get('/cast', [CastController::class, 'cast']);
     Route::get('/cast/create', [CastController::class, 'getCreate']);
     Route::post('/cast/create', [CastController::class, 'postCreate']);
     Route::post('/cast/edit', [CastController::class, 'postEdit']);

    //TODO statistical

    Route::get('/statistical', [AdminController::class, 'statistical']);
});
