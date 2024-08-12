<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pukul;
use Illuminate\Http\Request;

class PukulAPIController extends Controller
{
    public function get_all()
    {
        $pukul = Pukul::all();
        return response()->json([
            'pukul' => $pukul,
        ]);
    }

    public function get_id($id)
    {
        $pukul = Pukul::where('id', $id)->first();
        return response()->json([
            'pukul' => $pukul,
        ]);
    }
}
