<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hari;
use Illuminate\Http\Request;

class HariAPIController extends Controller
{
    public function get_all()
    {
        $hari = Hari::all();
        return response()->json([
            'hari'=>$hari,
        ]);
    }
}
