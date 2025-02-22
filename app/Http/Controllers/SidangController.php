<?php

namespace App\Http\Controllers;

use App\Models\DetailRevisi;
use App\Models\Mahasiswa;
use App\Models\NilaiPenguji;
use App\Models\Penguji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('app_proj')
            ->join('dosen as dosen_pembimbing', 'dosen_pembimbing.id', '=', 'app_proj.id_dosen')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'app_proj.nim')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->leftJoin('penguji', 'penguji.nim', '=', 'app_proj.nim')
            ->leftJoin('dosen as dosen_penguji', 'dosen_penguji.id', '=', 'penguji.id_penguji')
            ->leftJoin('ruang', 'ruang.id', '=', 'penguji.id_ruang')
            ->select('app_proj.*', 'ruang.*', 'penguji.*', 'dosen_pembimbing.*', 'dosen_penguji.id as id_dosen_penguji', 'dosen_penguji.nama_dosen as nama_dosen_penguji', 'mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan')
            ->where('verifikasi', 'SUDAH')
            ->orderBy('mahasiswa.nama', 'ASC')
            ->paginate(10);
        return view('page.sidang.index')->with([
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
        $mahasiswa = Mahasiswa::where('nim', $id)->first();
        $data = DetailRevisi::where('nim', $id)->get();
        $penguji = Penguji::with('dosen')->where('nim', $id)->first();

        $nilaiPenguji = NilaiPenguji::where('nim', $id)->first();
        if (!$nilaiPenguji) {
            $penampilan = 0;
            $bahasaAsing = 0;
            $bahasaIndonesia = 0;
            $teknikPresentasi = 0;
            $metodaPenelitian = 0;
            $penguasaanTeori = 0;
        } else {
            $penampilan = $nilaiPenguji->penampilan;
            $bahasaAsing = $nilaiPenguji->bahasa_asing;
            $bahasaIndonesia = $nilaiPenguji->bahasa_indonesia;
            $teknikPresentasi = $nilaiPenguji->teknik_presentasi;
            $metodaPenelitian = $nilaiPenguji->metoda_penelitian;
            $penguasaanTeori = $nilaiPenguji->penguasaan_teori;
        }
        return view('page.sidang.show')->with([
            'mahasiswa' => $mahasiswa,
            'data' => $data,
            'penguji' => $penguji,
            'penampilan' => $penampilan,
            'bahasaAsing' => $bahasaAsing,
            'bahasaIndonesia' => $bahasaIndonesia,
            'teknikPresentasi' => $teknikPresentasi,
            'metodaPenelitian' => $metodaPenelitian,
            'penguasaanTeori' => $penguasaanTeori,
            'nilaiPenguji' => $nilaiPenguji,
        ]);
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
