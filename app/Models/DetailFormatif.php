<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailFormatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_formatif',
        'nim',
        'jawaban',
        'tgl_pengumpulan'
    ];

    protected $table = 'detail_formatif';

    public function formatif()
    {
        return $this->belongsTo(Formatif::class, 'id_formatif', 'id_formatif');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}
