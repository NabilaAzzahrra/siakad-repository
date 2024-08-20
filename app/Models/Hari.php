<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;

    protected $fillable = [
        'hari'
    ];

    protected $table = 'hari';

    public function jadwal_reguler()
    {
        return $this->hasMany(Jadwalreguler::class, 'id_hari');
    }
}
