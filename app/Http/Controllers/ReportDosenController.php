<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = DB::table('dosen')->paginate(30);
        return view('page.report.dosen')->with([
            'dosen' => $dosen,
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
        $konfigurasi = Konfigurasi::first();
        $id_tahun_akademik = $konfigurasi->id_tahun_akademik;

        $jadwal = Jadwalreguler::where('id_dosen', $id)
            ->where('id_tahun_akademik', $id_tahun_akademik)
            ->get();

        return view('page.report.show')->with([
            'jadwal' => $jadwal,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        $presensi = Presensi::where('id_jadwal', $id)->get();
        return view('page.report.hasil')->with([
            'jadwal' => $jadwal,
            'presensi' => $presensi,
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

    public function show_dosen(string $id)
    {
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;
        $kode_dosen = Auth::user()->email;

        $jadwal = Jadwalreguler::with([
            'perhitungan',
            'sesi',
            'sesi.pukul',
            'hari',
            'ruang',
            'tahun_akademik',
            'dosen',
            'kelas',
            'kelas.jurusan',
            'detail_kurikulum',
            'detail_kurikulum.materi_ajar',
            'detail_kurikulum.materi_ajar.semester',
            'detail_kurikulum.materi_ajar.semester.keterangan'
        ])
            ->whereHas('tahun_akademik', function ($query) use ($tahun_akademik) {
                $query->where('id_tahun_akademik', $tahun_akademik);
            })
            ->whereHas('detail_kurikulum.materi_ajar.semester.keterangan', function ($query) use ($keterangan) {
                $query->where('id_keterangan', $keterangan);
            })
            ->whereHas('dosen', function ($query) use ($kode_dosen) {
                $query->where('kode_dosen', $kode_dosen);
            })
            ->paginate(10);

        return view('page.report.show_dosen')->with([
            'jadwal' => $jadwal,
        ]);
    }
}
