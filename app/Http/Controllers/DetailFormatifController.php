<?php

namespace App\Http\Controllers;

use App\Models\DetailFormatif as ModelsDetailFormatif;
use Illuminate\Http\Request;
use ZipArchive;

class DetailFormatifController extends Controller
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

        // dd($request->all());
        try {
            $nim = $request->input('nim');
            $id_formatif = $request->input('id_formatif');
            $kode = date('YmdHis');

            if ($request->hasFile('jawaban')) {
                $formatifFile = $request->file('jawaban');
                $formatifFileName = $kode . '-' . $nim . '.' . $formatifFile->extension();
                $formatifFile->move(public_path('formatif/jawaban'), $formatifFileName);
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan');
            }

            $data = [
                'id_formatif' => $id_formatif,
                'nim' => $nim,
                'tgl_pengumpulan' => date('Y-m-d'),
                'jawaban' => $formatifFileName,
            ];

            ModelsDetailFormatif::create($data);
            return back()->with('message_delete', 'Data Formatif Sudah Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function downloadZip($id_formatif)
    {
        $files = ModelsDetailFormatif::where('id_formatif', $id_formatif)->pluck('jawaban'); // Pastikan 'jawaban' menyimpan path file

        if ($files->isEmpty()) {
            return back()->with('error', 'Tidak ada file untuk diunduh.');
        }

        $zipFileName = 'jawaban_formatif_' . $id_formatif . '.zip';
        $zipPath = public_path($zipFileName); // Simpan ZIP di public

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($files as $file) {
                $filePath = public_path('formatif/jawaban/' . $file); // Sesuaikan dengan lokasi file
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($file));
                }
            }
            $zip->close();
        } else {
            return back()->with('error', 'Gagal membuat ZIP file.');
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $formatif = ModelsDetailFormatif::where('id', $id)->first();
        return view('page.jadwalreguler.jawaban')->with([
            'formatif' => $formatif,
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
        $formatif = ModelsDetailFormatif::find($id);

        if (!$formatif) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $formatif->nim = $request->input('nim_update');
        // $formatif->jawaban = $request->input('jawaban_update');

        // Simpan nama file ebook lama untuk referensi
        $oldJawaban = $request->input('jawaban_sebelumnya');;

        $ko = date('YmdHis');
        $nim = $request->input('nim_update');
        // Jika ada file ebook yang diunggah
        if ($request->hasFile('jawaban_update')) {
            // Hapus ebook lama jika ada
            if ($oldJawaban && file_exists(public_path('formatif/jawaban/' . $oldJawaban))) {
                unlink(public_path('formatif/jawaban/' . $oldJawaban));
            }

            $file = $request->file('jawaban_update');
            $filename = $ko . '-' . $nim . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('formatif/jawaban'), $filename);

            $formatif->jawaban = $filename;
        }

        // Simpan perubahan ke database
        $formatif->save();

        return back()->with('message_delete', 'Data Formatif Sudah Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formatif = ModelsDetailFormatif::find($id);

        if ($formatif) {
            if ($formatif->jawaban && file_exists(public_path('formatif/jawaban/' . $formatif->jawaban))) {
                unlink(public_path('formatif/jawaban/' . $formatif->jawaban));
            }
            $formatif->delete();
            return back()->with('message_delete', 'Data Informasi Sudah dihapus');
        } else {
            return back()->with('error', 'Data tidak ditemukan.');
        }
    }
}
