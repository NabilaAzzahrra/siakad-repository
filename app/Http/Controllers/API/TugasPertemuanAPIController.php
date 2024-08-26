<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailTugas;
use Illuminate\Http\Request;

class TugasPertemuanAPIController extends Controller
{
    public function get_all()
    {
        $tugas = DetailTugas::with(['m_tugas','m_tugas.presensi','m_tugas.presensi.jadwal', 'm_tugas.presensi.jadwal.dosen','m_tugas.presensi.jadwal.detail_kurikulum','m_tugas.presensi.jadwal.detail_kurikulum.materi_ajar', 'm_tugas.presensi.jadwal.detail_kurikulum.materi_ajar.semester','mahasiswa'])->get();
        return response()->json([
            'tugas'=>$tugas,
        ]);
    }
}
