<?php
namespace App\Services\User;

use App\Exceptions\AppError;
use App\Models\User;
class CreateUserService {
  public function execute(array $data){

    $emailFound = User::firstWhere('email', $data['email']);
    if(!is_null($emailFound)){
      throw new AppError('There is already a person with this email.',400);
    }
    return User::create($data);
  }
}