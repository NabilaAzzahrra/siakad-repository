<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailUts;
use Illuminate\Http\Request;

class DetailUtsAPIController extends Controller
{
    public function get_all()
    {
        $detail_uts = DetailUts::with(['uts', 'uts.jadwal', 'uts.jadwal.dosen', 'uts.jadwal.hari', 'uts.jadwal.kelas', 'uts.jadwal.kelas.jurusan','uts.jadwal.tahun_akademik','uts.jadwal.detail_kurikulum', 'uts.jadwal.detail_kurikulum.materi_ajar', 'uts.jadwal.detail_kurikulum.materi_ajar.semester', 'uts.jadwal.detail_kurikulum.materi_ajar.semester.keterangan', 'mahasiswa'])->get();
        return response()->json([
            'detail_uts' => $detail_uts,
        ]);
    }
}
