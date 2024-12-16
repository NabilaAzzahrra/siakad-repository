<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanAPIController extends Controller
{
    public function get_all()
    {
        $jurusan = Jurusan::with(['fakultas'])->get();
        return response()->json([
            'jurusan'=>$jurusan,
        ]);
    }
}
