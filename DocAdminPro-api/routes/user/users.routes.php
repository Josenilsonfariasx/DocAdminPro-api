<?php
// Routes

use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\DeleteUserController;
use App\Http\Controllers\User\GetUserByIdController;
use App\Http\Controllers\User\ListAllUsersController;
use App\Http\Controllers\User\UpdateUserController;
use Illuminate\Support\Facades\Route;

// ----------POST-----------
Route::post('/create',[CreateUserController::class,'create']);
// ----------PUT------------
Route::put('/{id}',[UpdateUserController::class,'update']);
// ----------DELETE----------
Route::delete('/{id}',[DeleteUserController::class,'delete']);
// ----------GET-------------
Route::get('/',[ListAllUsersController::class,'listAll']);
// ----------Filters---------
Route::get('/filter/{id}',[GetUserByIdController::class,'get']);