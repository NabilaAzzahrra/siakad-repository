<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Materiajar;
use Illuminate\Http\Request;

class MateriajarAPIController extends Controller
{
    public function get_all()
    {
        $materiajar = Materiajar::with(['semester','jurusan'])->orderBy(function ($query) {
            $query->select('semester') // replace 'name' with the actual column you want to order by
                ->from('semester')
                ->whereColumn('semester.id', 'materi_ajar.id_semester');
        })->get();
        return response()->json([
            'materiajar' => $materiajar,
        ]);
    }
}
