<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dosen',
    ];

    protected $table = 'pembimbing_project';

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }
}
