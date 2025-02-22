<?php

namespace App\Http\Controllers;

use App\Models\AppProj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengujiSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = AppProj::paginate(10);
        $data = DB::table('app_proj')
            ->join('dosen', 'app_proj.id_dosen', '=', 'dosen.id')
            ->join('mahasiswa', 'app_proj.nim', '=', 'mahasiswa.nim')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select(
                'app_proj.id',
                'app_proj.id_dosen',
                'app_proj.nim',
                'app_proj.judul',
                'app_proj.verifikasi',
                'mahasiswa.nama',
                'mahasiswa.tahun_angkatan',
                'jurusan.jurusan',
                'dosen.nama_dosen'
            )
            ->groupBy('app_proj.id','app_proj.id_dosen','app_proj.nim', 'app_proj.judul', 'mahasiswa.nama', 'jurusan.jurusan', 'mahasiswa.tahun_angkatan', 'dosen.nama_dosen', 'app_proj.verifikasi')
            ->paginate(10);
        return view('page.pengujiSidang.index')->with([
            'data' => $data
        ]);
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
        //
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
