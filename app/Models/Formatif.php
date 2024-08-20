<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formatif extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_formatif',
        'judul_formatif',
        'deadline',
        'id_jadwal',
        'formatif',
    ];

    protected $table = 'formatif';

    public function detail()
    {
        return $this->hasMany(DetailFormatif::class, 'id_formatif');
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwalreguler::class, 'id_jadwal', 'id_jadwal');
    }

}
