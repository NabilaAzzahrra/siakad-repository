<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Tahunakademik;
use Illuminate\Http\Request;

class ReportNilaiKeseluruhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*$konfigurasi = Konfigurasi::first();
        $id_tahun_akademik = $konfigurasi->id_tahun_akademik;

        $jadwal = Jadwalreguler::where('id_tahun_akademik', $id_tahun_akademik)
            ->get();

        return view('page.report_nilai_mahasiswa_keseluruhan.index')->with([
            'jadwal' => $jadwal,
        ]);*/

        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $konfigurasi = Konfigurasi::first();
        $default_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $tahun_akademik = $request->input('id_tahun_akademiks', $default_tahun_akademik);

        $query = Jadwalreguler::query()
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id_materi_ajar')
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

        $jadwal = $query->paginate($entries);

        $tahunAkademik = Tahunakademik::all();

        return view('page.report_nilai_mahasiswa_keseluruhan.index', compact(['jadwal', 'tahunAkademik']))
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
