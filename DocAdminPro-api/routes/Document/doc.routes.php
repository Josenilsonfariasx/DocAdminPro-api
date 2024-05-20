<?php

use App\Http\Controllers\Document\CreateDocumentController;
use Illuminate\Support\Facades\Route;

Route::post('/save/{id}',[CreateDocumentController::class,'save']);