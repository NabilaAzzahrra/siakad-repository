<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUts extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_uts',
        'nim',
        'file',
        'kategori',
        'tgl_pengumpulan',
    ];

    protected $table = 'detail_uts';

    public function uts()
    {
        return $this->belongsTo(Uts::class, 'id_uts', 'id_uts');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}
