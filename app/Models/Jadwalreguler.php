<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalreguler extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jadwal',
        'id_hari',
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

    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'id_sesi', 'id');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang', 'id');
    }

    public function detail_kurikulum()
    {
        return $this->belongsTo(Detailkurikulum::class, 'id_detail_kurikulum', 'id_materi_ajar');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function hari()
    {
        return $this->belongsTo(Hari::class, 'id_hari', 'id');
    }

    public function formatif()
    {
        return $this->belongsTo(Hari::class, 'id_formatif', 'id_formatif');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_jadwal');
    }

    public function tahun_akademik()
    {
        return $this->belongsTo(Tahunakademik::class, 'id_tahun_akademik', 'id');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_jadwal');
    }

    public function uts()
    {
        return $this->hasMany(Uts::class, 'id_jadwal');
    }

    public function perhitungan()
    {
        return $this->belongsTo(Perhitungan::class, 'id_perhitungan', 'id');
    }
}
