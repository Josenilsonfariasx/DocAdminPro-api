<?php
// Routes

use App\Http\Controllers\User\CreateUserController;
use Illuminate\Support\Facades\Route;

// ----------POST----------
Route::post('/users',[CreateUserController::class,'create']);