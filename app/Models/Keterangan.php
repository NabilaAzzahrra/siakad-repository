<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'keterangan'
    ];

    protected $table = 'keterangan';

    public function semester()
    {
        return $this->hasMany(Semester::class, 'id_semester');
    }

    public function konfigurasi()
    {
        return $this->hasMany(Konfigurasi::class, 'id_keterangan');
    }
}
