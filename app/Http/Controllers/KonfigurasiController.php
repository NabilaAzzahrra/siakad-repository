<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use App\Models\Konfigurasi;
use App\Models\Kurikulum;
use App\Models\Perhitungan;
use App\Models\Tahunakademik;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun_akademik = Tahunakademik::all();
        $keterangan = Keterangan::all();
        $kurikulum = Kurikulum::all();
        $perhitungan = Perhitungan::all();
        $konfigurasi=Konfigurasi::all();
        return view('page.konfigurasi.index')->with([
            'tahun_akademik'=>$tahun_akademik,
            'keterangan'=>$keterangan,
            'kurikulum'=>$kurikulum,
            'perhitungan'=>$perhitungan,
            'konfigurasi'=>$konfigurasi,
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
            'id_tahun_akademik' => $request->input('tahun_akademik'),
            'id_keterangan' => $request->input('keterangan'),
            'id_kurikulum' => $request->input('kurikulum'),
            'id_perhitungan' => $request->input('perhitungan'),
            'jml_pertemuan' => $request->input('jml_pertemuan'),
        ];

        Konfigurasi::create($data);

        return redirect()
            ->route('konfigurasi.index')
            ->with('message', 'Data Konfigurasi Sudah ditambahkan');
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
        $data = [
            'id_tahun_akademik' => $request->input('id_tahun_akademiks'),
            'id_keterangan' => $request->input('id_keterangans'),
            'id_kurikulum' => $request->input('id_kurikulums'),
            'id_perhitungan' => $request->input('id_perhitungans'),
            'jml_pertemuan' => $request->input('jml_pertemuan'),
        ];

        $datas = Konfigurasi::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('konfigurasi.index')
            ->with('message', 'Data Konfigurasi Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
