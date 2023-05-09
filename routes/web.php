<?php

use App\Http\Controllers\AdminController;
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
Route::get('/tickets/{movie_id}/', [WebController::class, 'ticket']);
Route::post('/signIn', [WebController::class, 'signIn']);
Route::get('/signOut', [WebController::class, 'signOut']);
