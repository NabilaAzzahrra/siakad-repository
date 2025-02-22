<?php

namespace App\Http\Controllers;

use App\Models\DetailRevisi;
use App\Models\Dosen;
use App\Models\NilaiPenguji;
use App\Models\Penguji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SidangMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penguji = Dosen::where('kode_dosen', Auth::user()->email)->first();
        $idPenguji = $penguji->id;
        $data = Penguji::where('id_penguji', $idPenguji)->paginate(10);
        return view('page.sidangMahasiswa.index')->with([
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
        $data = [
            'kode_sidang' => date('YmdHis'),
            'nim' => $request->input('nim'),
            'bab_satu' => $request->input('bab_satu'),
            'bab_dua' => $request->input('bab_dua'),
            'bab_tiga' => $request->input('bab_tiga'),
            'bab_empat' => $request->input('bab_empat'),
            'bab_lima' => $request->input('bab_lima'),
        ];
        DetailRevisi::create($data);
        return back()->with('message_delete', 'Data Sesi Sudah dihapus');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Penguji::where('nim', $id)->first();
        // dd('ini');
        $dataRevisi = DetailRevisi::where('nim', $id)->first();
        $nilaiPenguji = NilaiPenguji::where('nim', $id)->first();
        if (!$dataRevisi) {
            $revisiForm = '';
            $revisiTable = 'hidden';
            $babSatu = '';
            $babDua = '';
            $babTiga = '';
            $babEmpat = '';
            $babLima = '';
        } else {
            $revisiForm = 'hidden';
            $revisiTable = '';
            $babSatu = $dataRevisi->bab_satu;
            $babDua = $dataRevisi->bab_dua;
            $babTiga = $dataRevisi->bab_tiga;
            $babEmpat = $dataRevisi->bab_empat;
            $babLima = $dataRevisi->bab_lima;
        }

        if (!$nilaiPenguji) {
            $nilaiForm = '';
            $nilaiTable = 'hidden';
            $penampilan = '';
            $bahasaAsing = '';
            $bahasaIndonesia = '';
            $metodaPenelitian = '';
            $penguasaanTeori = '';
            $teknikPresentasi = '';
        } else {
            $nilaiForm = 'hidden';
            $nilaiTable = '';
            $penampilan = $nilaiPenguji->penampilan;
            $bahasaAsing = $nilaiPenguji->bahasa_asing;
            $bahasaIndonesia = $nilaiPenguji->bahasa_indonesia;
            $metodaPenelitian = $nilaiPenguji->metoda_penelitian;
            $penguasaanTeori = $nilaiPenguji->penguasaan_teori;
            $teknikPresentasi = $nilaiPenguji->teknik_presentasi;
        }
        return view('page.sidangMahasiswa.show')->with([
            'data' => $data,
            'babSatu' => $babSatu,
            'babDua' => $babDua,
            'babTiga' => $babTiga,
            'babEmpat' => $babEmpat,
            'babLima' => $babLima,
            'revisiForm' => $revisiForm,
            'revisiTable' => $revisiTable,
            'penampilan' => $penampilan,
            'bahasaAsing' => $bahasaAsing,
            'bahasaIndonesia' => $bahasaIndonesia,
            'metodaPenelitian' => $metodaPenelitian,
            'penguasaanTeori' => $penguasaanTeori,
            'teknikPresentasi' => $teknikPresentasi,
            'nilaiForm' => $nilaiForm,
            'nilaiTable' => $nilaiTable,
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
