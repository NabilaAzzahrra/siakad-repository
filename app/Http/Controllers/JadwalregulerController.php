<?php

namespace App\Http\Controllers;

use App\Models\DetailFormatif;
use App\Models\Detailkurikulum;
use App\Models\DetailPresensi;
use App\Models\Dosen;
use App\Models\Formatif;
use App\Models\Hari;
use App\Models\Jadwalreguler;
use App\Models\Kelas;
use App\Models\Konfigurasi;
use App\Models\Presensi;
use App\Models\Pukul;
use App\Models\Ruang;
use App\Models\Sesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalregulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal_reguler = DB::table('jadwal_reguler')
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id_materi_ajar')
            ->join('dosen', 'jadwal_reguler.id_dosen', '=', 'dosen.id')
            ->join('hari', 'jadwal_reguler.id_hari', '=', 'hari.id')
            ->join('sesi', 'jadwal_reguler.id_sesi', '=', 'sesi.id')
            ->join('pukul', 'sesi.id_pukul', '=', 'pukul.id')
            ->join('ruang', 'jadwal_reguler.id_ruang', '=', 'ruang.id')
            ->join('kelas', 'jadwal_reguler.id_kelas', '=', 'kelas.id')
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->join('semester', 'materi_ajar.id_semester', '=', 'semester.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select('jadwal_reguler.*', 'jadwal_reguler.id as id_jadwal', 'jadwal_reguler.id_jadwal as kode_jadwal', 'detail_kurikulum.*', 'dosen.*', 'hari.*', 'sesi.*', 'sesi.id as kode_sesi', 'pukul.*', 'ruang.*', 'kelas.*', 'materi_ajar.*', 'semester.*', 'jurusan.*')
            ->paginate(15);

        return view('page.jadwalreguler.index')->with([
            'jadwal_reguler' => $jadwal_reguler,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $konfigurasi = Konfigurasi::first();
        $id_kurikulum = $konfigurasi->id_kurikulum;
        $sesi = Sesi::all();
        $ruang = Ruang::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $hari = Hari::all();
        $kurikulum = Detailkurikulum::where('id_kurikulum', $id_kurikulum)->get();
        return view('page.jadwalreguler.create')->with([
            'sesi' => $sesi,
            'kurikulum' => $kurikulum,
            'ruang' => $ruang,
            'dosen' => $dosen,
            'konfigurasi' => $konfigurasi,
            'kelas' => $kelas,
            'hari' => $hari,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_jadwal = date('YmdHis');
        $pertemuan = $request->input('jml_pertemuan');

        $data = [
            'id_jadwal' => $id_jadwal,
            'id_sesi' => $request->input('sesi'),
            'id_hari' => $request->input('hari'),
            'id_detail_kurikulum' => $request->input('kurikulum'),
            'id_ruang' => $request->input('ruang'),
            'id_dosen' => $request->input('dosen'),
            'id_kelas' => $request->input('kelas'),
            'id_tahun_akademik' => $request->input('id_tahun_akademik'),
            'id_kurikulum' => $request->input('id_kurikulum'),
            'id_keterangan' => $request->input('id_keterangan'),
            'id_perhitungan' => $request->input('id_perhitungan'),
        ];

        for ($i = 1; $i <= $pertemuan; $i++) {
            $id_presensi = $id_jadwal . str_pad($i, 3, '0', STR_PAD_LEFT);

            $datas = [
                'id_presensi' => $id_presensi,
                'id_jadwal' => $id_jadwal,
                'pertemuan' => $i,
            ];

            Presensi::create($datas);
        }

        Jadwalreguler::create($data);
        return redirect()
            ->route('jadwal_reguler.index')
            ->with('message', 'Data Jadwal Reguler sudah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $presensi = Presensi::where('id_jadwal', $id)->get();
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        return view('page.jadwalreguler.show')->with([
            'presensi' => $presensi,
            'jadwal' => $jadwal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $konfigurasi = Konfigurasi::first();
        $id_kurikulum = $konfigurasi->id_kurikulum;
        $sesi = Sesi::all();
        $ruang = Ruang::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $hari = Hari::all();
        $kurikulum = Detailkurikulum::where('id_kurikulum', $id_kurikulum)->get();
        $jadwal = Jadwalreguler::where('id', $id)->first();
        return view('page.jadwalreguler.edit')->with([
            'sesi' => $sesi,
            'kurikulum' => $kurikulum,
            'ruang' => $ruang,
            'dosen' => $dosen,
            'konfigurasi' => $konfigurasi,
            'kelas' => $kelas,
            'jadwal' => $jadwal,
            'hari' => $hari,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'id_sesi' => $request->input('sesi'),
            'id_hari' => $request->input('hari'),
            'id_detail_kurikulum' => $request->input('kurikulum'),
            'id_ruang' => $request->input('ruang'),
            'id_dosen' => $request->input('dosen'),
            'id_kelas' => $request->input('kelas'),
            'id_tahun_akademik' => $request->input('id_tahun_akademik'),
            'id_kurikulum' => $request->input('id_kurikulum'),
            'id_keterangan' => $request->input('id_keterangan'),
            'id_perhitungan' => $request->input('id_perhitungan'),
        ];

        $datas = Jadwalreguler::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('jadwal_reguler.index')
            ->with('message', 'Data Jadwal Reguler Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_jadwal)
    {
        // Cari satu record Jadwalreguler berdasarkan id_jadwal
        $jadwal = Jadwalreguler::where('id_jadwal', $id_jadwal)->first();

        if ($jadwal) {
            // Hapus semua presensi yang terkait dengan id_jadwal ini
            Presensi::where('id_jadwal', $id_jadwal)->delete();

            // Hapus jadwal reguler
            $jadwal->delete();

            return back()->with('message_delete', 'Data Jadwal Reguler sudah dihapus');
        } else {
            return back()->with('message_delete', 'Data Jadwal Reguler tidak ditemukan');
        }
    }



    public function formatif($id)
    {
        $presensi = Presensi::where('id_jadwal', $id)->get();
        $formatif = Formatif::where('id_jadwal', $id)->get();
        return view('page.jadwalreguler.formatif')->with([
            'presensi' => $presensi,
            'formatif' => $formatif,
        ]);
    }

    public function formatif_add(Request $request)
    {
        try {
            $materi = $request->input('judul_formatif');
            $kode = date('YmdHis');

            if ($request->hasFile('file')) {
                $formatifFile = $request->file('file');
                $formatifFileName = $kode . '-' . $materi . '.' . $formatifFile->extension();
                $formatifFilePath = $formatifFile->move(public_path('formatif'), $formatifFileName);
                $formatifFilePath = $formatifFileName;
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan');
            }

            $data = [
                'id_formatif' => $kode,
                'judul_formatif' => $request->input('judul_formatif'),
                'deadline' => $request->input('deadline'),
                'id_jadwal' => $request->input('id_jadwal'),
                'formatif' => $formatifFilePath,
            ];

            Formatif::create($data);
            return back()->with('message_delete', 'Data Formatif Sudah Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function formatif_update(Request $request, string $id)
    {
        $formatif = Formatif::find($id);

        if (!$formatif) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $formatif->judul_formatif = $request->input('judul_formatif');
        $formatif->deadline = $request->input('deadline');

        // Simpan nama file ebook lama untuk referensi
        $oldEbook = $request->input('formatif');;

        $ko = date('YmdHis');
        $materi = $request->input('judul_formatif');
        // Jika ada file ebook yang diunggah
        if ($request->hasFile('file')) {
            // Hapus ebook lama jika ada
            if ($oldEbook && file_exists(public_path('formatif/' . $oldEbook))) {
                unlink(public_path('formatif/' . $oldEbook));
            }

            $file = $request->file('file');
            $filename = $ko . '-' . $materi . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('formatif'), $filename);

            $formatif->formatif = $filename;
        }

        // Simpan perubahan ke database
        $formatif->save();

        return back()->with('message_delete', 'Data Formatif Sudah Diubah');
    }

    public function formatif_destroy($id)
    {
        // Cari dan hapus data berdasarkan ID
        $formatif = Formatif::find($id);

        if ($formatif) {
            if ($formatif->formatif && file_exists(public_path('formatif/' . $formatif->formatif))) {
                unlink(public_path('formatif/' . $formatif->formatif));
            }
            $formatif->delete();
            return redirect()->route('jadwal_reguler.index')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('jadwal_reguler.index')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function formatif_show(string $id)
    {
        $formatif = Formatif::where('id', $id)->first();
        return view('page.jadwalreguler.formatif_show')->with([
            'formatif' => $formatif,
        ]);
    }

    public function formatif_answer(string $id)
    {
        $detail = DetailFormatif::where('id_formatif', $id)->get();
        $formatif = Formatif::where('id_formatif', $id)->first();
        return view('page.jadwalreguler.formatif_answer')->with([
            'detail' => $detail,
            'formatif' => $formatif,
        ]);
    }
}
