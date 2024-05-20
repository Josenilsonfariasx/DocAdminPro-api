<?php
namespace App\Services\Document;

use App\Exceptions\AppError;
use App\Models\Document;

class DeleteDocumentService
{
    public function execute($documentId) {
      $document = Document::find($documentId);
      if(!$document){
        throw new AppError('Document not found', 404);
      }
      $document->delete();
      return response()->json(['message' => 'Document deleted successfully'], 200);
    }
} 