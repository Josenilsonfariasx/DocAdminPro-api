<?php
namespace App\Services\User;

use App\Exceptions\AppError;
use App\Models\User;

class DeleteUserService {
  public function delete($id){
    $user = User::find($id);
    if(!$user){
      throw new AppError('User not found', 404);
    }
    $user->delete();
    return $user
    ;
  }
}