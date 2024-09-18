<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\Uas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjianUASController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwalreguler::all();
        $uas = Uas::all();
        return view('page.uas.index')->with([
            'jadwal' => $jadwal,
            'uas' => $uas,
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

                $data = [
                    'id_jadwal' => $request->input('id_jadwal'),
                    'id_uas' => $id_uas,
                    'tgl_ujian' => $request->input('tgl_ujian'),
                    'waktu_ujian' => $request->input('waktu_ujian'),
                    'file' => $uasFilePath,
                ];

                Uas::create($data);
            } else {
                return redirect()->back()->with('error', 'Soal tidak ditemukan');

                $data = [
                    'id_jadwal' => $request->input('id_jadwal'),
                    'id_uas' => $id_uas,
                    'tgl_ujian' => $request->input('tgl_ujian'),
                    'waktu_ujian' => $request->input('waktu_ujian'),
                    'file' => $utsFilePath,
                ];

                Uas::create($data);
            }

            if (Auth::user()->role == 'A') {
                return redirect()
                    ->route('ujian_uas.index')
                    ->with('message', 'Data UAS Sudah ditambahkan');
            } else {
                return redirect()
                    ->route('ujian_uas.ujian_uas_dosen', Auth::user()->email)
                    ->with('message', 'Data UAS Sudah diupdate');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $uas = Uas::where('id', $id)->first();
        return view('page.uas.edit')->with([
            'uas' => $uas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $uas = Uas::find($id);

        if (!$uas) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $uas->tgl_ujian = $request->input('tgl_ujian');
        $uas->waktu_ujian = $request->input('waktu_ujian');

        // Simpan nama file ebook lama untuk referensi
        $oldUas = $uas->file;

        $ko = $request->input('id_jadwal');
        $id_uas = $request->input('id_uas');
        // Jika ada file ebook yang diunggah
        if ($request->hasFile('file')) {
            // Hapus ebook lama jika ada
            if ($oldUas && file_exists(public_path('uas/' . $oldUas))) {
                unlink(public_path('uas/' . $oldUas));
            }

            $file = $request->file('file');
            $filename = $ko . '-' . $id_uas . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uas'), $filename);

            $uas->file = $filename;
        }

        // Simpan perubahan ke database
        $uas->save();

        if (Auth::user()->role == 'A') {
            return redirect()
                ->route('ujian_uas.index')
                ->with('message', 'Data UAS Sudah diupdate');
        } else {
            return redirect()
                ->route('ujian_uas.ujian_uas_dosen', Auth::user()->email)
                ->with('message', 'Data UAS Sudah diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ujian_uas_dosen()
    {
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;
        $kode_dosen = Auth::user()->email;

        $jadwal = Jadwalreguler::with([
            'perhitungan',
            'sesi',
            'sesi.pukul',
            'hari',
            'ruang',
            'tahun_akademik',
            'dosen',
            'kelas',
            'kelas.jurusan',
            'detail_kurikulum',
            'detail_kurikulum.materi_ajar',
            'detail_kurikulum.materi_ajar.semester',
            'detail_kurikulum.materi_ajar.semester.keterangan'
        ])
            ->whereHas('tahun_akademik', function ($query) use ($tahun_akademik) {
                $query->where('id_tahun_akademik', $tahun_akademik);
            })
            ->whereHas('detail_kurikulum.materi_ajar.semester.keterangan', function ($query) use ($keterangan) {
                $query->where('id_keterangan', $keterangan);
            })
            ->whereHas('dosen', function ($query) use ($kode_dosen) {
                $query->where('kode_dosen', $kode_dosen);
            })
            ->paginate(10);

        $uas = Uas::all();
        return view('page.uas_dosen.index')->with([
            'jadwal' => $jadwal,
            'uas' => $uas,
        ]);
    }
}
