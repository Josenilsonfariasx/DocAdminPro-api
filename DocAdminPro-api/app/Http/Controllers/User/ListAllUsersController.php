<?php
namespace App\Http\Controllers\User;

use App\Models\User;

class ListAllUsersController {
  public function listAll(){
    return response()->json(User::all());
  }
}