<?php
namespace  App\Services\User;

use App\Exceptions\AppError;
use App\Models\User;
class GetUserByIdService {
  public function get($id){
    $user = User::find($id);
    if(!$user){
      throw new AppError('User not found', 404);
    }
    return $user;
  }
}