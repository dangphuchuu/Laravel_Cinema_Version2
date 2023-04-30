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
});
