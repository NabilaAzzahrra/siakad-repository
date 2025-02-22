<?php

namespace App\Http\Controllers;

use App\Models\Pukul;
use Illuminate\Http\Request;

class PukulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page/pukul/index');
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
            'pukul' => $request->input('pukul')
        ];

        Pukul::create($data);

        return redirect()
            ->route('pukul.index')
            ->with('message_insert', 'Data Pukul Sudah ditambahkan');
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
            'pukul' => $request->input('pukul')
        ];

        $datas = Pukul::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('pukul.index')
            ->with('message_update', 'Data Pukul Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pukul::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Pukul Sudah dihapus');
    }
}
