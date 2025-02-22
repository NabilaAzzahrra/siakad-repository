<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Nilai;
use App\Models\NilaiPembimbing;
use App\Models\NilaiPenguji;
use App\Models\Penguji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiPengujiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = NilaiPenguji::paginate(10);
        return view('page.inputNilaiPenguji.index')->with([
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
        $penguji = Dosen::where('kode_dosen', Auth::user()->email)->first();
        $idPenguji = $penguji->id;
        $data = [
            'nim' => $request->input('nim'),
            'id_penguji' => $idPenguji,
            'penampilan' => $request->input('penampilan'),
            'bahasa_asing' => $request->input('bahasaAsing'),
            'bahasa_indonesia' => $request->input('bahasaIndonesia'),
            'teknik_presentasi' => $request->input('teknikPresentasi'),
            'metoda_penelitian' => $request->input('metodaPenelitian'),
            'penguasaan_teori' => $request->input('penguasaanTugas'),
            'verifikasi' => 'BELUM',
        ];

        NilaiPenguji::create($data);

        return back()->with('message_input', 'Data Kelas Sudah ditambahkan');
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
        //dd('iniii');
        $nilaiPenguji = NilaiPenguji::findOrFail($id);
        $nim = $nilaiPenguji->nim;

        $penampilan = $nilaiPenguji->penampilan;
        $bahasaAsing = $nilaiPenguji->bahasa_asing;
        $bahasaIndonesia = $nilaiPenguji->bahasa_indonesia;
        $teknikPresentasi = $nilaiPenguji->teknik_presentasi;
        $metodaPenelitian = $nilaiPenguji->metoda_penelitian;
        $penguasaanTeori = $nilaiPenguji->penguasaan_teori;

        $nilaiPembimbing = NilaiPembimbing::where('nim', $nim)->first();
        $verifikasiNilaiPembimbing = $nilaiPembimbing->verifikasi;

        $sikap = $nilaiPembimbing->sikap;
        $intensitasKesungguhan = $nilaiPembimbing->intensitas_kesungguhan;
        $kedalamanMateri = $nilaiPembimbing->kedalaman_materi;

        if ($verifikasiNilaiPembimbing != 'SUDAH') {
            $dataUpdate = [
                'verifikasi' => 'SUDAH'
            ];
            $datas = NilaiPenguji::where('nim', $nim)->first();
            $datas->update($dataUpdate);
        } else {
            $nPenguji = ($penampilan + $bahasaAsing + $bahasaIndonesia + $teknikPresentasi + $metodaPenelitian + $penguasaanTeori) / 6;
            $jumlahNilaiPenguji = (0.4) * $nPenguji;

            $nPembimbing = ($sikap + $intensitasKesungguhan + $kedalamanMateri) / 3;
            $jumlahNilaiPembimbing = (0.6) * $nPembimbing;

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
            $datas = NilaiPenguji::where('nim', $nim)->first();
            $datas->update($dataUpdate);
            return back()->with('message_update', 'Data Berhasil diupdate');
        }
        //dd($nim);
        return back()->with('message_update', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
