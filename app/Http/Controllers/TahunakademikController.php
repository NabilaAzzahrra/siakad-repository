<?php

namespace App\Http\Controllers;

use App\Models\Tahunakademik;
use Illuminate\Http\Request;

class TahunakademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.tahunakademik.index');
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
            'tahunakademik' => $request->input('tahunakademik')
        ];

        Tahunakademik::create($data);

        return redirect()
            ->route('tahunakademik.index')
            ->with('message_insert', 'Data Tahun Akademik Sudah ditambahkan');
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
            'tahunakademik' => $request->input('tahunakademik')
        ];

        $datas = Tahunakademik::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('tahunakademik.index')
            ->with('message_update', 'Data Tahun Akademik Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Tahunakademik::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Tahun Akademik Sudah dihapus');
    }
}
