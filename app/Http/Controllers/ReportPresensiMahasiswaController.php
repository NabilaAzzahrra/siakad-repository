<?php

namespace App\Http\Controllers;

use App\Models\DetailPresensi;
use App\Models\Jadwalreguler;
use App\Models\Mahasiswa;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportPresensiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa_lengkap = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan')
            ->whereNotNull('mahasiswa.id_kelas')
            ->whereNotNull('mahasiswa.tingkat')
            ->orderBy('nama', 'ASC')
            ->paginate(30);
        return view('page.report_presensi_mahasiswa.index')->with([
            'mahasiswa_lengkap' => $mahasiswa_lengkap,
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
        // Ambil data mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('nim', $id)->first();
        $id_kelas = $mahasiswa->id_kelas;

        // Ambil data jadwal berdasarkan id_kelas
        $jadwal = Jadwalreguler::where('id_kelas', $id_kelas)->get();

        // Ambil data presensi yang terkait dengan mahasiswa tersebut
        // Join ke tabel presensi untuk mendapatkan id_jadwal dari presensi
        $presensi = DetailPresensi::join('presensi', 'detail_presensi.id_presensi', '=', 'presensi.id_presensi')
            ->where('detail_presensi.nim', $id)
            ->select('detail_presensi.*', 'presensi.id_jadwal', 'presensi.pertemuan')
            ->get();

        // Susun data presensi per pertemuan P1-P14
        $presensiPerPertemuan = [];
        foreach ($jadwal as $jadwalItem) {
            $itemPresensi = [];
            for ($i = 1; $i <= 14; $i++) {
                $p = 'P' . $i;
                $itemPresensi[$p] = $presensi->where('id_jadwal', $jadwalItem->id_jadwal)
                    ->where('pertemuan', $i)
                    ->first();
            }
            $presensiPerPertemuan[$jadwalItem->id_jadwal] = $itemPresensi;
        }

        // Debugging untuk memastikan data presensi
        // dd($presensiPerPertemuan);

        return view('page.report_presensi_mahasiswa.print')->with([
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa,
            'presensiPerPertemuan' => $presensiPerPertemuan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('nim', $id)->first();
        $id_kelas = $mahasiswa->id_kelas;

        // Ambil data jadwal berdasarkan id_kelas
        $jadwal = Jadwalreguler::where('id_kelas', $id_kelas)->get();

        // Ambil data presensi yang terkait dengan mahasiswa tersebut
        // Join ke tabel presensi untuk mendapatkan id_jadwal dari presensi
        $presensi = DetailPresensi::join('presensi', 'detail_presensi.id_presensi', '=', 'presensi.id_presensi')
            ->where('detail_presensi.nim', $id)
            ->select('detail_presensi.*', 'presensi.id_jadwal', 'presensi.pertemuan')
            ->get();

        // Susun data presensi per pertemuan P1-P14
        $presensiPerPertemuan = [];
        foreach ($jadwal as $jadwalItem) {
            $itemPresensi = [];
            for ($i = 1; $i <= 14; $i++) {
                $p = 'P' . $i;
                $itemPresensi[$p] = $presensi->where('id_jadwal', $jadwalItem->id_jadwal)
                    ->where('pertemuan', $i)
                    ->first();
            }
            $presensiPerPertemuan[$jadwalItem->id_jadwal] = $itemPresensi;
        }

        // Debugging untuk memastikan data presensi
        // dd($presensiPerPertemuan);

        return view('page.report_presensi_mahasiswa.jadwal')->with([
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa,
            'presensiPerPertemuan' => $presensiPerPertemuan,
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
