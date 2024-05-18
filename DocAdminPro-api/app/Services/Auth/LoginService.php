<?php
namespace App\Services\Auth;

use App\Exceptions\AppError;
use Illuminate\Support\Facades\Log;
class LoginService {
  public function execute(array $data){
    Log::debug('Service login');

    if(!$token = auth()->attempt($data)){
      throw new AppError('Not authorized.', 401);
    }
    return $this->responseToken($token);
  }
  private function responseToken($token) {
    return response()->json([
        'token'=> $token,
        'user'=> auth()->user()
    ]);
  }
}