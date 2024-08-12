<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenAPIController extends Controller
{
    public function get_all()
    {
        $dosen = Dosen::all();
        return response()->json([
            'dosen' => $dosen,
        ]);
    }
}
