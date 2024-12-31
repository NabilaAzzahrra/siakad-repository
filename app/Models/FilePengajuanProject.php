<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePengajuanProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'file'
    ];

    protected $table = 'file_pengajuan_project';
}
