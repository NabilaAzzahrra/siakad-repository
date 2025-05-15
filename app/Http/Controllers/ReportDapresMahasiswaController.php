<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportDapresMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $semester = Semester::all();
        $nim = Auth::user()->role === 'M'
            ? Auth::user()->email
            : str_replace('ortu', '', Auth::user()->email);
        $query = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan', 'kelas.id_jurusan')
            ->whereNotNull('mahasiswa.id_kelas')
            ->where('nim', $nim)
            ->whereNotNull('mahasiswa.tingkat');
        $mahasiswa_lengkap = $query->orderBy('nama', 'ASC')->paginate(30);

        return view('page.report_dapres_mahasiswa.index')->with([
            'mahasiswa_lengkap' => $mahasiswa_lengkap,
            'semester' => $semester,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
