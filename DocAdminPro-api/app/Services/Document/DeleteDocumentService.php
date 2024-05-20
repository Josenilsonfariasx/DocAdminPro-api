<?php
namespace App\Services\Document;

use App\Exceptions\AppError;
use App\Models\Document;
use App\Models\User;

class DeleteDocumentService
{
    public function execute($documentId) {
      $document = Document::find($documentId);
      if(!$document){
        throw new AppError('Document not found', 404);
      }

      // Deletar o arquivo físico
      $filePath = storage_path('app/' . $document->file_path);
      if (!file_exists($filePath)) {
        throw new AppError('File not found', 404);
      }

      unlink($filePath);

      // Diminuir a quantidade de armazenamento usado pelo usuário
      $user = User::find($document->user_id);
      $value = $user['space_used'] - $document['size'];
      $user->space_used = $value;
      $user->save();

      $document->delete();
      return response()->json(['message' => 'Document deleted successfully'], 200);
    }
} 