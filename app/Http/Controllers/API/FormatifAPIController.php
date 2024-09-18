<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Formatif;
use Illuminate\Http\Request;

class FormatifAPIController extends Controller
{
    public function get_all()
    {
        $formatif = Formatif::with(['jadwal','jadwal.sesi','jadwal.sesi.pukul','jadwal.hari','jadwal.ruang','jadwal.dosen','jadwal.kelas','jadwal.kelas','jadwal.tahun_akademik', 'jadwal.detail_kurikulum', 'jadwal.detail_kurikulum.kurikulum', 'jadwal.detail_kurikulum.materi_ajar', 'jadwal.detail_kurikulum.materi_ajar.semester','jadwal.detail_kurikulum.materi_ajar.semester.keterangan'])->get();
        return response()->json([
            'formatif'=>$formatif,
        ]);
    }
}
