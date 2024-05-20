<?php

namespace App\Services\User;
use App\Exceptions\AppError;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class GetAllDocsByUserService {
  public function execute (String $user_id){
    $user = User::find($user_id);
    if(!$user) throw new AppError('user not found.', 404);
    if(!$user_id) throw new AppError('Missing user_id.', 400);

    $documents = Document::where('user_id', $user_id)
      ->select(['id','file_name','file_path','size','type','ocr_status','created_at','updated_at'])
      ->get();

    $response = [
        'documents' => $documents,
        'count' => $documents->count(),
    ];

    return $response;
  }
}