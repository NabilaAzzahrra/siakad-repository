<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalreguler extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sesi',
        'id_detail_kurikulum',
        'id_ruang',
        'id_dosen',
        'id_kelas',
        'id_tahun_akademik',
        'id_kurikulum',
        'id_keterangan',
        'id_perhitungan'
    ];

    protected $table = 'jadwal_reguler';
}
