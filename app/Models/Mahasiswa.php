<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity_user',
        'nim',
        'nama',
        'id_kelas',
        'tingkat',
        'no_hp',
        'status',
        'keaktifan',
        'tempat_lahir',
        'tgl_lahir',
        'tahun_angkatan',
    ];

    protected $table = 'mahasiswa';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nim', 'email');
    }

    public function detail()
    {
        return $this->hasMany(DetailFormatif::class, 'nim');
    }

    public function detail_tugas()
    {
        return $this->hasMany(DetailTugas::class, 'nim');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'nim');
    }

    public function detail_uts()
    {
        return $this->hasMany(DetailUts::class, 'id_uts');
    }

}
