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


    public function downloadZip(Request $request)
    {
        $selectedFiles = explode(',', $request->input('selected_files'));

        $zipFileName = 'selected_files.zip';
        $zipPath = public_path($zipFileName);
        $zip = new ZipArchive;

        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            foreach ($selectedFiles as $file) {
                $filePath = public_path('formatif/jawaban/' . $file);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, $file);
                }
            }
            $zip->close();
        }

        if (file_exists($zipPath)) {
            return response()->download($zipPath)->deleteFileAfterSend(true);
        } else {
            return response()->json(['error' => 'Failed to create zip file.'], 500);
        }
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
            return redirect()->route('jadwal_reguler.index')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('jadwal_reguler.index')->with('error', 'Data tidak ditemukan.');
        }
    }
}
