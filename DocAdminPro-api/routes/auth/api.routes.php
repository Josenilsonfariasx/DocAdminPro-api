<?php
// Routes

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// ----------POST----------
Route::post('/login',[AuthController::class, 'login']);