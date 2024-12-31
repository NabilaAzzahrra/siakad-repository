<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.fakultas.index');
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
            'fakultas' => $request->input('fakultas')
        ];

        Fakultas::create($data);

        return redirect()
            ->route('fakultas.index')
            ->with('message', 'Data Fakultas Sudah ditambahkan');
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
            'fakultas' => $request->input('fakultas')
        ];

        $datas = Fakultas::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('fakultas.index')
            ->with('message', 'Data Fakultas Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Fakultas::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Fakultas Sudah dihapus');
    }
}
