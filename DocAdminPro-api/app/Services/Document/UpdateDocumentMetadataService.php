<?php

namespace App\Services\Document;

use App\Exceptions\AppError;
use App\Models\Document;

class UpdateDocumentMetadataService
{
  public function execute($data, $id) {
    $doc = Document::find($id);
    if(!$doc){
      throw new AppError('File not found.', 404);
    }
    $relativePath = $doc->file_path;
    $pdfPath = storage_path('app/' . $relativePath);

    // Renomear o arquivo
    $newName = $data['new_name'];
    $directory = dirname($relativePath);
    $newPath = storage_path('app/' . $directory . '/' . $newName . '.pdf');
    if (rename($pdfPath, $newPath)) {
      // Atualizar o caminho do arquivo no banco de dados
      $doc->file_path = $directory . '/' . $newName . '.pdf';
      $doc->file_name = $newName . '.pdf';
      $doc->save();
    } else {
      throw new \Exception('Failed to rename file');
    }
  }
}