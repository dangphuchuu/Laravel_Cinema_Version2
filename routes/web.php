<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

require 'admin.php';

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'home']);
});
