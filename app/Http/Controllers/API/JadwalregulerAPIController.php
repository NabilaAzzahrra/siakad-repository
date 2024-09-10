<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jadwalreguler;
use Illuminate\Http\Request;

class JadwalregulerAPIController extends Controller
{
    public function get_all()
    {
        $jadwal_reguler = Jadwalreguler::with(['perhitungan','sesi', 'sesi.pukul','hari', 'ruang', 'tahun_akademik', 'dosen', 'kelas', 'kelas.jurusan', 'detail_kurikulum', 'detail_kurikulum.materi_ajar', 'detail_kurikulum.materi_ajar.semester', 'detail_kurikulum.materi_ajar.semester.keterangan'])->get();
        return response()->json([
            'jadwal_reguler' => $jadwal_reguler,
        ]);
    }
}
