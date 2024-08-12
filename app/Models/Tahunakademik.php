<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahunakademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahunakademik'
    ];

    protected $table = 'tahunakademik';

    public function konfigurasi()
    {
        return $this->hasMany(Konfigurasi::class, 'id_tahun_akademik');
    }
}
