<?php
  namespace App\Http\Controllers\User;
  use App\Http\Controllers\Controller;
  use App\Http\Requests\CreateUserRequest;
  use App\Services\User\CreateUserService;

  class CreateUserController extends Controller {
    public function create(CreateUserRequest $request){
      $createUserService = new CreateUserService();
      return $createUserService->execute($request->all());
    }
  }
