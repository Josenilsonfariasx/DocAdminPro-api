<?php
namespace App\Http\Controllers\User;

use App\Services\User\NumberAllUserInSystemService;

class NumberAllUserSystemController {
  public function numberUser(){
    $number = new NumberAllUserInSystemService();
    return $number->get();
  }
}