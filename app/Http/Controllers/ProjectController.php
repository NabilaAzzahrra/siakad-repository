<?php

namespace App\Http\Controllers;

use App\Models\AppProj;
use App\Models\Bimbingan;
use App\Models\Dosen;
use App\Models\FilePengajuanProject;
use App\Models\JudulProject;
use App\Models\Mahasiswa;
use App\Models\Pembimbing;
use App\Models\PembimbingProject;
use App\Models\PengajuanJudul;
use App\Models\Revisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('LOLOS!');
        return view('page.project.index');
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
        $data1 = [
            'nim' => Auth::user()->email,
            'judul' => $request->input('judul1'),
            'verifikasi' => 'BELUM',
        ];
        $data2 = [
            'nim' => Auth::user()->email,
            'judul' => $request->input('judul2'),
            'verifikasi' => 'BELUM',
        ];

        $nim = Auth::user()->email;
        $kode = date('YmdHis');

        if ($request->hasFile('file')) {
            $pengajuanFile = $request->file('file');
            $pengajuanFileName = $kode . '-' . $nim . '.' . $pengajuanFile->extension();
            $pengajuanFilePath = $pengajuanFile->move(public_path('lapBab'), $pengajuanFileName);
            $pengajuanFilePath = $pengajuanFileName;
        } else {
            return redirect()->back()->with('error', 'Bab 1 tidak ditemukan');
        }

        $dataFile = [
            'nim' => $nim,
            'file' => $pengajuanFilePath,
        ];

        FilePengajuanProject::create($dataFile);

        $dataPembimbing = [
            'nim' => $nim,
            'id_dosen' => $request->input('dosen'),
            'verifikasi' => 'BELUM',
        ];

        Pembimbing::create($dataPembimbing);

        PengajuanJudul::create($data1);
        PengajuanJudul::create($data2);

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
        $mahasiswa = Mahasiswa::with(['kelas', 'kelas.jurusan'])
            ->where('nim', Auth::user()->email)
            ->first();

        $file = FilePengajuanProject::where('nim', Auth::user()->email)->first();
        $judul = JudulProject::where('nim', Auth::user()->email)->get();
        $bimbingan = Bimbingan::where('nim', Auth::user()->email)->paginate('5');
        $appProj = AppProj::with(['mahasiswa'])->where('nim', Auth::user()->email)->first();
        $revisi = Revisi::where('nim', Auth::user()->email)->first();

        $pembimbing = Pembimbing::where('nim', Auth::user()->email)->first();

        $dosen = PembimbingProject::all();

        if ($appProj == null) {
            $appProjVerifikasi = '';
            $appProjNim = Auth::user()->email;
            $appProjMahasiswa = Auth::user()->name;
            $appProjKelas = '';
            $appProjJurusan = '';
            $appProjJudul = '';
            $appProjFile = '';
        } else {
            $appProjVerifikasi = $appProj->verifikasi;
            $appProjNim = $appProj->nim;
            $appProjMahasiswa = $appProj->mahasiswa->nama;
            $appProjKelas = $appProj->mahasiswa->kelas->kelas;
            $appProjJurusan = $appProj->mahasiswa->kelas->jurusan->jurusan;
            $appProjJudul = $appProj->judul;
            $appProjFile = $appProj->file;
        }

        if ($revisi == null) {
            $revisiFile = '';
            $revisiVerifikasi = '';
        } else {
            $revisiFile = $revisi->file;
            $revisiVerifikasi = $revisi->verifikasi;
        }

        if ($file == null) {
            $fileFile = '';
            $fileVerifikasi = '';
        } else {
            $fileFile = $file->file;
            $fileVerifikasi = $file->verifikasi;
        }

        if ($pembimbing == null) {
            $namaDosen = '';
            $namaDosenVerifikasi = '';
            $idDosen = '';
        } else {
            $namaDosen = $pembimbing->pembimbingProjek->dosen->nama_dosen;
            $namaDosenVerifikasi = $pembimbing->verifikasi;
            $idDosen = $pembimbing->pembimbingProjek->dosen->id;
        }

        $verifikasiPengajuan = PengajuanJudul::where('nim', Auth::user()->email)
            ->where('verifikasi', 'SUDAH')
            ->first();

        $verifikasiPembimbing = Pembimbing::where('nim', Auth::user()->email)
            ->where('verifikasi', 'SUDAH')
            ->first();

        $verifikasiBimbingan = Bimbingan::where('nim', Auth::user()->email)
            ->where('verifikasi', 'SUDAH')
            ->count();

        return view('page.project.index')->with([
            'mahasiswa' => $mahasiswa,
            'pembimbing' => $pembimbing,
            'file' => $file,
            'dosen' => $dosen,
            'judul' => $judul,
            'bimbingan' => $bimbingan,
            'appProj' => $appProj,
            'revisi' => $revisi,
            'appProjVerifikasi' => $appProjVerifikasi,
            'appProjNim' => $appProjNim,
            'appProjMahasiswa' => $appProjMahasiswa,
            'appProjKelas' => $appProjKelas,
            'appProjJurusan' => $appProjJurusan,
            'appProjJudul' => $appProjJudul,
            'appProjFile' => $appProjFile,
            'revisiFile' => $revisiFile,
            'revisiVerifikasi' => $revisiVerifikasi,
            'verifikasiPengajuan' => $verifikasiPengajuan,
            'verifikasiPembimbing' => $verifikasiPembimbing,
            'verifikasiBimbingan' => $verifikasiBimbingan,
            'fileFile' => $fileFile,
            'fileVerifikasi' => $fileVerifikasi,
            'namaDosen' => $namaDosen,
            'idDosen' => $idDosen,
            'namaDosenVerifikasi' => $namaDosenVerifikasi,
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
