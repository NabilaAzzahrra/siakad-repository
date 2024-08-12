<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pukul extends Model
{
    use HasFactory;

    protected $fillable = [
        'pukul'
    ];

    protected $table = 'pukul';

    public function sesi()
    {
        return $this->hasMany(Sesi::class, 'id_pukul');
    }
}
