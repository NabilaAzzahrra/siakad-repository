<?php

namespace App\Http\Controllers;

use App\Models\DetailTugas;
use App\Models\Presensi;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use ZipArchive;

class TugasPertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $tugas = Tugas::where('id', $id)->first();
        return view('page.tugas.tugas_show')->with([
            'tugas' => $tugas,
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
            $tugas = $request->input('tugas');
            $kode = date('YmdHis');

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

            if (Auth::user()->role == 'A') {
                return redirect()
                    ->route('jadwal_reguler.index')
                    ->with('message', 'Data presensi telah berhasil ditambahkan.');
            } else {
                return redirect()
                    ->route('jadwal_reguler.jadwal_dosen', Auth::user()->email)
                    ->with('message', 'Data presensi telah berhasil ditambahkan.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $presensi = Presensi::where('id_presensi', $id)->first();
        $tugas = Tugas::where('id_presensi', $id)->get();
        $detail_tugas = DetailTugas::all();
        return view('page.tugas.index')->with([
            'presensi' => $presensi,
            'tugas' => $tugas,
            'detail_tugas' => $detail_tugas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tugas = DetailTugas::where('id_tugas', $id)->get();
        return view('page.tugas.jawaban')->with([
            'tugas' => $tugas,
        ]);
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
        $data = Tugas::where('id_tugas', $id)->get();

        $relatedTasks = DetailTugas::where('id_tugas', $id)->get();

        foreach ($relatedTasks as $task) {
            if ($task->file && file_exists(public_path('tugas/jawaban/' . $task->file))) {
                unlink(public_path('tugas/jawaban/' . $task->file));
            }
            $task->delete();
        }

        foreach ($data as $d) {
            if ($d->file_tugas && file_exists(public_path('tugas/' . $d->file_tugas))) {
                unlink(public_path('tugas/' . $d->file_tugas));
            }
            $d->delete();
        }
        return back()->with('message_delete', 'Data Tugas Sudah dihapus');
    }

    public function tugas_add(Request $request)
    {
        $kode = $request->input('id_tugas');
        $nim = $request->input('nim');

        if ($request->hasFile('file')) {
            $tugasFile = $request->file('file');
            $tugasFileName = $kode . '-' . $nim . '.' . $tugasFile->extension();
            $tugasFilePath = $tugasFile->move(public_path('tugas/jawaban/'), $tugasFileName);
            $tugasFilePath = $tugasFileName;
        } else {
            return redirect()->back()->with('error', 'Tugas tidak ditemukan');
        }

        $data = [
            'id_tugas' => $kode,
            'nim' => $request->input('nim'),
            'file' => $tugasFilePath,
        ];

        DetailTugas::create($data);

        return back()->with('message_delete', 'Data Tugas Sudah di upload');
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
                $filePath = public_path('tugas/jawaban/' . $file);
                if (File::exists($filePath)) {
                    $zip->addFile($filePath, $file);
                }
            }
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    public function tugas_show(string $id)
    {
        $tugas = Tugas::where('id', $id)->first();
        return view('page.tugas.tugas_show')->with([
            'tugas' => $tugas,
        ]);
    }
}
