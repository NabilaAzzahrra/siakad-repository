<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_presensi',
        'id_jadwal',
        'pertemuan',
        'materi',
        'file_materi',
        'tgl_presensi'
    ];

    protected $table = 'presensi';

    public function jadwal()
    {
        return $this->belongsTo(Jadwalreguler::class, 'id_jadwal', 'id_jadwal');
    }
}
