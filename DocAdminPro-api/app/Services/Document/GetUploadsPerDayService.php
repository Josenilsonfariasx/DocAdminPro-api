<?php

namespace App\Services\Document;

use App\Models\Document;

use Illuminate\Support\Facades\DB;

class GetUploadsPerDayService {
  public function execute ($userId){
    $uploadsPerDay = Document::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
        ->where('user_id', $userId)
        ->groupBy('date')
        ->get();

    return $uploadsPerDay;
  }
}
