<?php
namespace App\Http\Controllers\User;

use App\Services\User\UpdateUserService;
use Illuminate\Http\Request;

class UpdateUserController {
  public function update(Request $request, $id){
    $data = $request->only(['name','email']);
    $service = new UpdateUserService();
    return $service->execute($data, $id);
  }
}