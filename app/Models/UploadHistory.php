<?php

// History upload tugas ke google drive

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_name',
        'judul',
        'deskripsi',
        'google_drive_file_id',
        'google_drive_file_link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Unknown',
        ]);
    }
}
