<?php
// Routes

use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\UpdateUserController;
use Illuminate\Support\Facades\Route;

// ----------POST----------
Route::post('/',[CreateUserController::class,'create']);
Route::put('/{id}',[UpdateUserController::class,'update']);