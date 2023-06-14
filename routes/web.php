<?php

use App\Http\Controllers\PaymentController;
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

Route::get('/tickets/completed/{id}', [WebController::class, 'ticketCompleted']);

Route::get('/tickets/payment/result', [PaymentController::class, 'handleResult']);
Route::post('/tickets/payment/create', [PaymentController::class, 'create']);
Route::post('/tickets/payment', [WebController::class, 'ticketPayment']);

Route::post('/tickets/create', [WebController::class, 'ticketPostCreate']);
Route::delete('/tickets/delete', [WebController::class, 'ticketDelete']);
Route::post('/tickets/combo/create', [WebController::class, 'ticketComboCreate']);
Route::delete('/tickets/combo/delete', [WebController::class, 'ticketComboDelete']);
Route::get('/tickets/{schedule_id}/', [WebController::class, 'ticket']);


Route::post('/signIn', [WebController::class, 'signIn']);
Route::post('/signUp', [WebController::class, 'signUp']);
Route::get('/signOut', [WebController::class, 'signOut']);

Route::get('/movies/filter', [WebController::class, 'movieFilter']);
Route::get('/search', [WebController::class, 'search']);

Route::get('/movie/{id}', [WebController::class, 'movieDetail']);
Route::get('/movies', [WebController::class, 'movies']);

Route::get('/schedulesByMovie', [WebController::class, 'schedulesByMovie']);
Route::get('/schedulesbyTheater', [WebController::class, 'schedulesbyTheater']);
Route::get('/schedulesByMovie', [WebController::class, 'schedulesByMovie']);

Route::get('/events', [WebController::class, 'events']);

Route::get('/', [WebController::class, 'home']);

Route::prefix('/')->middleware('user')->group(function () {
    Route::get('/tickets/{schedule_id}/', [WebController::class, 'ticket']);
    Route::post('/vnpay', [PaymentController::class, 'vnpay']);
    Route::get('/profile',[WebController::class,'profile']);
    Route::post('/editProfile',[WebController::class,'editProfile']);
});
