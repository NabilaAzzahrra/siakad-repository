<?php

namespace App\Http\Controllers;

use App\Models\DetailPresensi;
use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Presensi;
use App\Models\Tahunakademik;
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
        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $konfigurasi = Konfigurasi::first();
        $default_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $tahun_akademik = $request->input('id_tahun_akademiks', $default_tahun_akademik);

        $query = Jadwalreguler::query()
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id')
            ->join('dosen', 'jadwal_reguler.id_dosen', '=', 'dosen.id')
            ->join('hari', 'jadwal_reguler.id_hari', '=', 'hari.id')
            ->join('sesi as sesi1', 'jadwal_reguler.id_sesi', '=', 'sesi1.id') // Alias untuk sesi pertama
            ->leftJoin('sesi as sesi2', 'jadwal_reguler.id_sesi2', '=', 'sesi2.id') // Alias untuk sesi kedua
            ->join('pukul as pukul1', 'sesi1.id_pukul', '=', 'pukul1.id')
            ->leftJoin('pukul as pukul2', 'sesi2.id_pukul', '=', 'pukul2.id') // Ganti join biasa dengan leftJoin untuk pukul2
            ->join('ruang', 'jadwal_reguler.id_ruang', '=', 'ruang.id')
            ->join('kelas', 'jadwal_reguler.id_kelas', '=', 'kelas.id')
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->join('semester', 'materi_ajar.id_semester', '=', 'semester.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select(
                'jadwal_reguler.*',
                'jadwal_reguler.id as id_jadwal',
                'jadwal_reguler.id_sesi2 as sesi2',
                'jadwal_reguler.id_jadwal as kode_jadwal',
                'detail_kurikulum.*',
                'dosen.*',
                'hari.*',
                'sesi1.*',
                'sesi2.*',
                'sesi1.id as kode_sesi1',
                'sesi2.id as kode_sesi2',
                'sesi1.sesi as sesi1',
                'sesi2.sesi as sesi2',
                'pukul1.*',
                'pukul2.*',
                'pukul1.pukul as pukul1',
                'pukul2.pukul as pukul2',
                'ruang.*',
                'kelas.*',
                'materi_ajar.*',
                'semester.*',
                'jurusan.*'
            )
            ->where('jadwal_reguler.id_tahun_akademik', $tahun_akademik)
            ->where('jadwal_reguler.id_keterangan', $keterangan);

        if ($search) {
            $query->where('materi_ajar', 'like', '%' . $search . '%')
                ->orWhere('nama_dosen', 'like', '%' . $search . '%');
        }

        $jadwal_reguler = $query->paginate($entries);

        $tahunAkademik = Tahunakademik::all();

        if ($request->ajax()) {
            $nilai = Nilai::all();
            return view('partials.nilai', compact('jadwal_reguler', 'nilai'))->render(); // Update this partial view as needed
        }

        $nilai = Nilai::all();

        return view('page.nilai.index', compact(['jadwal_reguler', 'tahunAkademik', 'nilai']))
            ->with('i', ($page - 1) * $entries);
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
            } else {
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
        //dd($nilai);
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
            } else {
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

    public function nilai_dosen(Request $request)
    {
        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $konfigurasi = Konfigurasi::first();
        $default_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $tahun_akademik = $request->input('id_tahun_akademiks', $default_tahun_akademik);

        $query = Jadwalreguler::query()
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id')
            ->join('dosen', 'jadwal_reguler.id_dosen', '=', 'dosen.id')
            ->join('hari', 'jadwal_reguler.id_hari', '=', 'hari.id')
            ->join('sesi as sesi1', 'jadwal_reguler.id_sesi', '=', 'sesi1.id') // Alias untuk sesi pertama
            ->leftJoin('sesi as sesi2', 'jadwal_reguler.id_sesi2', '=', 'sesi2.id') // Alias untuk sesi kedua
            ->join('pukul as pukul1', 'sesi1.id_pukul', '=', 'pukul1.id')
            ->leftJoin('pukul as pukul2', 'sesi2.id_pukul', '=', 'pukul2.id') // Ganti join biasa dengan leftJoin untuk pukul2
            ->join('ruang', 'jadwal_reguler.id_ruang', '=', 'ruang.id')
            ->join('kelas', 'jadwal_reguler.id_kelas', '=', 'kelas.id')
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->join('semester', 'materi_ajar.id_semester', '=', 'semester.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select(
                'jadwal_reguler.*',
                'jadwal_reguler.id as id_jadwal',
                'jadwal_reguler.id_sesi2 as sesi2',
                'jadwal_reguler.id_jadwal as kode_jadwal',
                'detail_kurikulum.*',
                'dosen.*',
                'hari.*',
                'sesi1.*',
                'sesi2.*',
                'sesi1.id as kode_sesi1',
                'sesi2.id as kode_sesi2',
                'sesi1.sesi as sesi1',
                'sesi2.sesi as sesi2',
                'pukul1.*',
                'pukul2.*',
                'pukul1.pukul as pukul1',
                'pukul2.pukul as pukul2',
                'ruang.*',
                'kelas.*',
                'materi_ajar.*',
                'semester.*',
                'jurusan.*'
            )
            ->where('jadwal_reguler.id_tahun_akademik', $tahun_akademik)
            ->where('jadwal_reguler.id_keterangan', $keterangan)
            ->where('dosen.kode_dosen', Auth::user()->email);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('materi_ajar', 'like', '%' . $search . '%')
                    ->orWhere('nama_dosen', 'like', '%' . $search . '%');
            })->where('dosen.kode_dosen', Auth::user()->email);
        }

        $jadwal_reguler = $query->paginate($entries);

        $tahunAkademik = Tahunakademik::all();

        if ($request->ajax()) {
            $nilai = Nilai::all();
            return view('partials.nilai', compact('jadwal_reguler', 'nilai'))->render(); // Update this partial view as needed
        }

        $nilai = Nilai::all();

        return view('page.nilai_dosen.index', compact(['jadwal_reguler', 'tahunAkademik', 'nilai']))
            ->with('i', ($page - 1) * $entries);
    }
}
