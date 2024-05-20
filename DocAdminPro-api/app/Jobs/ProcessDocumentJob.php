<?php

namespace App\Jobs;

use App\Models\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Spatie\PdfToImage\Pdf;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ProcessDocumentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
      $doc = Document::find($this->id);

      // Use diretamente o caminho do arquivo
      $relativePath = $doc->file_path;
      $pdfPath = storage_path('app/' . $relativePath);
      $pdf = new Pdf($pdfPath);

      $totalPages = $pdf->getNumberOfPages(); // Obter o número total de páginas

      $content = '';

      // Loop através de cada página e convertê-la em uma imagem
      for ($i = 1; $i <= $totalPages; $i++) {
        $imgPath = storage_path('app/pdfs-to-image' . $relativePath . '_' . $i . '.jpg');
        $pdf->setPage($i)->saveImage($imgPath);

        // Realizar OCR na imagem
        $text = (new TesseractOCR($imgPath))->run();
        $content .= $text;
        // apagar a imagem
        unlink($imgPath);
      }

      // Remover acentos e converter para minúsculas
      $content = iconv('UTF-8', 'ASCII//TRANSLIT', $content);
      $content = mb_strtolower($content);

      // Salvar o conteúdo OCR no documento
      $docUpdated = Document::where('id', $this->id)->update([
        'content' => $content,
        'ocr_status' => 'processed',
      ]);
    }
}