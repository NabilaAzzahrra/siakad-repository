<?php

namespace App\Http\Controllers;

use App\Models\Revisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $nim = Auth::user()->email;
        $kode = date('YmdHis');

        if ($request->hasFile('file')) {
            $pengajuanFile = $request->file('file');
            $pengajuanFileName = $kode . '-' . $nim . '.' . $pengajuanFile->extension();
            $pengajuanFilePath = $pengajuanFile->move(public_path('revisi'), $pengajuanFileName);
            $pengajuanFilePath = $pengajuanFileName;
        } else {
            return redirect()->back()->with('error', 'Bab 1 tidak ditemukan');
        }

        $dataFile = [
            'nim' => Auth::user()->email,
            'id_dosen' => $request->input('id_dosen'),
            'file' => $pengajuanFilePath,
            'verifikasi' => 'BELUM',
        ];

        Revisi::create($dataFile);

        return back()->with('message_delete', 'Data Sesi Sudah ditambahkan');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
