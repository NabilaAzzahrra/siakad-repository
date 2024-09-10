<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Materiajar;
use App\Models\Semester;
use Illuminate\Http\Request;

class MateriajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semester = Semester::all();
        $jurusan = Jurusan::all();
        return view('page.materi_ajar.index')->with([
            'semester' => $semester,
            'jurusan' => $jurusan,
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
        $materi = $request->input('materi_ajar');
        $kode = date('YmdHis');

        if ($request->hasFile('ebook')) {
            $ebookFile = $request->file('ebook');
            $ebookFileName = $kode . '-' . $materi . '.' . $ebookFile->extension();
            $ebookFilePath = $ebookFile->move(public_path('uploads'), $ebookFileName);
            $ebookFilePath = $ebookFileName;
        } else {
            return redirect()->back()->with('error', 'E-Book tidak ditemukan');
        }

        $data = [
            'materi_ajar' => $request->input('materi_ajar'),
            'sks' => $request->input('sks'),
            'id_semester' => $request->input('id_semester'),
            'id_jurusan' => $request->input('id_jurusan'),
            'ebook' => $ebookFilePath,
        ];

        Materiajar::create($data);

        return redirect()
            ->route('materi_ajar.index')
            ->with('message', 'Data Materi Ajar Sudah ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materi_ajar = Materiajar::join('semester', 'semester.id', '=', 'materi_ajar.id_semester')
            ->where('materi_ajar.id', $id)
            ->select('semester.*', 'materi_ajar.*')
            ->first();
        return view('page.materi_ajar.ebook')->with([
            'materi_ajar' => $materi_ajar,
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

        $materi_ajar = Materiajar::find($id);

        if (!$materi_ajar) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $materi_ajar->materi_ajar = $request->input('materi_ajar');
        $materi_ajar->sks = $request->input('sks');
        $materi_ajar->id_semester = $request->input('id_semesterl');
        $materi_ajar->id_jurusan = $request->input('id_jurusanl');

        // Simpan nama file ebook lama untuk referensi
        $oldEbook = $materi_ajar->ebook;

        $ko = date('YmdHis');
        $materi = $request->input('materi_ajar');
        // Jika ada file ebook yang diunggah
        if ($request->hasFile('ebook')) {
            // Hapus ebook lama jika ada
            if ($oldEbook && file_exists(public_path('uploads/' . $oldEbook))) {
                unlink(public_path('uploads/' . $oldEbook));
            }

            $file = $request->file('ebook');
            $filename = $ko . '-'. $materi . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            $materi_ajar->ebook = $filename;
        }

        // Simpan perubahan ke database
        $materi_ajar->save();

        return redirect()
            ->route('materi_ajar.index')
            ->with('message', 'Data Materi Ajar Sudah diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Materiajar::findOrFail($id);
        if ($data->ebook && file_exists(public_path('uploads/' . $data->ebook))) {
            unlink(public_path('uploads/' . $data->ebook));
        }
        $data->delete();
        return back()->with('message_delete', 'Data Materi Ajar Sudah dihapus');
    }
}
