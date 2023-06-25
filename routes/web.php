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

Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'vi'])) {
        abort('404');
    }
    session()->put('locale', $locale);
    return redirect()->back();
});

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

Route::get('/schedulesByTheater', [WebController::class, 'schedulesByTheater']);
Route::get('/schedulesByMovie', [WebController::class, 'schedulesByMovie']);

Route::get('/events', [WebController::class, 'events']);
Route::get('/news', [WebController::class, 'news']);
Route::get('/', [WebController::class, 'home']);

Route::post('/forgot_password',[WebController::class,'forgot_password']);
Route::get('/update-password',[WebController::class,'update_password']);
Route::post('/update-password',[WebController::class,'Post_update_password']);
Route::get('/verify-email',[WebController::class,'verify_email']);

Route::get('/events-detail/{id}',[WebController::class,'events_detail']);
Route::get('/news-detail/{id}',[WebController::class,'news_detail']);

Route::prefix('/')->middleware('user')->group(function () {
    Route::get('/tickets/{schedule_id}', [WebController::class, 'ticket']);
    Route::get('/profile',[WebController::class,'profile']);
    Route::post('/editProfile',[WebController::class,'editProfile']);
    Route::post('/changePassword',[WebController::class,'changePassword']);
    Route::get('/tickets/completed/{id}', [WebController::class, 'ticketCompleted']);
    Route::post('/ticketPaid/image',[WebController::class,'ticketPaid_image']);
    Route::post('/refund-ticket',[WebController::class,'refund_ticket']);
    Route::post('/feedback',[WebController::class,'feedback']);
    Route::get('/contact',[WebController::class,'contact']);
    Route::get('/ticket_discount',[WebController::class,'ticket_apply_discount']);
});
