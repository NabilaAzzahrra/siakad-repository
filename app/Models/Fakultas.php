<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $fillable = [
        'fakultas',
    ];

    protected $table = 'fakultas';

    public function jurusan()
    {
        return $this->hasMany(Jurusan::class, 'id_fakultas');
    }
}
