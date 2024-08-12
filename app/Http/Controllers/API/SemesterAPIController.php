<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterAPIController extends Controller
{
    public function get_all()
    {
        $semester = Semester::with(['keterangan'])->get();
        return response()->json([
            'semester'=>$semester,
        ]);
    }
}
