<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use Illuminate\Http\Request;

class HariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.hari.index');
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
            'hari' => $request->input('hari')
        ];

        Hari::create($data);

        return redirect()
            ->route('hari.index')
            ->with('message_insert', 'Data Sudah ditambahkan');
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
            'hari' => $request->input('hari')
        ];

        $datas = Hari::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('hari.index')
            ->with('message_update', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Hari::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Sudah dihapus');
    }
}
