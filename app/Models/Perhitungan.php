<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perhitungan',
        'presensi',
        'tugas',
        'formatif',
        'uas',
        'uts'
    ];

    protected $table = 'perhitungan';

    public function konfigurasi()
    {
        return $this->hasMany(Konfigurasi::class, 'id_perhitungan');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwalreguler::class, 'id_perhitungan');
    }
}
