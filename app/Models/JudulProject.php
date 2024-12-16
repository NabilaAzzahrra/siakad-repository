<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JudulProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'judul'
    ];

    protected $table = 'pengajuan_judul';
}
