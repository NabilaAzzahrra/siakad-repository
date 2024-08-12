<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Perhitungan;
use Illuminate\Http\Request;

class PerhitunganAPIController extends Controller
{
    public function get_all()
    {
        $perhitungan = Perhitungan::all();
        return response()->json([
            'perhitungan' => $perhitungan,
        ]);
    }
}
