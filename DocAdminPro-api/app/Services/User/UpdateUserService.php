<?php
namespace App\Services\User;

use App\Exceptions\AppError;
use App\Models\User;

class UpdateUserService {
  public function execute(array $data, $id){
    $user = User::find($id);
    if(is_null($user)){
      throw new AppError('User not found.',404);
    }
    // atualizar os campos que foram enviados como name ou email
    if(isset($data['name'])){
      $user->name = $data['name'];
    }
    if(isset($data['email'])){
      $emailFound = User::firstWhere('email', $data['email']);
      if(!is_null($emailFound)){
        throw new AppError('There is already a person with this email.',400);
      }
      $user->email = $data['email'];
    }
    $user->save();
    return $user;
  }
}