<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tahunakademik;
use Illuminate\Http\Request;

class TahunakademikAPIController extends Controller
{
    public function get_all()
    {
        $tahunakademik = Tahunakademik::all();
        return response()->json([
            'tahunakademik'=>$tahunakademik,
        ]);
    }
}
