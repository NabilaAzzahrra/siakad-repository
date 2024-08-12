<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use Illuminate\Http\Request;

class KeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.keterangan.index');
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
            'keterangan' => $request->input('keterangan')
        ];

        Keterangan::create($data);

        return redirect()
            ->route('keterangan.index')
            ->with('message', 'Data Keterangan Sudah ditambahkan');
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
            'keterangan' => $request->input('keterangan')
        ];

        $datas = Keterangan::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('keterangan.index')
            ->with('message', 'Data Keterangan Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Keterangan::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Keterangan Sudah dihapus');
    }
}
