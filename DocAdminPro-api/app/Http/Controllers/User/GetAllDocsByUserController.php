<?php 

namespace App\Http\Controllers\User;
use App\Services\User\GetAllDocsByUserService;
use Illuminate\Http\Request;
class GetAllDocsByUserController {
  public function handle ($id){
    $getAllDocsByUserService = new GetAllDocsByUserService();
    return $getAllDocsByUserService->execute($id);
  }
}