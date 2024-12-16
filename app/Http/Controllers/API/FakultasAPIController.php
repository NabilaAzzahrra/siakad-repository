<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasAPIController extends Controller
{
    public function get_all()
    {
        $fakultas = Fakultas::all();
        return response()->json([
            'fakultas'=>$fakultas,
        ]);
    }
}
