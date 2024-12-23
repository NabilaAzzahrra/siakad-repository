<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penguji extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_sidang',
        'nim',
        'id_dosen',
        'id_penguji',
        'tgl_sidang',
        'pukul',
        'id_ruang'
    ];

    protected $table = 'penguji';

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_penguji', 'id');
    }
}
