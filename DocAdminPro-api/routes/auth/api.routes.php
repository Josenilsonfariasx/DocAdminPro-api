<?php
// Routes

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ConfirmCodeForgotPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordContoller;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;

// ----------POST----------
Route::post('/login',[AuthController::class, 'login']);
Route::post('/password/',[ForgotPasswordContoller::class, 'handle']);
Route::post('/password/confirm',[ConfirmCodeForgotPasswordController::class, 'confirm']);
Route::post('/password/reset',[NewPasswordController::class, 'reset']);