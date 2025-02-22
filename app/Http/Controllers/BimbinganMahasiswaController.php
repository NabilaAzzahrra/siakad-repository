<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\NilaiPembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BimbinganMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tahun_angkatan = DB::table('mahasiswa')
            ->select('tahun_angkatan')
            ->distinct()
            ->orderBy('tahun_angkatan', 'desc')
            ->get();

        $jurusan = DB::table('jurusan')
            ->select('id', 'jurusan')
            ->orderBy('jurusan', 'asc')
            ->get();

        $query = DB::table('mahasiswa')
            ->join('bimbingan', 'bimbingan.nim', '=', 'mahasiswa.nim')
            ->leftJoin('kelas', 'kelas.id', '=', 'mahasiswa.id_kelas')
            ->leftJoin('jurusan', 'jurusan.id', '=', 'kelas.id_jurusan')
            ->leftJoin('dosen', 'dosen.id', '=', 'bimbingan.id_dosen')
            ->select(
                'mahasiswa.nim',
                'mahasiswa.id',
                'mahasiswa.nama',
                'mahasiswa.tahun_angkatan',
                DB::raw('COUNT(bimbingan.id) as bimbingan_count'),
                'kelas.kelas as kelas_nama',
                'jurusan.jurusan as jurusan_nama',
                'dosen.nama_dosen'
            )
            ->groupBy(
                'mahasiswa.nim',
                'mahasiswa.id',
                'mahasiswa.nama',
                'mahasiswa.tahun_angkatan',
                'kelas.kelas',
                'jurusan.jurusan',
                'dosen.nama_dosen'
            );

        if ($request->tahun_angkatan) {
            $query->where('mahasiswa.tahun_angkatan', $request->tahun_angkatan);
        }

        if ($request->jurusan) {
            $query->where('jurusan.id', $request->jurusan);
        }

        $data = $query->orderBy('mahasiswa.nama', 'asc')->paginate(10);

        return view('page.bimbingan.index')->with([
            'data' => $data,
            'tahun_angkatan' => $tahun_angkatan,
            'jurusan' => $jurusan,
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
        $data = Bimbingan::where('nim', $id)->get();
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
                'dosen.nama_dosen'
            )
            ->first();
        $nilaiPembimbing = NilaiPembimbing::where('nim', $id)->first();
        if(!$nilaiPembimbing){
            $sikap = 0;
            $intensitasKesungguhan = 0;
            $kedalamanMateri = 0;
        }else{
            $sikap = $nilaiPembimbing->sikap;
            $intensitasKesungguhan = $nilaiPembimbing->intensitas_kesungguhan;
            $kedalamanMateri = $nilaiPembimbing->kedalaman_materi;
        }
        return view('page.bimbingan.detail')->with([
            'data' => $data,
            'dataMahasiswa' => $dataMahasiswa,
            'nilaiPembimbing' => $nilaiPembimbing,
            'sikap' => $sikap,
            'intensitasKesungguhan' => $intensitasKesungguhan,
            'kedalamanMateri' => $kedalamanMateri,
        ]);
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
