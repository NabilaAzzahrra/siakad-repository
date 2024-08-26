<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailUas;
use Illuminate\Http\Request;

class DetailUasAPIController extends Controller
{
    public function get_all()
    {
        $detail_uas = DetailUas::with(['uas', 'uas.jadwal', 'uas.jadwal.dosen', 'uas.jadwal.hari', 'uas.jadwal.kelas', 'uas.jadwal.kelas.jurusan','uas.jadwal.tahun_akademik','uas.jadwal.detail_kurikulum', 'uas.jadwal.detail_kurikulum.materi_ajar', 'uas.jadwal.detail_kurikulum.materi_ajar.semester', 'uas.jadwal.detail_kurikulum.materi_ajar.semester.keterangan', 'mahasiswa'])->get();
        return response()->json([
            'detail_uas' => $detail_uas,
        ]);
    }
}
