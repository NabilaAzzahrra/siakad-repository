<?php

namespace App\Http\Controllers;

use App\Models\DetailPresensi;
use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\Mahasiswa;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportMahasiswaKeseluruhanController extends Controller
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

        return view('page.report_mahasiswa.keseluruhan')->with([
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
        $presensi = Presensi::where('id_jadwal', $id)->get();
        $mahasiswa = Mahasiswa::where('id_kelas', $kelas)->orderBy('nama', 'ASC')->get();

        // Array untuk menyimpan data detail presensi untuk setiap mahasiswa
        $detailPresensiData = [];

        foreach ($mahasiswa as $m) {
            if (empty($m->nim)) {
                continue; // Skip loop jika NIM kosong
            }

            $presensiData = [];

            foreach ($presensi as $p) {
                if (empty($p->id_presensi)) {
                    continue; // Skip loop jika id_presensi kosong
                }

                $detailPresensi = DetailPresensi::where('id_presensi', $p->id_presensi)
                    ->where('nim', $m->nim) // Menggunakan 'nim' untuk query
                    ->first();

                // Tambahkan 'keterangan' jika ada, atau tanda '-' jika tidak ada
                $presensiData[] = $detailPresensi ? $detailPresensi->keterangan : '-';
            }

            $detailPresensiData[$m->nim] = $presensiData;
        }

        return view('page.report_mahasiswa.print')->with([
            'jadwal' => $jadwal,
            'presensi' => $presensi,
            'mahasiswa' => $mahasiswa,
            'detailPresensiData' => $detailPresensiData
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
    //     $kelas = $jadwal->id_kelas;
    //     $presensi = Presensi::where('id_jadwal', $id)->get();
    //     // $presensi = DetailPresensi::where('id_jadwal', $id)->get();
    //     $mahasiswa = Mahasiswa::where('id_kelas', $kelas)->orderBy('nama', 'ASC')->get();
    //     return view('page.report_mahasiswa.hasil')->with([
    //         'jadwal' => $jadwal,
    //         'presensi' => $presensi,
    //         'mahasiswa' => $mahasiswa
    //     ]);
    // }

    public function edit(string $id)
    {
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        $kelas = $jadwal->id_kelas;
        $presensi = Presensi::where('id_jadwal', $id)->get();
        $mahasiswa = Mahasiswa::where('id_kelas', $kelas)->orderBy('nama', 'ASC')->get();

        // Array untuk menyimpan data detail presensi untuk setiap mahasiswa
        $detailPresensiData = [];

        foreach ($mahasiswa as $m) {
            if (empty($m->nim)) {
                continue; // Skip loop jika NIM kosong
            }

            $presensiData = [];

            foreach ($presensi as $p) {
                if (empty($p->id_presensi)) {
                    continue; // Skip loop jika id_presensi kosong
                }

                $detailPresensi = DetailPresensi::where('id_presensi', $p->id_presensi)
                    ->where('nim', $m->nim) // Menggunakan 'nim' untuk query
                    ->first();

                // Tambahkan 'keterangan' jika ada, atau tanda '-' jika tidak ada
                $presensiData[] = $detailPresensi ? $detailPresensi->keterangan : '-';
            }

            $detailPresensiData[$m->nim] = $presensiData;
        }

        return view('page.report_mahasiswa.hasil')->with([
            'jadwal' => $jadwal,
            'presensi' => $presensi,
            'mahasiswa' => $mahasiswa,
            'detailPresensiData' => $detailPresensiData
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

    public function r_mahasiswa()
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

        return view('page.report_mahasiswa.keseluruhan')->with([
            'jadwal' => $jadwal,
        ]);
    }
}
