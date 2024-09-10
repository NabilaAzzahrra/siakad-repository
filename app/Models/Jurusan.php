<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jurusan'
    ];

    protected $table = 'jurusan';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_jurusan', 'id');
    }

    public function materi_ajar()
    {
        return $this->hasMany(Materiajar::class, 'id_jurusan');
    }
}
