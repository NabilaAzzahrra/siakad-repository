<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_dosen',
        'nama_dosen',
        'email',
        'no_hp',
        'password',
        'tgl_lahir',
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

    public function pembimbingProj()
    {
        return $this->hasMany(PembimbingProject::class, 'id_dosen');
    }
    public function appProj()
    {
        return $this->hasMany(AppProj::class, 'id_dosen');
    }

    public function penguji()
    {
        return $this->hasMany(Penguji::class, 'id_penguji');
    }
    public function pembimbing()
    {
        return $this->hasMany(Penguji::class, 'id_dosen');
    }

    public function verifikasiPembimbing()
    {
        return $this->hasMany(NilaiPembimbing::class, 'id_pembimbing');
    }
}
