<?php
namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Services\Document\CreateDocumentService;
use Illuminate\Http\Request;

class CreateDocumentController extends Controller{
    public function save(Request $request, $id){
    $file = $request->file('pdf');
    $destinationPath = 'pdfs';
    $fileName = $file->getClientOriginalName();
    $fileSize = $file->getSize();

    $file->storeAs($destinationPath, $fileName);

    $data = [
      'pdf' => $file,
      'type' => 'pdf',
      'file_name' => $fileName,
      'path_name' => $destinationPath . '/' . $fileName,
      'size' => $fileSize,
    ];

    $createDocumentService = new CreateDocumentService();
    return $createDocumentService->execute($data, $id);

    }
}