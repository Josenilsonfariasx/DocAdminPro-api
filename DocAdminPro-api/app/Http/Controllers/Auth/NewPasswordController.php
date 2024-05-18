<?php 
namespace App\Http\Controllers\Auth;

use App\Services\Auth\NewPasswordService;
use Illuminate\Http\Request;

class NewPasswordController {
  public function reset(Request $request) {
    $data = $request->all();
    $service = new NewPasswordService();
    return $response = $service->execute($data);
  }
}