<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailkurikulum extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kurikulum',
        'id_materi_ajar'
    ];

    protected $table = 'detail_kurikulum';

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class, 'id_kurikulum', 'id');
    }

    public function materi_ajar()
    {
        return $this->belongsTo(Materiajar::class, 'id_materi_ajar', 'id');
    }

    public function jadwal_reguler()
    {
        return $this->hasMany(Jadwalreguler::class, 'id_detail_kurikulum');
    }
}
