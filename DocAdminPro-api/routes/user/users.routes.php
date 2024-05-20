<?php
// Routes

use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\DeleteUserController;
use App\Http\Controllers\User\GetAllDocsByUserController;
use App\Http\Controllers\User\GetUserByIdController;
use App\Http\Controllers\User\ListAllUsersController;
use App\Http\Controllers\User\NumberAllUserSystemController;
use App\Http\Controllers\User\UpdateUserController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\Facades\Route;

// ----------POST------------------
Route::post('/create',[CreateUserController::class,'create']);
Route::get('/',[ListAllUsersController::class,'listAll']);


// ----------Middleware------------------------------------------------------------
Route::middleware([JwtMiddleware::class])->group(function(){
  // ----------PUT-----------------
  Route::put('/{id}',[UpdateUserController::class,'update']);
  // ----------DELETE--------------
  Route::delete('/{id}',[DeleteUserController::class,'delete']);

// ----------Filters---------------
  Route::group([
      'prefix' => 'filter',
    ], function(){
      Route::get('/docs/{id}', [GetAllDocsByUserController::class,'handle']);
      Route::get('/employees/count',[NumberAllUserSystemController::class,'numberUser']); 
      Route::get('/{id}',[GetUserByIdController::class,'get']);
    });
});