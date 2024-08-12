<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Detailkurikulum;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumAPIController extends Controller
{
    public function get_all()
    {
        $kurikulum = Kurikulum::all();
        return response()->json([
            'kurikulum' => $kurikulum,
        ]);
    }

    public function get_detail()
    {
        $id_kurikulum = request('id', 'all');
        $kurikulum = Detailkurikulum::with(['kurikulum', 'materi_ajar', 'materi_ajar.semester', 'materi_ajar.semester.keterangan'])->where('id_kurikulum', $id_kurikulum)->get();
        return response()->json([
            'kurikulum' => $kurikulum,
        ]);
    }
}
