<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiAPIController extends Controller
{
    public function get_all()
    {
        $presensi = Presensi::with(['jadwal', 'jadwal.dosen', 'jadwal.hari', 'jadwal.kelas', 'jadwal.kelas.mahasiswa', 'jadwal.kelas.jurusan','jadwal.tahun_akademik','jadwal.detail_kurikulum', 'jadwal.detail_kurikulum.materi_ajar', 'jadwal.detail_kurikulum.materi_ajar.semester', 'jadwal.detail_kurikulum.materi_ajar.semester.keterangan'])->get();
        return response()->json([
            'presensi' => $presensi,
        ]);
    }
}
