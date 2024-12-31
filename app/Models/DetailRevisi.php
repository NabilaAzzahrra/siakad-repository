<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRevisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_sidang',
        'nim',
        'bab_satu',
        'bab_dua',
        'bab_tiga',
        'bab_empat',
        'bab_lima',
    ];

    protected $table = 'detail_revisi';
}
