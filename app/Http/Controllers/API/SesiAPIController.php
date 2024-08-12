<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sesi;
use Illuminate\Http\Request;

class SesiAPIController extends Controller
{
    public function get_all()
    {
        $sesi = Sesi::with(['pukul'])->get();
        return response()->json([
            'sesi'=>$sesi,
        ]);
    }
}
