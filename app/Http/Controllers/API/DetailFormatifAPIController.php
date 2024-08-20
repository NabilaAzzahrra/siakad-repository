<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailFormatif;
use Illuminate\Http\Request;

class DetailFormatifAPIController extends Controller
{
    public function get_all()
    {
        $detail = DetailFormatif::with(['formatif', 'formatif.jadwal', 'formatif.jadwal.dosen', 'formatif.jadwal.detail_kurikulum','formatif.jadwal.detail_kurikulum.materi_ajar','formatif.jadwal.detail_kurikulum.materi_ajar.semester', 'mahasiswa', 'mahasiswa.kelas', 'mahasiswa.kelas.jurusan'])->get();
        return response()->json([
            'detail' => $detail,
        ]);
    }
}
