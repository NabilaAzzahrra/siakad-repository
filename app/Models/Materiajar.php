<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiajar extends Model
{
    use HasFactory;

    protected $fillable = [
        'materi_ajar',
        'sks',
        'id_semester',
        'ebook',
        'id_jurusan'
    ];

    protected $table = 'materi_ajar';

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester', 'id');
    }

    public function detail()
    {
        return $this->hasMany(Detailkurikulum::class, 'id_materi_ajar');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }
}
