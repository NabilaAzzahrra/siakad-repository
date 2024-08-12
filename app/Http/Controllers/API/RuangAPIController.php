<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangAPIController extends Controller
{
    public function get_all()
    {
        $ruang = Ruang::all();
        return response()->json([
            'ruang'=>$ruang,
        ]);
    }
}
