<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'id_dosen',
        'tanggal',
        'pembahasan',
        'kategori_bimbingan',
        'verifikasi',
    ];

    protected $table = 'bimbingan';
}
