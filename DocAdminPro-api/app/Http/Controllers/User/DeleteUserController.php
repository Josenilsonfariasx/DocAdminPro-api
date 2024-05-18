<?php
namespace App\Http\Controllers\User;

use App\Services\User\DeleteUserService;

class DeleteUserController {
  public function delete($id){
    $deleteUserService = new DeleteUserService();
    return $deleteUserService->delete($id);
  }
}