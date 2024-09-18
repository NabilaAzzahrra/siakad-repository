<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\Uts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjianUTSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwalreguler::all();
        $uts = Uts::all();
        return view('page.uts.index')->with([
            'jadwal' => $jadwal,
            'uts' => $uts,
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

                $data = [
                    'id_jadwal' => $request->input('id_jadwal'),
                    'id_uts' => $id_uts,
                    'tgl_ujian' => $request->input('tgl_ujian'),
                    'waktu_ujian' => $request->input('waktu_ujian'),
                    'file' => $utsFilePath,
                ];

                Uts::create($data);
            } else {
                return redirect()->back()->with('error', 'Soal tidak ditemukan');

                $data = [
                    'id_jadwal' => $request->input('id_jadwal'),
                    'id_uts' => $id_uts,
                    'tgl_ujian' => $request->input('tgl_ujian'),
                    'waktu_ujian' => $request->input('waktu_ujian'),
                    'file' => $utsFilePath,
                ];

                Uts::create($data);
            }

            if (Auth::user()->role == 'A') {
                return redirect()
                    ->route('ujian_uts.index')
                    ->with('message', 'Data UTS Sudah ditambahkan');
            }else{
                return redirect()
                    ->route('ujian_uts.ujian_uts_dosen', Auth::user()->email)
                    ->with('message', 'Data UTS Sudah ditambahkan');
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
        $uts = Uts::where('id', $id)->first();
        return view('page.uts.edit')->with([
            'uts' => $uts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $uts = Uts::find($id);

        if (!$uts) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $uts->tgl_ujian = $request->input('tgl_ujian');
        $uts->waktu_ujian = $request->input('waktu_ujian');

        // Simpan nama file ebook lama untuk referensi
        $oldUts = $uts->file;

        $ko = $request->input('id_jadwal');
        $id_uts = $request->input('id_uts');
        // Jika ada file ebook yang diunggah
        if ($request->hasFile('file')) {
            // Hapus ebook lama jika ada
            if ($oldUts && file_exists(public_path('uts/' . $oldUts))) {
                unlink(public_path('uts/' . $oldUts));
            }

            $file = $request->file('file');
            $filename = $ko . '-' . $id_uts . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uts'), $filename);

            $uts->file = $filename;
        }

        // Simpan perubahan ke database
        $uts->save();

        if (Auth::user()->role == 'A') {
            return redirect()
            ->route('ujian_uts.index')
            ->with('message', 'Data UTS Sudah diupdate');
        }else{
            return redirect()
                ->route('ujian_uts.ujian_uts_dosen', Auth::user()->email)
                ->with('message', 'Data UTS Sudah diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ujian_uts_dosen()
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

        $uts = Uts::all();
        return view('page.uts_dosen.index')->with([
            'jadwal' => $jadwal,
            'uts' => $uts,
        ]);
    }
}
