<?php
namespace App\Http\Controllers\Document;

use App\Services\Document\DeleteDocumentService;

class DeleteDocumentController
{
    public function delete($documentId){
        $deleteDocument = new DeleteDocumentService();
        return $deleteDocument->execute($documentId);
    }
}