<?php
namespace App\Services\Auth;

use App\Exceptions\AppError;
use App\Models\User;

class NewPasswordService {
    public function execute(array $data) {
        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            throw new AppError('User not found.', 404);
        }

        if (!$user->can_reset_password) {
            throw new AppError('Request a new code.', 401);
        }

        // Atribui a nova senha em texto simples
        $user->password = $data['password'];
        $user->update([
            'password' => $data['password'],
            'password_reset_token' => null,
            'password_reset_token_created_at' => null,
            'can_reset_password' => false,
        ]);
        return ['message' => 'Password reset successfully.'];
    }
}
