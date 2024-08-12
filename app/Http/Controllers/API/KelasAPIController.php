<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasAPIController extends Controller
{
    public function get_all()
    {
        $kelas = Kelas::with(['jurusan'])->get();
        return response()->json([
            'kelas'=> $kelas,
        ]);
    }

    public function get_id($id)
    {
        $kelas = Kelas::with(['jurusan'])->where('id', $id)->first();
        return response()->json([
            'kelas' => $kelas,
        ]);
    }
}
