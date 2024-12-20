<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uts extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jadwal',
        'id_uts',
        'file',
        'file_cadangan',
        'tgl_ujian',
        'waktu_ujian',
        'tgl_ujian_susulan',
        'verifikasi'
    ];

    protected $table = 'uts';

    public function jadwal()
    {
        return $this->belongsTo(Jadwalreguler::class, 'id_jadwal', 'id_jadwal');
    }

    public function detail_uts()
    {
        return $this->hasMany(DetailUts::class, 'id_uts');
    }
}
