<?php

namespace App\Http\Controllers;

use App\Models\Revisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('revisi')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'revisi.nim')
            ->join('penguji', 'penguji.nim', '=', 'revisi.nim')
            ->join('penguji as pengujiSidang', 'pengujiSidang.nim', '=', 'revisi.nim')
            ->join('penguji as pembimbingSidang', 'pembimbingSidang.nim', '=', 'revisi.nim')
            ->join('dosen as dosenPenguji', 'dosenPenguji.id', '=', 'pengujiSidang.id_penguji')
            ->join('dosen as dosenPembimbing', 'dosenPembimbing.id', '=', 'pembimbingSidang.id_penguji')
            ->join('kelas', 'kelas.id', '=', 'mahasiswa.id_kelas')
            ->join('jurusan', 'jurusan.id', '=', 'kelas.id_jurusan')
            ->join('app_proj', 'app_proj.nim', '=', 'revisi.nim')
            ->join('ruang', 'ruang.id', '=', 'penguji.id_ruang')
            ->select(
                'mahasiswa.*', // Semua data dari tabel mahasiswa
                'revisi.*', // Semua data dari tabel revisi
                'revisi.verifikasi_pembimbing as verifikasi_revisi_pembimbing', // Semua data dari tabel revisi
                'revisi.verifikasi_penguji as verifikasi_revisi_penguji', // Semua data dari tabel revisi
                'kelas.kelas as nama_kelas', // Nama kelas
                'jurusan.jurusan as nama_jurusan', // Nama jurusan
                'app_proj.*', // Semua data dari tabel app_proj
                'penguji.tgl_sidang', // Semua data dari tabel app_proj
                'penguji.pukul', // Semua data dari tabel app_proj
                'ruang.ruang', // Semua data dari tabel app_proj
                'dosenPenguji.nama_dosen as nama_dosen_penguji', // Nama dosen penguji
                'dosenPembimbing.nama_dosen as nama_dosen_pembimbing' // Nama dosen pembimbing
            )
            ->paginate(10);

        return view('page.revisi.index')->with([
            'data' => $data,
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
        $nim = Auth::user()->email;
        $kode = date('YmdHis');

        if ($request->hasFile('file')) {
            $pengajuanFile = $request->file('file');
            $pengajuanFileName = $kode . '-' . $nim . '.' . $pengajuanFile->extension();
            $pengajuanFilePath = $pengajuanFile->move(public_path('revisi'), $pengajuanFileName);
            $pengajuanFilePath = $pengajuanFileName;
        } else {
            return redirect()->back()->with('error', 'Bab 1 tidak ditemukan');
        }

        $dataFile = [
            'nim' => Auth::user()->email,
            'id_pembimbing' => $request->input('id_pembimbing'),
            'id_penguji' => $request->input('id_penguji'),
            'file' => $pengajuanFilePath,
            'verifikasi_pembimbing' => 'BELUM',
            'verifikasi_penguji' => 'BELUM',
        ];

        Revisi::create($dataFile);

        return back()->with('message_delete', 'Data Sesi Sudah ditambahkan');
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
