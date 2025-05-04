<?php

namespace App\Http\Controllers;

use App\Models\DetailUts;
use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\KonfigurasiUjian;
use App\Models\Nilai;
use App\Models\Tahunakademik;
use App\Models\Uts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;

class UtsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*$jadwal = Jadwalreguler::all();
        return view('page.uts.index')->with([
            'jadwal' => $jadwal
        ]);*/

        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $konfigurasi = Konfigurasi::first();
        $default_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $tahun_akademik = $request->input('id_tahun_akademiks', $default_tahun_akademik);

        $query = Jadwalreguler::query()
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id_materi_ajar')
            ->join('dosen', 'jadwal_reguler.id_dosen', '=', 'dosen.id')
            ->join('hari', 'jadwal_reguler.id_hari', '=', 'hari.id')
            ->join('sesi as sesi1', 'jadwal_reguler.id_sesi', '=', 'sesi1.id') // Alias untuk sesi pertama
            ->leftJoin('sesi as sesi2', 'jadwal_reguler.id_sesi2', '=', 'sesi2.id') // Alias untuk sesi kedua
            ->join('pukul as pukul1', 'sesi1.id_pukul', '=', 'pukul1.id')
            ->leftJoin('pukul as pukul2', 'sesi2.id_pukul', '=', 'pukul2.id') // Ganti join biasa dengan leftJoin untuk pukul2
            ->join('ruang', 'jadwal_reguler.id_ruang', '=', 'ruang.id')
            ->join('kelas', 'jadwal_reguler.id_kelas', '=', 'kelas.id')
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->join('semester', 'materi_ajar.id_semester', '=', 'semester.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select(
                'jadwal_reguler.*',
                'jadwal_reguler.id as id_jadwal',
                'jadwal_reguler.id_sesi2 as sesi2',
                'jadwal_reguler.id_jadwal as kode_jadwal',
                'detail_kurikulum.*',
                'dosen.*',
                'hari.*',
                'sesi1.*',
                'sesi2.*',
                'sesi1.id as kode_sesi1',
                'sesi2.id as kode_sesi2',
                'sesi1.sesi as sesi1',
                'sesi2.sesi as sesi2',
                'pukul1.*',
                'pukul2.*',
                'pukul1.pukul as pukul1',
                'pukul2.pukul as pukul2',
                'ruang.*',
                'kelas.*',
                'materi_ajar.*',
                'semester.*',
                'jurusan.*'
            )
            ->where('jadwal_reguler.id_tahun_akademik', $tahun_akademik)
            ->where('jadwal_reguler.id_keterangan', $keterangan);

        if ($search) {
            $query->where('materi_ajar', 'like', '%' . $search . '%')
                ->orWhere('nama_dosen', 'like', '%' . $search . '%');
        }

        $jadwal_reguler = $query->paginate($entries);

        $tahunAkademik = Tahunakademik::all();

        if ($request->ajax()) {
            $nilai = Nilai::all();
            return view('partials.nilai', compact('jadwal_reguler', 'nilai'))->render(); // Update this partial view as needed
        }

        $nilai = Nilai::all();

        return view('page.uts.index', compact(['jadwal_reguler', 'tahunAkademik', 'nilai']))
            ->with('i', ($page - 1) * $entries);
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
        $konfigurasiUjian = KonfigurasiUjian::first();
        if (!$konfigurasiUjian) {
            return redirect()->back()->with('error', 'Konfigurasi ujian tidak ditemukan');
        }

        $tgl_susulan = $konfigurasiUjian->tgl_susulan;
        $now = date('Y-m-d');

        $kode = $request->input('id_uts');
        $nim = $request->input('nim');

        if ($request->hasFile('file')) {
            $tugasFile = $request->file('file');
            $tugasFileName = $kode . '-' . $nim . '.' . $tugasFile->extension();

            // Pilih lokasi penyimpanan berdasarkan tanggal saat ini
            if ($now < $tgl_susulan) {
                $kategori = "UTAMA";
                $fileLocation = 'uts/jawaban/' . $tugasFileName;
                $tugasFile->move(public_path('uts/jawaban/'), $tugasFileName);
            } else {
                $kategori = "SUSULAN";
                $fileLocation = 'uts/cadangan/jawaban/' . $tugasFileName;
                $tugasFile->move(public_path('uts/cadangan/jawaban/'), $tugasFileName);
            }
        } else {
            return redirect()->back()->with('error', 'Tugas tidak ditemukan');
        }

        $data = [
            'id_uts' => $kode,
            'nim' => $nim,
            'file' => $fileLocation,
            'kategori' => $kategori,
            'tgl_pengumpulan' => $now,
        ];

        DetailUts::create($data);

        return back()->with('message_delete', 'Data Jawaban Sudah di-upload');
    }
}
