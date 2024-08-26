<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
        try {
            $tugas = $request->input('tugas');
            $kode = date('YmdHis');

            dd($tugas);

            if ($request->hasFile('file')) {
                $tugasFile = $request->file('file');
                $tugasFileName = $kode . '-' . $tugas . '.' . $tugasFile->extension();
                $tugasFilePath = $tugasFile->move(public_path('tugas'), $tugasFileName);
                $tugasFilePath = $tugasFileName;
            } else {
                return redirect()->back()->with('error', 'E-Book tidak ditemukan');
            }

            $data = [
                'id_tugas' => $kode,
                'id_presensi' => $request->input('id_presensi'),
                'deadline' => $request->input('deadline'),
                'file_tugas' => $tugasFilePath,
            ];

            Tugas::create($data);

            return redirect()
                ->route('jadwal_reguler.index')
                ->with('message', 'Data presensi telah berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        // foreach ($request->nim as $key => $nim) {
        //     $detailPresensi = new DetailPresensi();
        //     $detailPresensi->id_presensi = $presensiId;
        //     $detailPresensi->nim = $nim;
        //     $detailPresensi->keterangan = $request->keterangan[$key];
        //     // Simpan detail presensi
        //     $detailPresensi->save();
        // }

        // return redirect()
        //     ->route('jadwal_reguler.index')
        //     ->with('message', 'Data presensi telah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $presensi = Presensi::where('id_presensi', $id)->first();
        return view('page.tugas.index')->with([
            'presensi' => $presensi,
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
