<?php
namespace App\Http\Controllers\Auth;
use App\Services\Auth\ForgotPasswordService;
use Illuminate\Http\Request;

class ForgotPasswordContoller {
  public function handle(Request $request) {
    $data = $request->all();
    $forgotPasswordService = new ForgotPasswordService();
    return $forgotPasswordService->execute($data);
  }
}