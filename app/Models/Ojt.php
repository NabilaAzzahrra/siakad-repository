<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ojt extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'id_kelas',
        'nilai',
    ];
    protected $table = 'ojt';
}
