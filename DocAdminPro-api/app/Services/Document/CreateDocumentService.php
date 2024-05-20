<?php
namespace App\Services\Document;

use App\Exceptions\AppError;
use App\Models\Document;
use App\Models\User;
use App\Jobs\ProcessDocumentJob;
use Illuminate\Queue\Events\JobQueued;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Queue;

class CreateDocumentService {
    public function execute(array $data,string $id) {
      $userFound = User::find($id);
      if(!$userFound) {
        throw new AppError('User not found', 404);
      }

      // Validação do arquivo PDF
      if (!isset($data['pdf']) || $data['pdf']->getClientOriginalExtension() != 'pdf') {
        throw new AppError('Invalid file. Please upload a PDF.', 400);
      }
    
      $sizeInMB = round($data['size'] / 1048576, 1);
      $filePath = storage_path('app/' . $data['path_name']);
      if ($userFound->space_used + $sizeInMB > 2048) {
        unlink($filePath);
        throw new AppError('Storage limit exceeded. Each user can only use up to 2GB of storage.', 400);
      }
      // Criar um novo documento
      $document = Document::create([
        'user_id' => $id,
        'type' => $data['type'],
        'file_path' => $data['path_name'],
        'file_name' => $data['file_name'],
        'size' => $sizeInMB,
        'content' => '',
        'status' => 'pending'
      ]);

      User::where('id', $id)->update([
        'space_used' => $userFound->space_used + $sizeInMB
      ]);

      // Colocar o job na fila com o caminho do arquivo
      dispatch(new ProcessDocumentJob($document->id));
      $dataObj = [
        'document'=>$document,
        'rename' => $data['rename']
      ];
      return $dataObj;
    }
}