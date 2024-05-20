<?php


use App\Http\Controllers\Document\CreateDocumentController;
use App\Http\Controllers\Document\DeleteDocumentController;
use App\Http\Controllers\Document\EditDocumentName;
use Illuminate\Support\Facades\Route;

Route::post('/save/{id}',[CreateDocumentController::class,'save']);
Route::delete('/delete/{id}',[DeleteDocumentController::class,'delete']);
Route::put('/edit/{id}', [EditDocumentName::class, 'rename']);