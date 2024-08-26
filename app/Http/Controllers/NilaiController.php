<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal_reguler = DB::table('jadwal_reguler')
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id_materi_ajar')
            ->join('dosen', 'jadwal_reguler.id_dosen', '=', 'dosen.id')
            ->join('hari', 'jadwal_reguler.id_hari', '=', 'hari.id')
            ->join('sesi', 'jadwal_reguler.id_sesi', '=', 'sesi.id')
            ->join('pukul', 'sesi.id_pukul', '=', 'pukul.id')
            ->join('ruang', 'jadwal_reguler.id_ruang', '=', 'ruang.id')
            ->join('kelas', 'jadwal_reguler.id_kelas', '=', 'kelas.id')
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->join('semester', 'materi_ajar.id_semester', '=', 'semester.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select('jadwal_reguler.*', 'jadwal_reguler.id as id_jadwal', 'jadwal_reguler.id_jadwal as kode_jadwal', 'detail_kurikulum.*', 'dosen.*', 'hari.*', 'sesi.*', 'sesi.id as kode_sesi', 'pukul.*', 'ruang.*', 'kelas.*', 'materi_ajar.*', 'semester.*', 'jurusan.*')
            ->paginate(15);
        $nilai = Nilai::all();
        return view('page.nilai.index')->with([
            'jadwal_reguler' => $jadwal_reguler,
            'nilai' => $nilai
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
        // Validasi data input
        $request->validate([
            'id_jadwal' => 'required|exists:jadwal_reguler,id_jadwal',
            'nim.*' => 'required|exists:mahasiswa,nim',
            'presensi.*' => 'nullable|numeric|min:0|max:100',
            'tugas.*' => 'nullable|numeric|min:0|max:100',
            'formatif.*' => 'nullable|numeric|min:0|max:100',
            'uas.*' => 'nullable|numeric|min:0|max:100',
            'uts.*' => 'nullable|numeric|min:0|max:100',
        ]);

        // Ambil nilai id_jadwal dari inputan
        $jadwalId = $request->input('id_jadwal');

        foreach ($request->nim as $key => $nim) {
            $nilaiMateri = new Nilai();
            $nilaiMateri->id_jadwal = $jadwalId;
            $nilaiMateri->id_nilai = uniqid();
            $nilaiMateri->nim = $nim;
            $nilaiMateri->presensi = $request->presensi[$key];
            $nilaiMateri->tugas = $request->tugas[$key];
            $nilaiMateri->formatif = $request->formatif[$key];
            $nilaiMateri->uas = $request->uas[$key];
            $nilaiMateri->uts = $request->uts[$key];

            // Simpan detail nilai
            $nilaiMateri->save();
        }

        return redirect()
            ->route('nilai.index')
            ->with('message', 'Data presensi telah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $presensi = Presensi::with(['jadwal', 'jadwal.kelas'])->where('id_jadwal', $id)->first();
        $mahasiswa = Mahasiswa::where('id_kelas', $presensi->jadwal->id_kelas)
            ->orderBy('nama', 'asc')
            ->get();
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        return view('page.nilai.show')->with([
            'jadwal' => $jadwal,
            'presensi' => $presensi,
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $presensi = Presensi::with(['jadwal', 'jadwal.kelas'])->where('id_jadwal', $id)->first();
        $nilaiMateri = Nilai::with(['jadwal', 'jadwal.kelas'])->where('id_jadwal', $id)->first();
        $mahasiswa = Mahasiswa::where('id_kelas', $presensi->jadwal->id_kelas)
            ->orderBy('nama', 'asc')
            ->get();
        $nilai = Nilai::where('id_jadwal', $id)
            ->get();
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        return view('page.nilai.edit')->with([
            'jadwal' => $jadwal,
            'presensi' => $presensi,
            'nilai' => $nilai,
            'nilaiMateri' => $nilaiMateri,
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Nilai::where('id_jadwal', $id)->delete();

        foreach ($request->nim as $key => $nim) {
            $nilaiMateri = new Nilai();
            $nilaiMateri->id_jadwal = $id;
            $nilaiMateri->id_nilai = $request->id_nilai[$key];
            $nilaiMateri->nim = $nim;
            $nilaiMateri->presensi = $request->presensi[$key];
            $nilaiMateri->tugas = $request->tugas[$key];
            $nilaiMateri->formatif = $request->formatif[$key];
            $nilaiMateri->uas = $request->uas[$key];
            $nilaiMateri->uts = $request->uts[$key];
            // Simpan detail presensi
            $nilaiMateri->save();
        }

        return back()->with('message_delete', 'Data Nilai Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function nilai_verifikasi(Request $request, string $id)
    {
        // Mengambil semua record yang cocok dengan id_jadwal
        $nilai = Nilai::where('id_jadwal', $id)->get();

        // Memeriksa apakah ada record yang belum diverifikasi
        if ($nilai->contains('verifikasi', 0)) {
            // Memperbarui semua record yang memiliki verifikasi = 0
            Nilai::where('id_jadwal', $id)->update(['verifikasi' => $request->input('verifikasi')]);

            return back()->with('message_success', 'Data Nilai Sudah diupdate');
        }

        return back()->with('message_error', 'Semua nilai sudah diverifikasi sebelumnya.');
    }
}
