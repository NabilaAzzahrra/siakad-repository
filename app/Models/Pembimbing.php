<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'id_dosen',
        'verifikasi',
    ];

    protected $table = 'pembimbing';

    public function pembimbingProjek()
    {
        return $this->belongsTo(PembimbingProject::class, 'id_dosen', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

}
