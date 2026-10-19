<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'kategori',
        'lokasi',
        'waktu_kejadian',
        'terlapor',
        'isi_laporan',
        'status',
    ];

    protected $casts = [
        'waktu_kejadian' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

