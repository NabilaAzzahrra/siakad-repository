<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jadwal',
        'id_uas',
        'file',
        'file_cadangan',
        'tgl_ujian',
        'waktu_ujian',
        'tgl_ujian_susulan',
        'verifikasi'
    ];

    protected $table = 'uas';

    public function jadwal()
    {
        return $this->belongsTo(Jadwalreguler::class, 'id_jadwal', 'id_jadwal');
    }

    public function detail_uas()
    {
        return $this->hasMany(DetailUas::class, 'id_uas');
    }
}
