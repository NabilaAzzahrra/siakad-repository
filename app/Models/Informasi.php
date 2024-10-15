<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'informasi',
        'kategori'
    ];

    protected $table = 'informasi';
}
