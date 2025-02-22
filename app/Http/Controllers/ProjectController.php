<?php

namespace App\Http\Controllers;

use App\Models\AppProj;
use App\Models\Bimbingan;
use App\Models\DetailRevisi;
use App\Models\Dosen;
use App\Models\FilePengajuanProject;
use App\Models\JudulProject;
use App\Models\Mahasiswa;
use App\Models\Pembimbing;
use App\Models\PembimbingProject;
use App\Models\PengajuanJudul;
use App\Models\Penguji;
use App\Models\Revisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $detailRevisi = DetailRevisi::where('nim', Auth::user()->email)->first();

        $pembimbing = Pembimbing::where('nim', Auth::user()->email)->first();
        $penguji = Penguji::where('nim', Auth::user()->email)->first();

        $penguji = DB::table('app_proj')
            ->join('dosen as dosen_pembimbing', 'dosen_pembimbing.id', '=', 'app_proj.id_dosen')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'app_proj.nim')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->leftJoin('penguji', 'penguji.nim', '=', 'app_proj.nim')
            ->leftJoin('dosen as dosen_penguji', 'dosen_penguji.id', '=', 'penguji.id_penguji')
            ->leftJoin('ruang', 'ruang.id', '=', 'penguji.id_ruang')
            ->select('app_proj.*', 'ruang.*', 'penguji.*', 'dosen_pembimbing.*', 'dosen_penguji.id as id_dosen_penguji', 'dosen_penguji.nama_dosen as nama_dosen_penguji', 'mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan')
            ->where('verifikasi', 'SUDAH')
            ->where('penguji.nim', Auth::user()->email)
            ->first();

        $countBimbingan = Bimbingan::where('nim', $id)->where('verifikasi', 'SUDAH')->count();
        $verifiAppProj = AppProj::where('nim', $id)->first();

        $dosen = PembimbingProject::all();

        //dd($judul);
        $read = $judul->count() > 0 ? 'readonly' : '';


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
            $revisiData = '';
            $revisiFile = '';
            $revisiVerifikasiPembimbing = '';
            $revisiVerifikasiPenguji = '';
            $revisiNim = Auth::user()->email;
            $revisiMahasiswa = Auth::user()->name;
            $revisiKelas = '';
            $revisiJurusan = '';
        } else {
            $revisiData = 'hidden';
            $revisiFile = $revisi->file;
            $revisiVerifikasiPembimbing = $revisi->verifikasi_pembimbing;
            $revisiVerifikasiPenguji = $revisi->verifikasi_penguji;
            $revisiNim = $revisi->nim;
            $revisiMahasiswa = $revisi->mahasiswa->nama;
            $revisiKelas = $revisi->mahasiswa->kelas->kelas;
            $revisiJurusan = $revisi->mahasiswa->kelas->jurusan->jurusan;
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

        if(!$penguji){
            $pengujiNama='';
            $idPenguji = '';
            $hariPenguji = '';
            $tglPenguji = '';
            $pukulPenguji = '';
            $ruangPenguji = '';
        }else{
            $pengujiNama = $penguji->nama_dosen_penguji;
            $idPenguji = $penguji->id_penguji;
            $hariPenguji = date('l', strtotime($penguji->tgl_sidang));
            $tglPenguji = date('d', strtotime($penguji->tgl_sidang));
            $pukulPenguji = $penguji->ruang;
            $ruangPenguji = $penguji->pukul;
        }

        if(!$detailRevisi){
            $bab_satu = '';
            $bab_dua = '';
            $bab_tiga = '';
            $bab_empat = '';
            $bab_lima = '';
        }else{
            $bab_satu = $detailRevisi->bab_satu;
            $bab_dua = $detailRevisi->bab_dua;
            $bab_tiga = $detailRevisi->bab_tiga;
            $bab_empat = $detailRevisi->bab_empat;
            $bab_lima = $detailRevisi->bab_lima;
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

        $verifikasiDaftar = AppProj::where('nim', Auth::user()->email)
            ->where('verifikasi', 'SUDAH')
            ->first();

        $verifikasiSidang = DetailRevisi::where('nim', Auth::user()->email)
            ->first();

        $verifikasiRevisi = Revisi::where('nim', Auth::user()->email)
            ->where('verifikasi_pembimbing', 'SUDAH')
            ->where('verifikasi_penguji', 'SUDAH')
            ->first();

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
            'revisiVerifikasiPembimbing' => $revisiVerifikasiPembimbing,
            'revisiVerifikasiPenguji' => $revisiVerifikasiPenguji,
            'revisiNim' => $revisiNim,
            'revisiMahasiswa' => $revisiMahasiswa,
            'revisiKelas' => $revisiKelas,
            'revisiJurusan' => $revisiJurusan,
            'verifikasiPengajuan' => $verifikasiPengajuan,
            'verifikasiPembimbing' => $verifikasiPembimbing,
            'verifikasiBimbingan' => $verifikasiBimbingan,
            'verifikasiDaftar' => $verifikasiDaftar,
            'verifikasiSidang' => $verifikasiSidang,
            'verifikasiRevisi' => $verifikasiRevisi,
            'fileFile' => $fileFile,
            'fileVerifikasi' => $fileVerifikasi,
            'namaDosen' => $namaDosen,
            'idDosen' => $idDosen,
            'penguji' => $penguji,
            'namaDosenVerifikasi' => $namaDosenVerifikasi,
            'detailRevisi' => $detailRevisi,
            'read' => $read,
            'countBimbingan' => $countBimbingan,
            'verifiAppProj' => $verifiAppProj,
            'bab_satu' => $bab_satu,
            'bab_dua' => $bab_dua,
            'bab_tiga' => $bab_tiga,
            'bab_empat' => $bab_empat,
            'bab_lima' => $bab_lima,
            'revisiData' => $revisiData,
            'idPenguji' => $idPenguji,
            'pengujiNama' => $pengujiNama,
            'hariPenguji' => $hariPenguji,
            'tglPenguji' => $tglPenguji,
            'pukulPenguji' => $pukulPenguji,
            'ruangPenguji' => $ruangPenguji,
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
