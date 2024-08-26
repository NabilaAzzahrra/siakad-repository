<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_uas',
        'nim',
        'file',
        'tgl_pengumpulan',
    ];

    protected $table = 'detail_uas';
}
