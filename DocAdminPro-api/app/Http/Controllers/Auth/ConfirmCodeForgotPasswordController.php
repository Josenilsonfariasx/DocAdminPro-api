<?php
namespace App\Http\Controllers\Auth;

use App\Services\Auth\ConfirmCodeForgotPasswordService;
use Illuminate\Http\Request;

class ConfirmCodeForgotPasswordController {
  public function confirm(Request $request) {
    $data = $request->all();
    $confirmCodeForgotPasswordService = new ConfirmCodeForgotPasswordService();
    return $confirmCodeForgotPasswordService->execute($data);
  }
}