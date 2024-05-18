<?php
namespace App\Services\User;

use App\Models\User;

class NumberAllUserInSystemService {
  public function get(){
    $count = User::count();
    $data = [
      'message' => 'Number of all user in system',
      'number' => $count
    ];
    return $data;
  }
} 