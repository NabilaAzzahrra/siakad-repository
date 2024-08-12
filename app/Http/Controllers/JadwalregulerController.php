<?php

namespace App\Http\Controllers;

use App\Models\Detailkurikulum;
use App\Models\Dosen;
use App\Models\Jadwalreguler;
use App\Models\Kelas;
use App\Models\Konfigurasi;
use App\Models\Pukul;
use App\Models\Ruang;
use App\Models\Sesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalregulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal_reguler = DB::table('jadwal_reguler')
        ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id_materi_ajar')
        ->join('dosen', 'jadwal_reguler.id_dosen', '=', 'dosen.id')
        ->join('sesi', 'jadwal_reguler.id_sesi', '=', 'sesi.id')
        ->join('pukul', 'sesi.id_pukul', '=', 'pukul.id')
        ->join('ruang', 'jadwal_reguler.id_ruang', '=', 'ruang.id')
        ->join('kelas', 'jadwal_reguler.id_kelas', '=', 'kelas.id')
        ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
        ->join('semester', 'materi_ajar.id_semester', '=', 'semester.id')
        ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
        ->paginate(15);
            return view('page.jadwalreguler.index')->with([
            'jadwal_reguler' => $jadwal_reguler,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $konfigurasi = Konfigurasi::first();
        $id_kurikulum = $konfigurasi->id_kurikulum;
        $sesi = Sesi::all();
        $ruang = Ruang::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $kurikulum = Detailkurikulum::where('id_kurikulum', $id_kurikulum)->get();
        return view('page.jadwalreguler.create')->with([
            'sesi' => $sesi,
            'kurikulum' => $kurikulum,
            'ruang' => $ruang,
            'dosen' => $dosen,
            'konfigurasi' => $konfigurasi,
            'kelas' => $kelas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'id_sesi' => $request->input('sesi'),
            'id_detail_kurikulum' => $request->input('kurikulum'),
            'id_ruang' => $request->input('ruang'),
            'id_dosen' => $request->input('dosen'),
            'id_kelas' => $request->input('kelas'),
            'id_tahun_akademik' => $request->input('id_tahun_akademik'),
            'id_kurikulum' => $request->input('id_kurikulum'),
            'id_keterangan' => $request->input('id_keterangan'),
            'id_perhitungan' => $request->input('id_perhitungan'),
        ];

        Jadwalreguler::create($data);

        return redirect()
            ->route('jadwal_reguler.index')
            ->with('message', 'Data Jadwal Reguler Sudah ditambahkan');
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
        $konfigurasi = Konfigurasi::first();
        $id_kurikulum = $konfigurasi->id_kurikulum;
        $sesi = Sesi::all();
        $ruang = Ruang::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $kurikulum = Detailkurikulum::where('id_kurikulum', $id_kurikulum)->get();
        $jadwal = Jadwalreguler::where('id', $id)->first();
        return view('page.jadwalreguler.edit')->with([
            'sesi' => $sesi,
            'kurikulum' => $kurikulum,
            'ruang' => $ruang,
            'dosen' => $dosen,
            'konfigurasi' => $konfigurasi,
            'kelas' => $kelas,
            'jadwal' => $jadwal,
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
