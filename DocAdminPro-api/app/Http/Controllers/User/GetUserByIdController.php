<?php 
namespace App\Http\Controllers\User;

use App\Services\User\GetUserByIdService;

class GetUserByIdController {
  public function get($id){
    $getUserByIdService = new GetUserByIdService();
    return $getUserByIdService->get($id);
  }
}