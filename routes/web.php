<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StaffController;
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
Route::get('/payment/result', [PaymentController::class, 'handleResult']);
Route::post('/payment/create', [PaymentController::class, 'create']);
Route::post('/payment', [WebController::class, 'ticketPayment']);

Route::post('/tickets/combo/create', [WebController::class, 'ticketComboCreate']);
Route::delete('/tickets/combo/delete', [WebController::class, 'ticketComboDelete']);
Route::post('/tickets/create', [WebController::class, 'ticketPostCreate']);
Route::delete('/tickets/delete', [WebController::class, 'ticketDelete']);


Route::post('/signIn', [WebController::class, 'signIn']);
Route::post('/signUp', [WebController::class, 'signUp']);
Route::get('/signOut', [WebController::class, 'signOut']);

Route::get('/movies/filter', [WebController::class, 'movieFilter']);
Route::get('/search', [WebController::class, 'search']);

Route::get('/movie/{id}', [WebController::class, 'movieDetail']);
Route::get('/movies', [WebController::class, 'movies']);

Route::get('/schedulesByMovie', [WebController::class, 'schedulesByMovie']);
Route::get('/schedulesByTheater', [WebController::class, 'schedulesByTheater']);
Route::get('/schedulesByMovie', [WebController::class, 'schedulesByMovie']);

Route::get('/events', [WebController::class, 'events']);

Route::get('/staff', [StaffController::class, 'index']);
Route::get('/', [WebController::class, 'home']);


Route::get('/forgot_password',[WebController::class,'forgot_password']);
Route::post('/forgot_password',[WebController::class,'forgot_password']);
Route::get('/contact',[WebController::class,'contact']);
Route::prefix('/')->middleware('user')->group(function () {
    Route::get('/tickets/{schedule_id}', [WebController::class, 'ticket']);
    Route::get('/profile',[WebController::class,'profile']);
    Route::post('/editProfile',[WebController::class,'editProfile']);
    Route::post('/changePassword',[WebController::class,'changePassword']);
    Route::get('/tickets/completed/{id}', [WebController::class, 'ticketCompleted']);
});
