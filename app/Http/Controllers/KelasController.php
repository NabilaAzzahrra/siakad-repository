<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        $dosen = Dosen::all();
        return view('page.kelas.index')->with([
            'jurusan' => $jurusan,
            'dosen' => $dosen,
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
            'kelas' => $request->input('kelas'),
            'id_jurusan' => $request->input('id_jurusan'),
            'id_dosen' => $request->input('id_dosen'),
        ];

        Kelas::create($data);

        return redirect()
            ->route('kelas.index')
            ->with('message_insert', 'Data Kelas Sudah ditambahkan');
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
            'kelas' => $request->input('kelas'),
            'id_jurusan' => $request->input('id_jurusann'),
            'id_dosen' => $request->input('id_dosenn'),
        ];

        $datas = Kelas::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('kelas.index')
            ->with('message_update', 'Data Kelas Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kelas::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Kelas Sudah dihapus');
    }
}
