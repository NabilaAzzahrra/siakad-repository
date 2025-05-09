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

    public function penguji()
    {
        return $this->belongsTo(Dosen::class, 'id_penguji', 'id');
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang', 'id');
    }
    public function pembimbing()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function appProj()
    {
        return $this->belongsTo(AppProj::class, 'nim', 'nim');
    }
}
