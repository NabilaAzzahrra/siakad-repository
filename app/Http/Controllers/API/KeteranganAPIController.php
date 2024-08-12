<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Keterangan;
use Illuminate\Http\Request;

class KeteranganAPIController extends Controller
{
    public function get_all()
    {
        $keterangan = Keterangan::all();
        return response()->json([
            'keterangan'=>$keterangan,
        ]);
    }
}
