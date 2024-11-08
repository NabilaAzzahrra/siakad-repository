<?php

namespace App\Http\Controllers;

use App\Models\Konfigurasi;
use App\Models\KonfigurasiUjian;
use Illuminate\Http\Request;

class KonfigurasiUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konfigurasi = Konfigurasi::first();
        return view('page.konfigurasi_ujian.index')->with([
            'konfigurasi' => $konfigurasi,
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
            'id_tahun_akademik' => $request->input('id_tahun_akademik'),
            'id_keterangan' => $request->input('id_keterangan'),
            'jenis_ujian' => $request->input('jenis_ujian'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_susulan' => $request->input('tgl_susulan'),
        ];

        KonfigurasiUjian::create($data);

        return redirect()
            ->route('konfigurasi_ujian.index')
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
            'jenis_ujian' => $request->input('jenis_ujians'),
            'tgl_mulai' => $request->input('tgl_mulais'),
            'tgl_susulan' => $request->input('tgl_susulans'),
        ];

        $datas = KonfigurasiUjian::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('konfigurasi_ujian.index')
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
