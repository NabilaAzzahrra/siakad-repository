<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keterangan = Keterangan::all();
        return view('page.semester.index')->with([
            'keterangan' => $keterangan,
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
            'semester' => $request->input('semester'),
            'id_keterangan' => $request->input('id_keterangan')
        ];

        Semester::create($data);

        return redirect()
            ->route('semester.index')
            ->with('message', 'Data Semester Sudah ditambahkan');
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
            'semester' => $request->input('semester'),
            'id_keterangan' => $request->input('id_keterangan')
        ];

        $datas = Semester::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('semester.index')
            ->with('message', 'Data Semester Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Semester::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Semester Sudah dihapus');
    }
}
