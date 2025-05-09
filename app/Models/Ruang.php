<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruang'
    ];

    protected $table = 'ruang';

    public function jadwal_reguler()
    {
        return $this->hasMany(Jadwalreguler::class, 'id_ruang');
    }
    public function penguji()
    {
        return $this->hasMany(Penguji::class, 'id_ruang');
    }
}
