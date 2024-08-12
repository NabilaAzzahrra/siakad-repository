<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.perhitungan.index');
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
            'nama_perhitungan' => $request->input('nama_perhitungan'),
            'presensi' => $request->input('presensi'),
            'tugas' => $request->input('tugas'),
            'formatif' => $request->input('formatif'),
            'uts' => $request->input('uts'),
            'uas' => $request->input('uas')
        ];

        Perhitungan::create($data);

        return redirect()
            ->route('perhitungan.index')
            ->with('message', 'Data Perhitungan Sudah ditambahkan');
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
            'nama_perhitungan' => $request->input('nama_perhitungan'),
            'presensi' => $request->input('presensi'),
            'tugas' => $request->input('tugas'),
            'formatif' => $request->input('formatif'),
            'uts' => $request->input('uts'),
            'uas' => $request->input('uas')
        ];

        $datas = Perhitungan::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('perhitungan.index')
            ->with('message', 'Data Perhitungan Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Perhitungan::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Perhitungan Sudah dihapus');
    }
}
