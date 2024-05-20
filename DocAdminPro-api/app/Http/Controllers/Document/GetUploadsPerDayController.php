<?php
namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Services\Document\GetUploadsPerDayService;
use Illuminate\Http\Request;

class GetUploadsPerDayController extends Controller
{
    public function handle($userId){
        $uploadsPerDay = new GetUploadsPerDayService();
        return $uploadsPerDay->execute($userId);
    }
} 