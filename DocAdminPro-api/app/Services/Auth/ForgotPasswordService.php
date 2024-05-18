<?php
namespace App\Services\Auth;

use App\Exceptions\AppError;
use App\Mail\password;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordService {
    public function execute(array $data) {
      $user = User::where('email', $data['email'])->first();

      if (!$user) {
        throw new AppError('User not found.', 404);
      }

      $token = \Illuminate\Support\Str::random(60);
      $user->password_reset_token = $token;
      $user->password_reset_token_created_at = now();
      $user->can_reset_password = false;
      $user->save();

      Mail::to($user->email)->send(new password([
        'name' => $user->name,
        'from' => $user->email,
        'code' => $token,
      ]));

      return ['message' => 'Password reset email sent successfully.'];
    }
  }