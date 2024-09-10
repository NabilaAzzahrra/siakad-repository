<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_dosen',
        'email',
        'no_hp',
        'password'
    ];

    protected $table = 'dosen';

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'di_dosen');
    }

    public function kelas()
    {
        return $this->hasMany(Dosen::class, 'di_dosen');
    }
}
