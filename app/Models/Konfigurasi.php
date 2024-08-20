<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tahun_akademik',
        'id_keterangan',
        'id_kurikulum',
        'id_perhitungan',
        'jml_pertemuan',
    ];

    protected $table = 'konfigurasi';

    public function tahun_akademik()
    {
        return $this->belongsTo(Tahunakademik::class, 'id_tahun_akademik', 'id');
    }

    public function keterangan()
    {
        return $this->belongsTo(Keterangan::class, 'id_keterangan', 'id');
    }

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class, 'id_kurikulum', 'id');
    }

    public function perhitungan()
    {
        return $this->belongsTo(Perhitungan::class, 'id_perhitungan', 'id');
    }
}
