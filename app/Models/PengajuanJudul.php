<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanJudul extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'judul',
        'verifikasi'
    ];

    protected $table = 'pengajuan_judul';
}
