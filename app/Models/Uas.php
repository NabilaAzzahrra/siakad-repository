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
        'tgl_ujian',
        'waktu_ujian',
        'verifikasi'
    ];

    protected $table = 'uas';
}
