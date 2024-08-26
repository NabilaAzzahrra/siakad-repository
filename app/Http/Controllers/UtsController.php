<?php

namespace App\Http\Controllers;

use App\Models\DetailUts;
use App\Models\Jadwalreguler;
use App\Models\KonfigurasiUjian;
use App\Models\Uts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;

class UtsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwalreguler::all();
        return view('page.uts.index')->with([
            'jadwal' => $jadwal
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
        try {
            $id_jadwal = $request->input('id_jadwal');
            $id_uts = date('YmdHis');

            if ($request->hasFile('file')) {
                $utsFile = $request->file('file');
                $utsFileName = $id_uts . '-' . $id_jadwal . '.' . $utsFile->extension();
                $utsFilePath = $utsFile->move(public_path('uts'), $utsFileName);
                $utsFilePath = $utsFileName;
            } else {
                return redirect()->back()->with('error', 'Soal tidak ditemukan');
            }

            $data = [
                'id_jadwal' => $request->input('id_jadwal'),
                'id_uts' => $request->input('id_uts'),
                'tgl_ujian' => $request->input('tgl_ujian'),
                'waktu_ujian' => $request->input('waktu_ujian'),
                'file' => $utsFilePath,
            ];

            Uts::create($data);

            return redirect()
                ->route('uts.index')
                ->with('message', 'Data UTS Sudah ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        $konfigurasi_ujian = KonfigurasiUjian::first();
        return view('page.uts.create')->with([
            'jadwal' => $jadwal,
            'konfigurasi_ujian' => $konfigurasi_ujian
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $uts = Uts::where('id_uts', $id)->first();
        $detail = DetailUts::where('id_uts', $id)->get();
        return view('page.uts.jawaban')->with([
            'uts' => $uts,
            'detail' => $detail
        ]);
    }

    public function downloadZip(Request $request)
    {
        $selectedFiles = explode(',', $request->input('selected_files'));
        $zip = new ZipArchive;

        $zipFileName = 'selected_files.zip';

        // Path sementara untuk menyimpan file zip
        $zipPath = storage_path($zipFileName);

        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            foreach ($selectedFiles as $file) {
                $filePath = public_path('uts/jawaban/' . $file);
                if (File::exists($filePath)) {
                    $zip->addFile($filePath, $file);
                }
            }
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $uts = Uts::findOrFail($id);
        $data = [
            'verifikasi' => true
        ];
        $uts->update($data);

        return redirect()
            ->route('ujian_uts.index')
            ->with('message', 'Data Pukul Sudah diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function jawaban_uts_add(Request $request)
    {
        $kode = $request->input('id_uts');
        $nim = $request->input('nim');

        if ($request->hasFile('file')) {
            $tugasFile = $request->file('file');
            $tugasFileName = $kode . '-' . $nim . '.' . $tugasFile->extension();
            $tugasFilePath = $tugasFile->move(public_path('uts/jawaban/'), $tugasFileName);
            $tugasFilePath = $tugasFileName;
        } else {
            return redirect()->back()->with('error', 'Tugas tidak ditemukan');
        }

        $data = [
            'id_uts' => $kode,
            'nim' => $request->input('nim'),
            'file' => $tugasFilePath,
            'tgl_pengumpulan' => date('Y-m-d'),
        ];

        DetailUts::create($data);

        return back()->with('message_delete', 'Data Jawaban Sudah di upload');
    }
}
