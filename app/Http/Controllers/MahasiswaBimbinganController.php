<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Dosen;
use App\Models\FilePengajuanProject;
use App\Models\Mahasiswa;
use App\Models\NilaiPembimbing;
use App\Models\Pembimbing;
use App\Models\PembimbingProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MahasiswaBimbinganController extends Controller
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

        return view('page.mahasiswaBimbingan.index')->with([
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
        $pembimbing = Dosen::where('kode_dosen', Auth::user()->email)->first();
        $idPembimbing = $pembimbing->id;
        $data = [
            'nim' => $request->input('nim'),
            'id_pembimbing' => $idPembimbing,
            'sikap' => $request->input('sikap'),
            'intensitas_kesungguhan' => $request->input('intensitasKesungguhan'),
            'kedalaman_materi' => $request->input('kedalamanMateri'),
            'verifikasi' => 'SUDAH',
        ];

        NilaiPembimbing::create($data);

        return back()->with('message_input', 'Data Sudah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*$data = Bimbingan::where('nim', $id)->get();
        $pengajuan = FilePengajuanProject::where('nim', $id)->first();
        $dataMahasiswa = DB::table('mahasiswa')
            ->leftJoin('bimbingan', 'bimbingan.nim', '=', 'mahasiswa.nim')
            ->leftJoin('kelas', 'kelas.id', '=', 'mahasiswa.id_kelas')
            ->leftJoin('jurusan', 'jurusan.id', '=', 'kelas.id_jurusan')
            ->leftJoin('dosen', 'dosen.id', '=', 'bimbingan.id_dosen')
            ->select(
                'mahasiswa.nim',
                'mahasiswa.id',
                'mahasiswa.nama',
                'mahasiswa.id_kelas',
                'kelas.id as kelas_id', // Specify columns from kelas explicitly
                'kelas.kelas as kelas_nama',
                'kelas.id_jurusan',
                'jurusan.id as jurusan_id', // Specify columns from jurusan explicitly
                'jurusan.jurusan as jurusan_nama',
                'dosen.nama_dosen',
            )
            ->first();*/
        $dataFile = FilePengajuanProject::where('nim', $id)->first();
        $dataMahasiswa = Mahasiswa::where('nim', $id)->first();
        $data = Bimbingan::where('nim', $id)->get();
        $pengajuan = FilePengajuanProject::where('nim', $id)->first();

        $nilaiPembimbing = NilaiPembimbing::where('nim', $id)->first();

        if(!$nilaiPembimbing){
            $formNilai = '';
            $tableNilai = 'hidden';
            $sikap ='';
            $intensitasKesungguhan ='';
            $kedalamanMateri ='';
            $verifikasi ='';
        }else{
            $formNilai = 'hidden';
            $tableNilai = '';
            $sikap = $nilaiPembimbing->sikap;
            $intensitasKesungguhan = $nilaiPembimbing->intensitas_kesungguhan;
            $kedalamanMateri = $nilaiPembimbing->kedalaman_materi;
            $verifikasi = $nilaiPembimbing->verifikasi;
        }

        return view('page.mahasiswaBimbingan.detail')->with([
            /*'data' => $data,
            'dataMahasiswa' => $dataMahasiswa,
            'pengajuan' => $pengajuan,*/
            'dataFile' => $dataFile,
            'dataMahasiswa' => $dataMahasiswa,
            'data' => $data,
            'pengajuan' => $pengajuan,
            'formNilai' => $formNilai,
            'tableNilai' => $tableNilai,
            'sikap' => $sikap,
            'intensitasKesungguhan' => $intensitasKesungguhan,
            'kedalamanMateri' => $kedalamanMateri,
            'verifikasi' => $verifikasi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function verifikasi(Request $request, string $id)
    {
        // Temukan data berdasarkan ID
        $datas = Bimbingan::findOrFail($id);

        // Periksa status verifikasi saat ini dan ubah
        $datas->verifikasi = $datas->verifikasi === "SUDAH" ? "BELUM" : "SUDAH";

        // Simpan perubahan
        $datas->save();

        // Redirect dengan pesan sukses
        return back()->with('message_delete', 'Data Sudah diupdate');
    }


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
