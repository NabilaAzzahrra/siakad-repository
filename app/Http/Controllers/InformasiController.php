<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasi = Informasi::paginate(2);
        return view('page.informasi.index')->with([
            'informasi' => $informasi
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
            'judul' => $request->input('judul'),
            'informasi' => $request->input('informasi'),
            'kategori' => $request->input('kategori'),
        ];

        Informasi::create($data);

        return redirect()
            ->route('informasi.index')
            ->with('message', 'Data Informasi Sudah ditambahkan');
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
            'judul' => $request->input('judul'),
            'informasi' => $request->input('informasi'),
            'kategori' => $request->input('kategoris'),
        ];

        $datas = Informasi::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('informasi.index')
            ->with('message', 'Data Informasi Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Informasi::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Informasi Sudah dihapus');
    }
}
