<?php

namespace App\Http\Controllers;

use App\Models\Pembimbing;
use App\Models\PembimbingProject;
use App\Models\PengajuanJudul;
use Illuminate\Http\Request;

class PengajuanJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pembimbing::all();
        $dataPengajuanJudul = PengajuanJudul::all();
        $dosen = PembimbingProject::all();
        return view('page.pengajuan.index')->with([
            'data' => $data,
            'dataPengajuanJudul' => $dataPengajuanJudul,
            'dosen' => $dosen,
        ]);
    }

    public function getPengajuanJudul(Request $request)
    {
        $nim = $request->query('nim');

        if (!$nim) {
            return response()->json([], 200);
        }

        $dataPengajuanJudul = PengajuanJudul::where('nim', $nim)->get();

        return response()->json($dataPengajuanJudul);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pembimbing::findOrFail($id);
        $nim = $data->nim;
        $dataPengajuanJudul = PengajuanJudul::where('nim', $nim)->get();
        return view('page.pengajuan.detail')->with([
            'data' => $data,
            'dataPengajuanJudul' => $dataPengajuanJudul,
        ]);
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
            'verifikasi' => $request->input('verifikasi'),
            'id_dosen' => $request->input('id_dosen')
        ];

        $datas = Pembimbing::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete','Data Hari Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
