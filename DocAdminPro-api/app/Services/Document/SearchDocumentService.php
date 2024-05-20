<?php 
namespace App\Services\Document;

use App\Models\Document;

class SearchDocumentService {
  public function handle($query, $userId){
    $documents = Document::where('user_id', $userId)
        ->where(function ($q) use ($query) {
            $q->where('file_name', 'LIKE', "%$query%")
              ->orWhere('content', 'LIKE', "%$query%");
        })
        ->get();

    return $documents;
  }
}