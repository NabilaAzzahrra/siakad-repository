<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppProj extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'judul',
        'file',
        'verifikasi',
    ];

    protected $table = 'app_proj';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}
