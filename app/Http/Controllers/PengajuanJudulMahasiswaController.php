<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Dosen;
use App\Models\FilePengajuanProject;
use App\Models\JudulProject;
use App\Models\Mahasiswa;
use App\Models\Pembimbing;
use App\Models\PembimbingProject;
use App\Models\PengajuanJudul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengajuanJudulMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::where('kode_dosen', Auth::user()->email)->first();
        $id_dosen = $dosen->id;

        $pembimbingProject = PembimbingProject::where('id_dosen', $id_dosen)->first();
        $id_dosen_pembimbing = $pembimbingProject->id;

        $data = Pembimbing::where('id_dosen', $id_dosen_pembimbing)->where('verifikasi', 'SUDAH')->paginate(10);
        return view('page.pengajuanJudulMahasiswa.index')->with([
            'data' => $data
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
        $dataFile = FilePengajuanProject::where('nim', $id)->first();
        $dataMahasiswa = Mahasiswa::where('nim', $id)->first();
        $data = Bimbingan::where('nim', $id)->get();
        $pengajuan = FilePengajuanProject::where('nim', $id)->first();
        //return view('page.mahasiswaBimbingan.detail')->with([
        return view('page.pengajuanJudulMahasiswa.index')->with([
            'dataFile' => $dataFile,
            'dataMahasiswa' => $dataMahasiswa,
            'data' => $data,
            'pengajuan' => $pengajuan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = JudulProject::where('nim', $id)->get();
        $pengajuan = FilePengajuanProject::where('nim', $id)->first();
        return view('page.pengajuanJudulMahasiswa.verifikasiJudul')->with([
            'data' => $data,
            'pengajuan' => $pengajuan,
        ]);
    }

    public function verifikasi(Request $request, string $id)
    {
        // Temukan data berdasarkan ID
        $datas = PengajuanJudul::findOrFail($id);

        // Periksa status verifikasi saat ini dan ubah
        $datas->verifikasi = $datas->verifikasi === "SUDAH" ? "BELUM" : "SUDAH";

        // Simpan perubahan
        $datas->save();

        // Redirect dengan pesan sukses
        return back()->with('message_delete', 'Data Sudah diupdate');
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
