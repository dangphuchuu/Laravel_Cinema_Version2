<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'home']);

    //TODO Movie Genres

    Route::get('/movie_genres', [AdminController::class, 'movie_genres']);
    Route::get('/movie_genres/create', [AdminController::class, 'create_movie_genres']);
    Route::get('/movie_genres/edit', [AdminController::class, 'edit_movie_genres']);

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
});
