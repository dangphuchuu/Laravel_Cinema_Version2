<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin Route
require 'admin.php';

// Web Route

Route::get('/', [WebController::class, 'home']);
Route::get('/movie/{id}', [WebController::class, 'movieDetail']);
Route::get('/tickets/{schedule_id}/', [WebController::class, 'ticket']);
Route::get('/schedulesByMovie', [WebController::class, 'schedulesByMovie']);
Route::get('/movies/filter', [WebController::class, 'movieSearch']);
Route::get('/events', [WebController::class, 'events']);
Route::get('/movies', [WebController::class, 'movies']);
Route::post('/tickets/create', [WebController::class, 'ticketPostCreate']);
Route::delete('/tickets/delete', [WebController::class, 'ticketDelete']);
Route::get('/schedulesByMovie', [WebController::class, 'schedulesByMovie']);
Route::get('/schedulesbyTheater', [WebController::class, 'schedulesbyTheater']);
Route::get('/events', [WebController::class, 'events']);
Route::get('/movies', [WebController::class, 'movies']);
Route::get('/movies/filter', [WebController::class, 'movieSearch']);
Route::post('/signIn', [WebController::class, 'signIn']);
Route::post('/signUp', [WebController::class, 'signUp']);
Route::get('/signOut', [WebController::class, 'signOut']);
Route::get('/search', [WebController::class, 'search']);

Route::prefix('/')->middleware('user')->group(function () {
    Route::get('/tickets/{schedule_id}/', [WebController::class, 'ticket']);
    Route::get('/schedulesbyTheater', [WebController::class, 'schedulesbyTheater']);



});
