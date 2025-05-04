<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranskripCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'no_mahasiswa',
        'no_transkrip',
        'id_kelas'
    ];

    protected $table = 'transkrip_code';
}
