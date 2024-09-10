<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Detailkurikulum;
use Illuminate\Http\Request;

class KurikulumDetailAPIController extends Controller
{
    public function get_all()
    {
        $kurikulum = Detailkurikulum::with(['materi_ajar', 'materi_ajar.semester'])->get();
        return response()->json([
            'kurikulum' => $kurikulum,
        ]);
    }

    public function get_id_det($id)
    {
        $kurikulum = Detailkurikulum::with(['materi_ajar', 'materi_ajar.semester','materi_ajar.jurusan', 'materi_ajar.semester.keterangan'])->where('id', $id)->first();
        return response()->json([
            'kurikulum' => $kurikulum,
        ]);
    }

    public function get_id($id)
    {
        $kurikulum = Detailkurikulum::with(['materi_ajar', 'materi_ajar.semester','materi_ajar.jurusan', 'materi_ajar.semester.keterangan'])->where('id_kurikulum', $id)->get();
        return response()->json([
            'kurikulum' => $kurikulum,
        ]);
    }
}
