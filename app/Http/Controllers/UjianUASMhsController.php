<?php

namespace App\Http\Controllers;

use App\Models\DetailUas;
use App\Models\Konfigurasi;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Uas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjianUASMhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->email;
        // dd($id);
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $ga = $konfigurasi->keterangan;

        $mahasiswa = Mahasiswa::where('nim', $id)->first();
        $uas = Uas::all();
        $detail_uas = DetailUas::where('nim', $id)->get();

        if ($mahasiswa) {
            $tingkat = $mahasiswa->tingkat;

            $jadwal_reguler = Nilai::with(['mahasiswa', 'jadwal', 'jadwal.detail_kurikulum.materi_ajar.semester'])
                ->where('nim', $id)
                ->whereHas('jadwal.detail_kurikulum.materi_ajar.semester', function ($query) use ($tahun_akademik, $keterangan, $ga, $tingkat) {
                    $query->where('id_tahun_akademik', $tahun_akademik)
                        ->where('id_keterangan', $keterangan);
                    if ($tingkat === 2) {
                        $semester = $ga ? 3 : 4;
                    } elseif ($tingkat === 4) {
                        $semester = $ga ? 5 : 6;
                    } else {
                        $semester = $ga ? 1 : 2;
                    }
                    $query->where('semester', $semester);
                })
                ->get();
        } else {
            $jadwal_reguler = collect();
        }

        return view('page.uas_mhs.index')->with([
            'jadwal_reguler' => $jadwal_reguler,
            'uas' => $uas,
            'detail_uas' => $detail_uas,
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
