<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPenguji extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'id_penguji',
        'penampilan',
        'bahasa_asing',
        'bahasa_indonesia',
        'metoda_penelitian',
        'teknik_presentasi',
        'penguasaan_teori',
        'verifikasi'
    ];

    protected $table = 'nilai_penguji';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_penguji', 'id');
    }

    public function appProj()
    {
        return $this->belongsTo(AppProj::class, 'nim', 'nim');
    }
}
