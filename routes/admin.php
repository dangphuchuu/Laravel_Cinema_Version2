<?php

use App\Http\Controllers\ComboController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieGenresController;
use App\Http\Controllers\TheaterController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    //TODO Sign-in admin
    Route::get('/sign_in', [AdminController::class, 'sign_in']);
    Route::post('/sign_in', [AdminController::class, 'Post_sign_in']);
    Route::get('/sign_out', [AdminController::class, 'sign_out']);
});
Route::prefix('admin')->middleware('admin', 'role:admin|staff')->group(function () {
    Route::get('/', [AdminController::class, 'home']);

    //TODO Movie Genres
    Route::prefix('movie_genres')->group(function () {
        Route::get('/', [MovieGenresController::class, 'movie_genres']);
        Route::post('/create', [MovieGenresController::class, 'postCreate']);
        Route::post('/edit/{id}', [MovieGenresController::class, 'postEdit']);
        Route::delete('/delete/{id}', [MovieGenresController::class, 'delete']);
    });

    //TODO Movie
    Route::prefix('movie')->group(function () {
        Route::get('/', [MovieController::class, 'movie']);
        Route::get('/create', [MovieController::class, 'getCreate']);
        Route::post('/create', [MovieController::class, 'postCreate']);
        Route::get('/edit', [MovieController::class, 'edit_movie']);
    });
    //TODO Room
    Route::prefix('room')->group(function () {
        Route::get('/', [RoomController::class, 'room']);
        Route::post('/create', [RoomController::class, 'postCreate']);
        Route::get('/edit', [RoomController::class, 'postEdit']);
    });
    //TODO Cinema
    Route::prefix('theater')->group(function () {
        Route::get('/', [TheaterController::class, 'theater']);
        Route::get('/create', [TheaterController::class, 'create_cinema']);
        Route::get('/edit', [TheaterController::class, 'edit_cinema']);
    });

    //TODO Cinema
    Route::prefix('schedule')->group(function () {
        Route::get('/', [AdminController::class, 'schedule']);
        Route::post('/create', [AdminController::class, 'postCreate']);
        Route::post('/edit', [AdminController::class, 'postEdit']);
    });

    //TODO Events
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'events']);
        Route::post('/create', [EventController::class, 'postCreate']);
        Route::post('/edit/{id}', [EventController::class, 'postEdit']);
        Route::delete('/delete/{id}', [EventController::class, 'delete']);
    });

    //TODO Book_Ticket
    Route::prefix('ticket')->group(function () {
        Route::get('/', [TicketController::class, 'ticket']);

    });

    //TODO Food/Topping
    Route::prefix('food')->group(function () {
        Route::get('/', [FoodController::class, 'food']);
        Route::post('/create', [FoodController::class, 'postCreate']);
        Route::post('/edit/{id}', [FoodController::class, 'postEdit']);
        Route::delete('/delete/{id}', [FoodController::class, 'delete']);
    });

    //TODO user_account
    Route::prefix('user')->group(function () {
        Route::get('/', [AdminController::class, 'user']);
    });

    //TODO staff_account
    Route::prefix('staff')->group(function () {
        Route::get('/', [AdminController::class, 'staff']);
        Route::post('/create', [AdminController::class, 'postCreate']);
        Route::post('/permission/{id}', [AdminController::class, 'postPermission']);
        Route::delete('/delete/{id}', [AdminController::class, 'delete']);
    });

    //TODO banners
    Route::prefix('banners')->group(function () {
        Route::get('/', [BannerController::class, 'banners']);
        Route::post('/create', [BannerController::class, 'postCreate']);
        Route::post('/edit/{id}', [BannerController::class, 'postEdit']);
        Route::delete('/delete/{id}', [BannerController::class, 'delete']);
    });

    //TODO Director
    Route::prefix('director')->group(function () {
        Route::get('/', [DirectorController::class, 'director']);
        Route::post('/create', [DirectorController::class, 'postCreate']);
        Route::post('/edit/{id}', [DirectorController::class, 'postEdit']);
        Route::delete('/delete/{id}', [DirectorController::class, 'delete']);
    });
    //TODO Cast
    Route::prefix('cast')->group(function () {
        Route::get('/', [CastController::class, 'cast']);
        Route::post('/create', [CastController::class, 'postCreate']);
        Route::post('/edit/{id}', [CastController::class, 'postEdit']);
        Route::delete('/delete/{id}', [CastController::class, 'delete']);
    });
    //TODO Combo
    Route::prefix('combo')->group(function () {
        Route::get('/', [ComboController::class, 'combo']);
        Route::post('/create', [ComboController::class, 'postCreate']);
        Route::post('/edit/{id}', [ComboController::class, 'postEdit']);
        Route::post('/detail/{id}', [ComboController::class, 'detail']);
        Route::delete('/delete/{id}', [ComboController::class, 'delete']);
    });

    //TODO statistical
    Route::prefix('statistical')->group(function () {
        Route::get('/', [AdminController::class, 'statistical']);
    });
});
