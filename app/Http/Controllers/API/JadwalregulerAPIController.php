<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jadwalreguler;
use Illuminate\Http\Request;

class JadwalregulerAPIController extends Controller
{
    public function get_all()
    {
        $jadwal_reguler = Jadwalreguler::all();
        return response()->json([
            'jadwal_reguler'=>$jadwal_reguler,
        ]);
    }
}
