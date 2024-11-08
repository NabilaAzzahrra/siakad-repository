<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfigurasiUjian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tahun_akademik',
        'id_keterangan',
        'jenis_ujian',
        'tgl_mulai',
        'tgl_susulan'
    ];

    protected $table = 'konfigurasi_ujian';

    public function tahun_akademik()
    {
        return $this->belongsTo(Tahunakademik::class, 'id_tahun_akademik', 'id');
    }

    public function keterangan()
    {
        return $this->belongsTo(Keterangan::class, 'id_keterangan', 'id');
    }
}
