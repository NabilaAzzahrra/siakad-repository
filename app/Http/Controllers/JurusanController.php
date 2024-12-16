<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('page.jurusan.index')->with([
            'fakultas' => $fakultas
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
            'jurusan' => $request->input('jurusan'),
            'id_fakultas' => $request->input('fakultas')
        ];

        Jurusan::create($data);

        return redirect()
            ->route('jurusan.index')
            ->with('message', 'Data Jurusan Sudah ditambahkan');
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
            'jurusan' => $request->input('jurusan'),
            'id_fakultas' => $request->input('fakultass')
        ];

        $datas = Jurusan::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('jurusan.index')
            ->with('message', 'Data Jurusan Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Jurusan::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Jurusan Sudah dihapus');
    }
}
