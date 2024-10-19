<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaAPIController extends Controller
{
    public function get_all()
    {
        $mahasiswa = Mahasiswa::with('user','kelas','kelas.jurusan')->get();
        return response()->json([
            'mahasiswa'=>$mahasiswa,
        ]);
    }
}
