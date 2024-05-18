<?php
namespace App\Services\Auth;

use App\Exceptions\AppError;
use App\Models\User;

class ConfirmCodeForgotPasswordService {

    public function execute(array $data) {
      $user = User::where('email', $data['email'])->first();

      if (!$user) {
        throw new AppError('User not found.', 404);
      }

      if ($user->password_reset_token !== $data['code']) {
        throw new AppError('Invalid code.', 401);
      }

      // Converte password_reset_token_created_at para Carbon
      $tokenCreatedAt = \Carbon\Carbon::parse($user->password_reset_token_created_at);

      // Verifica se o código expirou
      if($tokenCreatedAt->diffInMinutes(now()) > 30) {
        // Apaga o código de redefinição de senha e a data de criação
        $user->password_reset_token = null;
        $user->password_reset_token_created_at = null;
        $user->save();

        throw new AppError('Code expired.', 401);
      }

      // Apaga o código de redefinição de senha e permite a redefinição de senha
      $user->password_reset_token = null;
      $user->password_reset_token_created_at = null;
      $user->can_reset_password = true;
      $user->save();

      return ['message' => 'Code confirmed successfully.'];
    }
}