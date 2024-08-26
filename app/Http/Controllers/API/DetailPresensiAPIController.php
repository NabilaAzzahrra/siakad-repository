<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailPresensi;
use Illuminate\Http\Request;

class DetailPresensiAPIController extends Controller
{
    public function get_all()
    {
        $detailpresensi = DetailPresensi::with(['presensi','mahasiswa','mahasiswa.kelas','mahasiswa.kelas.jurusan'])->get();
        return response()->json([
            'detailpresensi' => $detailpresensi,
        ]);
    }
}
