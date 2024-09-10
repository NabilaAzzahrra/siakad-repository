<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class ReportNilaiKeseluruhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konfigurasi = Konfigurasi::first();
        $id_tahun_akademik = $konfigurasi->id_tahun_akademik;

        $jadwal = Jadwalreguler::where('id_tahun_akademik', $id_tahun_akademik)
            ->get();

        return view('page.report_nilai_mahasiswa_keseluruhan.index')->with([
            'jadwal' => $jadwal,
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
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        $kelas = $jadwal->id_kelas;
        $mahasiswa = Mahasiswa::where('id_kelas', $kelas)->orderBy('nama', 'ASC')->get();
        $nilai = Nilai::where('id_jadwal', $id)->get();
        return view('page.report_nilai_mahasiswa_keseluruhan.print')->with([
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa,
            'nilai' => $nilai,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        $kelas = $jadwal->id_kelas;
        $mahasiswa = Mahasiswa::where('id_kelas', $kelas)->orderBy('nama', 'ASC')->get();
        $nilai = Nilai::where('id_jadwal', $id)->get();
        return view('page.report_nilai_mahasiswa_keseluruhan.jadwal')->with([
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa,
            'nilai' => $nilai,
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
