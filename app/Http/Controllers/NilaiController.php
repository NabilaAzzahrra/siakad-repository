<?php

namespace App\Http\Controllers;

use App\Models\DetailPresensi;
use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

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
            ->where('id_tahun_akademik', $tahun_akademik)
            ->where('jadwal_reguler.id_keterangan', $keterangan)
            ->when($request->input('search'), function ($query) use ($request) {
                $search = $request->input('search');
                $query->where(function ($query) use ($search) {
                    $query->where('materi_ajar.materi_ajar', 'like', '%' . $search . '%')
                        ->orWhere('dosen.nama_dosen', 'like', '%' . $search . '%')
                        ->orWhere('ruang.ruang', 'like', '%' . $search . '%')
                        ->orWhere('kelas.kelas', 'like', '%' . $search . '%');
                });
            })
            ->paginate(15);

        if ($request->ajax()) {
            $nilai = Nilai::all();
            return view('partials.nilai', compact('jadwal_reguler', 'nilai'))->render(); // Update this partial view as needed
        }

        $nilai = Nilai::all();
        return view('page.nilai.index', [
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
            if (Auth::user()->role == 'A') {
                $nilaiMateri->verifikasi = 1;
            }else{
                $nilaiMateri->verifikasi = 0;
            }

            // Simpan detail nilai
            $nilaiMateri->save();
        }

        if (Auth::user()->role == 'A') {
            return redirect()
                ->route('nilai.index')
                ->with('message', 'Data presensi telah berhasil ditambahkan.');
        } else {
            return redirect()
                ->route('nilai.nilai_dosen', Auth::user()->email)
                ->with('message', 'Data UAS Sudah diupdate');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $presensi = Presensi::with(['jadwal', 'jadwal.kelas'])->where('id_jadwal', $id)->first();
        $id_presensi = $presensi->id_presensi;
        $mahasiswa = Mahasiswa::where('id_kelas', $presensi->jadwal->id_kelas)
            ->orderBy('nama', 'asc')
            ->get();
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        // $detail = DetailPresensi::with(['presensi'])->where('id_presensi', $id_presensi)->get();
        foreach ($mahasiswa as $m) {
            $m->jumlah_hadir = DetailPresensi::where('id_presensi', $id_presensi)
                ->where('nim', $m->nim)
                ->where('keterangan', 'HADIR')
                ->count();
        }
        return view('page.nilai.show')->with([
            'jadwal' => $jadwal,
            'presensi' => $presensi,
            'mahasiswa' => $mahasiswa,
            // 'detail' => $detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $presensi = Presensi::with(['jadwal', 'jadwal.kelas'])->where('id_jadwal', $id)->first();
        $id_presensi = $presensi->id_presensi;
        $nilaiMateri = Nilai::with(['jadwal', 'jadwal.kelas'])->where('id_jadwal', $id)->first();
        $mahasiswa = Mahasiswa::where('id_kelas', $presensi->jadwal->id_kelas)
            ->orderBy('nama', 'asc')
            ->get();
        $nilai = Nilai::where('id_jadwal', $id)
            ->get();
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        foreach ($nilai as $m) {
            $m->jumlah_hadir = DetailPresensi::where('id_presensi', $id_presensi)
                ->where('nim', $m->nim)
                ->where('keterangan', 'HADIR')
                ->count();
        }
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
            if (Auth::user()->role == 'A') {
                $nilaiMateri->verifikasi = 1;
            }else{
                $nilaiMateri->verifikasi = 0;
            }
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

    public function nilai_dosen()
    {
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;
        $kode_dosen = Auth::user()->email;

        $jadwal_reguler = Jadwalreguler::with([
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

        $nilai = Nilai::all();
        return view('page.nilai_dosen.index')->with([
            'jadwal_reguler' => $jadwal_reguler,
            'nilai' => $nilai
        ]);
    }
}