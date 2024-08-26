<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KonfigurasiUjian;
use Illuminate\Http\Request;

class KonfigurasiUjianAPIController extends Controller
{
    public function get_all()
    {
        $konfigurasi_ujian = KonfigurasiUjian::with(['tahun_akademik','keterangan'])->get();
        return response()->json([
            'konfigurasi_ujian'=>$konfigurasi_ujian,
        ]);
    }
}
