<?php

namespace App\Http\Controllers;

use App\Models\DetailUas;
use App\Models\Jadwalreguler;
use App\Models\KonfigurasiUjian;
use App\Models\Uas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;

class UasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwalreguler::all();
        return view('page.uas.index')->with([
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
            $id_uas = date('YmdHis');

            if ($request->hasFile('file')) {
                $uasFile = $request->file('file');
                $uasFileName = $id_uas . '-' . $id_jadwal . '.' . $uasFile->extension();
                $uasFilePath = $uasFile->move(public_path('uas'), $uasFileName);
                $uasFilePath = $uasFileName;
            } else {
                return redirect()->back()->with('error', 'Soal tidak ditemukan');
            }

            $data = [
                'id_jadwal' => $request->input('id_jadwal'),
                'id_uas' => $request->input('id_uas'),
                'tgl_ujian' => $request->input('tgl_ujian'),
                'waktu_ujian' => $request->input('waktu_ujian'),
                'file' => $uasFilePath,
            ];

            Uas::create($data);

            return redirect()
                ->route('uas.index')
                ->with('message', 'Data UAS Sudah ditambahkan');
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
        return view('page.uas.create')->with([
            'jadwal' => $jadwal,
            'konfigurasi_ujian' => $konfigurasi_ujian
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $uas = Uas::where('id_uas', $id)->first();
        $detail = DetailUas::where('id_uas', $id)->get();
        return view('page.uas.jawaban')->with([
            'uas' => $uas,
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
                $filePath = public_path('uas/jawaban/' . $file);
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
        $uas = Uas::findOrFail($id);
        $data = [
            'verifikasi' => true
        ];
        $uas->update($data);

        return redirect()
            ->route('ujian_uas.index')
            ->with('message', 'Data Pukul Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function jawaban_uas_add(Request $request)
    {
        $konfigurasiUjian = KonfigurasiUjian::first();
        if (!$konfigurasiUjian) {
            return redirect()->back()->with('error', 'Konfigurasi ujian tidak ditemukan');
        }

        $tgl_susulan = $konfigurasiUjian->tgl_susulan;
        $now = date('Y-m-d');

        $kode = $request->input('id_uas');
        $nim = $request->input('nim');

        if ($request->hasFile('file')) {
            $tugasFile = $request->file('file');
            $tugasFileName = $kode . '-' . $nim . '.' . $tugasFile->extension();

            // Pilih lokasi penyimpanan berdasarkan tanggal saat ini
            if ($now < $tgl_susulan) {
                $kategori = "UTAMA";
                $fileLocation = 'uas/jawaban/' . $tugasFileName;
                $tugasFile->move(public_path('uas/jawaban/'), $tugasFileName);
            } else {
                $kategori = "SUSULAN";
                $fileLocation = 'uas/cadangan/jawaban/' . $tugasFileName;
                $tugasFile->move(public_path('uas/cadangan/jawaban/'), $tugasFileName);
            }
        } else {
            return redirect()->back()->with('error', 'Tugas tidak ditemukan');
        }

        $data = [
            'id_uas' => $kode,
            'nim' => $nim,
            'file' => $fileLocation,
            'kategori' => $kategori,
            'tgl_pengumpulan' => $now,
        ];

        DetailUas::create($data);

        return back()->with('message_delete', 'Data Jawaban Sudah di upload');
    }
}
