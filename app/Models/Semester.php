<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester',
        'id_keterangan'
    ];

    protected $table = 'semester';

    public function keterangan()
    {
        return $this->belongsTo(Keterangan::class, 'id_keterangan', 'id');
    }

    public function materiajar()
    {
        return $this->hasMany(Materiajar::class, 'id_semester');
    }
}
