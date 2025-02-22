<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'id_pembimbing',
        'id_penguji',
        'file',
        'verifikasi_pembimbing',
        'verifikasi_penguji'
    ];

    protected $table = 'revisi';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function appProj()
    {
        return $this->belongsTo(AppProj::class, 'nim', 'nim');
    }
}
