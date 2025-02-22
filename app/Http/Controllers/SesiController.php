<?php

namespace App\Http\Controllers;

use App\Models\Pukul;
use App\Models\Sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pukul = Pukul::all();
        return view('page.sesi.index')->with([
            'pukul' => $pukul,
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
            'sesi' => $request->input('sesi'),
            'id_pukul' => $request->input('id_pukul'),
        ];

        Sesi::create($data);

        return redirect()
            ->route('sesi.index')
            ->with('message_insert', 'Data Sesi Sudah ditambahkan');
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
            'sesi' => $request->input('sesi'),
            'id_pukul' => $request->input('id_pukull'),
        ];

        $datas = Sesi::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('sesi.index')
            ->with('message_update', 'Data Sesi Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Sesi::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Sesi Sudah dihapus');
    }
}
