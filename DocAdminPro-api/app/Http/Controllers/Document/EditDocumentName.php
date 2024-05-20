<?php
namespace App\Http\Controllers\Document;

use App\Services\Document\UpdateDocumentMetadataService;
use Illuminate\Http\Request;

class EditDocumentName {
  public function rename(Request $request, $id){
    $updateDocumentMetadataService = new UpdateDocumentMetadataService();
    return $updateDocumentMetadataService->execute($request->all(), $id);
  }
}