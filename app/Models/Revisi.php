<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'file',
        'verifikasi'
    ];

    protected $table = 'revisi';
}
