<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPembimbing extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'id_pembimbing',
        'sikap',
        'intensitas_kesungguhan',
        'kedalaman_materi',
        'verifikasi'
    ];

    protected $table = 'nilai_pembimbing';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_pembimbing', 'id');
    }

    public function appProj()
    {
        return $this->belongsTo(AppProj::class, 'nim', 'nim');
    }
}
