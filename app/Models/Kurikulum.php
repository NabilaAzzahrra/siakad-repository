<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $fillable = [
        'kurikulum',
        'tahun'
    ];

    protected $table = 'kurikulum';

    public function detail()
    {
        return $this->hasMany(Detailkurikulum::class, 'id_kurikulum');
    }

    public function konfigurasi()
    {
        return $this->hasMany(Konfigurasi::class, 'id_kurikulum');
    }
}
