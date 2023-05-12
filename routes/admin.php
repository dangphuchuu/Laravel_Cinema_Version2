<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
    Route::get('/movie_genres/edit', [MovieGenresController::class, 'getEdit']);
    Route::post('/movie_genres/edit', [MovieGenresController::class, 'postEdit']);
    Route::delete('ajax/delete_movie_genres/{id}', [MovieGenresController::class, 'delete_movie_genres']);

    //TODO List Movie

    Route::get('/list_movie', [AdminController::class, 'list_movie']);
    Route::get('/list_movie/create', [AdminController::class, 'create_list_movie']);
    Route::get('/list_movie/edit', [AdminController::class, 'edit_list_movie']);

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
    Route::get('/staff/create', [AdminController::class, 'create_staff']);

    //TODO banners

    Route::get('/banners', [AdminController::class, 'banners']);
    Route::get('/banners/create', [AdminController::class, 'create_banners']);
    Route::get('/banners/edit', [AdminController::class, 'edit_banners']);

    //TODO statistical

    Route::get('/statistical', [AdminController::class, 'statistical']);
});
