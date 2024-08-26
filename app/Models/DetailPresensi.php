<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPresensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_presensi',
        'nim',
        'keterangan'
    ];

    protected $table = 'detail_presensi';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }


    public function presensi()
    {
        return $this->belongsTo(Presensi::class, 'id_presensi', 'id_presensi');
    }
}
