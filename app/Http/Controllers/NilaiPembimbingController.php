<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Nilai;
use App\Models\NilaiPembimbing;
use App\Models\NilaiPenguji;
use App\Models\Penguji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiPembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembimbing = Dosen::where('kode_dosen', Auth::user()->email)->first();
        $idPembimbing = $pembimbing->id;
        $data = Penguji::where('id_dosen', $idPembimbing)->paginate(10);
        return view('page.inputNilaiPembimbing.index')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = NilaiPembimbing::paginate(10);
        return view('page.inputNilaiPembimbing.verifikasiNilaiPembimbing')->with([
            'data' => $data
        ]);
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
        $nilaiPembimbing = NilaiPembimbing::findOrFail($id);
        $nim = $nilaiPembimbing->nim;
        $sikap = $nilaiPembimbing->sikap;
        $intensitasKesungguhan = $nilaiPembimbing->intensitas_kesungguhan;
        $kedalamanMateri = $nilaiPembimbing->kedalaman_materi;

        $nilaiPenguji = NilaiPenguji::where('nim', $nim)->first();

        if (!$nilaiPenguji) {
            return back()->with('message_update', 'Data Nilai Penguji Belum Ada');
        } else {
            $verifikasiNilaiPenguji = $nilaiPenguji->verifikasi;

            $penampilan = $nilaiPenguji->penampilan;
            $bahasaAsing = $nilaiPenguji->bahasa_asing;
            $bahasaIndonesia = $nilaiPenguji->bahasa_indonesia;
            $teknikPresentasi = $nilaiPenguji->teknik_presentasi;
            $metodaPenelitian = $nilaiPenguji->metoda_penelitian;
            $penguasaanTeori = $nilaiPenguji->penguasaan_teori;

            if ($verifikasiNilaiPenguji != 'SUDAH') {
                $dataUpdate = [
                    'verifikasi' => 'SUDAH'
                ];
                $datas = NilaiPembimbing::where('nim', $nim)->first();;
                $datas->update($dataUpdate);
            } else {
                $nPembimbing = ($sikap + $intensitasKesungguhan + $kedalamanMateri) / 3;
                $jumlahNilaiPembimbing = (0.6) * $nPembimbing;

                $nPenguji = ($penampilan + $bahasaAsing + $bahasaIndonesia + $teknikPresentasi + $metodaPenelitian + $penguasaanTeori) / 6;
                $jumlahNilaiPenguji = (0.4) * $nPenguji;

                $nilaiAkhir = $jumlahNilaiPembimbing + $jumlahNilaiPenguji;

                $data = [
                    'id_jadwal' => 0,
                    'id_nilai' => uniqid(),
                    'nim' => $nim,
                    'presensi' => $nilaiAkhir,
                    'tugas' => $nilaiAkhir,
                    'formatif' => $nilaiAkhir,
                    'uas' => $nilaiAkhir,
                    'uts' => $nilaiAkhir,
                    'verifikasi' => 1,
                ];

                Nilai::create($data);

                $dataUpdate = [
                    'verifikasi' => 'SUDAH'
                ];
                $datas = NilaiPembimbing::where('nim', $nim)->first();;
                $datas->update($dataUpdate);
                return back()->with('message_update', 'Data Berhasil diupdate');

                //dd($datas);
            }

            return back()->with('message_update', 'Data Berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
