<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Document extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'filename',
        'file_path',
        'size',
        'user_id',
        'type',
        'content',
        'ocr_status'
    ];
}
