<?php
namespace App\Http\Controllers\Document;

use App\Services\Document\SearchDocumentService;
use Illuminate\Http\Request;

class SearchDocumentController {
  public function handle(Request $request, $id){
    $query = $request->get('query');
    $searchDocumentService = new SearchDocumentService();
    return $searchDocumentService->handle($query, $id);
  }
}