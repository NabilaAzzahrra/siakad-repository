<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tugas',
        'id_presensi',
        'deadline',
        'file_tugas'
    ];

    protected $table = 'tugas';

    public function detail_tugas()
    {
        return $this->hasMany(DetailTugas::class, 'id_tugas');
    }

    public function presensi()
    {
        return $this->belongsTo(Presensi::class, 'id_presensi', 'id_presensi');
    }

}
