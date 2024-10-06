<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrsMhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konfigurasi = Konfigurasi::first();
        $id_keterangan = $konfigurasi->id_keterangan;
        $id_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $jadwal = Jadwalreguler::whereHas('kelas.jurusan', function ($query) {
            $query->where('id_jurusan', Auth::user()->mahasiswa->kelas->jurusan->id);
        })->where('id_keterangan', $id_keterangan)->where('id_tahun_akademik', $id_tahun_akademik)->with('kelas.jurusan')->get();
        $nilai = Nilai::where('nim', Auth::user()->email)->get();
        // dd($jadwal);
        return view('page.krs_mhs.index')->with([
            'jadwal' => $jadwal,
            'nilai' => $nilai,
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
        $nim = $request->input('nim');
        $id_jadwal = $request->input('user_id');

        if ($id_jadwal && is_array($id_jadwal)) {
            $data = array_map(function ($id_jadwal) use ($nim) {
                return [
                    'id_jadwal' => $id_jadwal,
                    'id_nilai' => uniqid(),
                    'nim' => $nim,
                    'presensi' => 0,
                    'tugas' => 0,
                    'formatif' => 0,
                    'uts' => 0,
                    'uas' => 0,
                ];
            }, $id_jadwal);

            Nilai::insert($data);

            return redirect()
                ->route('jadwal_reguler.jadwal_mhs', $nim)
                ->with('message', 'BERHASIL KRS');
        } else {
            return back()->with('message_delete', 'Data Materi Ajar Kurikulum Gagal ditambahkan');
        }
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
