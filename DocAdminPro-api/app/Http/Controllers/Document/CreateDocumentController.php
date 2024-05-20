<?php
namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Services\Document\CreateDocumentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreateDocumentController extends Controller{
  public function save(Request $request, $id){
      $file = $request->file('pdf');
      $destinationPath = 'pdfs';
      $fileName = $file->getClientOriginalName();
      $fileSize = $file->getSize();

      // Verificar se o arquivo já existe
      if (Storage::exists($destinationPath . '/' . $fileName)) {
        $rename = true;
          // Lançar um erro
          // return response()->json(['error' => 'Um arquivo com este nome já existe'], 400);

          // Ou renomear o arquivo
          $fileName = time() . '_' . $fileName;
      }

      $file->storeAs($destinationPath, $fileName);

      $data = [
        'rename' => $rename ? $rename : false,
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