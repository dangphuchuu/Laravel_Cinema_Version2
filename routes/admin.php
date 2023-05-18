<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieGenresController;
use App\Http\Controllers\MovieTypeController;
use App\Http\Controllers\BannerController;

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
        Route::delete('delete/{id}', [MovieGenresController::class, 'delete_movie_genres']);
    });

    //TODO Movie
    Route::prefix('movie')->group(function () {
        Route::get('/', [MovieController::class, 'movie']);
        Route::get('/create', [MovieController::class, 'getCreate']);
        Route::post('/create', [MovieController::class, 'postCreate']);
        Route::get('/edit', [MovieController::class, 'edit_movie']);
    });
    //TODO Movie
    Route::prefix('room')->group(function () {
        Route::get('/', [RoomController::class, 'room']);
        Route::post('/create', [RoomController::class, 'postCreate']);
        Route::get('/edit', [RoomController::class, 'postEdit']);
    });
    //TODO Cinema
    Route::prefix('cinema')->group(function () {
        Route::get('/', [AdminController::class, 'cinema']);
        Route::get('/create', [AdminController::class, 'create_cinema']);
        Route::get('/edit', [AdminController::class, 'edit_cinema']);
    });

    //TODO Cinema
    Route::prefix('schedule')->group(function () {
        Route::get('/', [AdminController::class, 'schedule']);
        Route::get('/create', [AdminController::class, 'create_schedule']);
        Route::get('/edit', [AdminController::class, 'edit_schedule']);
    });

    //TODO Events
    Route::prefix('events')->group(function () {
        Route::get('/', [AdminController::class, 'events']);
        Route::get('/create', [AdminController::class, 'create_events']);
        Route::get('/edit', [AdminController::class, 'edit_events']);
    });

    //TODO Book_Ticket
    Route::prefix('ticket')->group(function () {
        Route::get('/', [TicketController::class, 'ticket']);
    });

    //TODO Food/Topping
    Route::prefix('food')->group(function () {
        Route::get('/', [FoodController::class, 'food']);
    });

    //TODO user_account
    Route::prefix('user')->group(function () {
        Route::get('/', [AdminController::class, 'user']);
    });

    //TODO staff_account
    Route::prefix('staff')->group(function () {
        Route::get('/', [AdminController::class, 'staff']);
        Route::post('/create', [AdminController::class, 'create_staff']);
    });

    //TODO banners
    Route::prefix('banners')->group(function () {
        Route::get('/', [BannerController::class, 'banners']);
        Route::post('/create', [BannerController::class, 'postCreate']);
        Route::post('/edit/{id}', [BannerController::class, 'postEdit']);
        Route::delete('ajax/delete_banner/{id}', [BannerController::class, 'delete']);
    });

    //TODO Director
    Route::prefix('director')->group(function () {
        Route::get('/', [DirectorController::class, 'director']);
        Route::post('/create', [DirectorController::class, 'postCreate']);
        Route::post('/edit/{id}', [DirectorController::class, 'postEdit']);
        Route::delete('ajax/delete_director/{id}', [DirectorController::class, 'delete']);
    });
    //TODO Cast
    Route::prefix('cast')->group(function () {
        Route::get('/', [CastController::class, 'cast']);
        Route::post('/create', [CastController::class, 'postCreate']);
        Route::post('/edit/{id}', [CastController::class, 'postEdit']);
        Route::delete('ajax/delete_cast/{id}', [CastController::class, 'delete']);
    });

    //TODO statistical
    Route::prefix('statistical')->group(function () {
        Route::get('/', [AdminController::class, 'statistical']);
    });
});
