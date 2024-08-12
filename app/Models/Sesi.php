<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'sesi',
        'id_pukul'
    ];

    protected $table = 'sesi';

    public function pukul()
    {
        return $this->belongsTo(Pukul::class, 'id_pukul', 'id');
    }
}
