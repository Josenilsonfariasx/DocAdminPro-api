<?php


use App\Http\Controllers\Document\CreateDocumentController;
use App\Http\Controllers\Document\DeleteDocumentController;
use Illuminate\Support\Facades\Route;

Route::post('/save/{id}',[CreateDocumentController::class,'save']);
Route::delete('/delete/{id}',[DeleteDocumentController::class,'delete']);