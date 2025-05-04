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
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Presensi;
use App\Models\Pukul;
use App\Models\Ruang;
use App\Models\Sesi;
use App\Models\Tahunakademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JadwalregulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $konfigurasi = Konfigurasi::first();
        $default_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $tahun_akademik = $request->input('id_tahun_akademiks', $default_tahun_akademik);

        $query = Jadwalreguler::query()
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id')
            ->join('dosen', 'jadwal_reguler.id_dosen', '=', 'dosen.id')
            ->join('hari', 'jadwal_reguler.id_hari', '=', 'hari.id')
            ->join('sesi as sesi1', 'jadwal_reguler.id_sesi', '=', 'sesi1.id') // Alias untuk sesi pertama
            // Ganti join biasa dengan leftJoin untuk sesi2
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

        return view('page.jadwalreguler.index', compact(['jadwal_reguler', 'tahunAkademik']))
            ->with('i', ($page - 1) * $entries);
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
            'id_sesi2' => $request->input('sesi_dua'),
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
            ->with('message_insert', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*$presensi = Presensi::where('id_jadwal', $id)->get();
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        return view('page.jadwalreguler.show')->with([
            'presensi' => $presensi,
            'jadwal' => $jadwal
        ]);*/

        try {
            $idJadwal = $id;
            $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();

            $page = request()->input('page', 1);
            $entries = request()->input('entries', 10);
            $search = request()->input('search');

            $query = Presensi::query()->where('id_jadwal', $id)->orderBy('pertemuan', 'ASC');

            if ($search) {
                $query->where('materi', 'like', '%' . $search . '%');
            }

            $presensi = $query->paginate($entries);

            // FORMATIF //
            $pageFormatif = request()->input('pageFormatif', 1);
            $entriesFormatif = request()->input('entriesFormatif', 10);
            $searchFormatif = request()->input('searchFormatif');
            $queryFormatif = Formatif::query()->where('id_jadwal', $id)->orderBy('created_at', 'ASC');
            if ($searchFormatif) {
                $queryFormatif->where('judul_formatif', 'like', '%' . $searchFormatif . '%');
            }

            $formatif = $queryFormatif->paginate($entriesFormatif);

            return view('page.jadwalreguler.show', compact(['presensi', 'idJadwal', 'jadwal', 'formatif']))
                ->with('i', ($page - 1) * $entries)
                ->with('i', ($pageFormatif - 1) * $entriesFormatif);
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
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
        $jadwal = Jadwalreguler::with('sesi')->where('id', $id)->first();
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

    public function editJadwal($id)
    {
        $konfigurasi = Konfigurasi::first();
        $id_kurikulum = $konfigurasi->id_kurikulum;
        $sesi = Sesi::all();
        $ruang = Ruang::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $hari = Hari::all();
        $kurikulum = Detailkurikulum::where('id_kurikulum', $id_kurikulum)->get();
        $jadwal = DB::table('jadwal_reguler')
            ->join('hari', 'jadwal_reguler.id_hari', '=', 'hari.id')
            ->leftJoin('sesi as sesi1', 'jadwal_reguler.id_sesi', '=', 'sesi1.id')
            ->leftJoin('sesi as sesi2', 'jadwal_reguler.id_sesi2', '=', 'sesi2.id')
            ->leftJoin('pukul as pukul1', 'sesi1.id_pukul', '=', 'pukul1.id') // Gunakan LEFT JOIN agar konsisten dengan sesi1
            ->leftJoin('pukul as pukul2', 'sesi2.id_pukul', '=', 'pukul2.id')
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id_materi_ajar') // Gunakan LEFT JOIN agar konsisten dengan sesi1
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->join('semester', 'materi_ajar.id_semester', '=', 'semester.id')
            ->join('ruang', 'jadwal_reguler.id_ruang', '=', 'ruang.id')
            ->join('dosen', 'jadwal_reguler.id_dosen', '=', 'dosen.id')
            ->join('kelas', 'jadwal_reguler.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->where('jadwal_reguler.id', $id)
            ->select(
                'jadwal_reguler.*',
                'jadwal_reguler.id as id_jadwal',
                'pukul1.*',
                'hari.*', // Pastikan hanya kolom yang dibutuhkan yang disertakan untuk menghindari konflik nama kolom
                'sesi1.*', // Pastikan hanya kolom yang dibutuhkan yang disertakan untuk menghindari konflik nama kolom
                // 'sesi2.*', // Pastikan hanya kolom yang dibutuhkan yang disertakan untuk menghindari konflik nama kolom
                'sesi2.sesi as sesi2', // Pastikan hanya kolom yang dibutuhkan yang disertakan untuk menghindari konflik nama kolom
                'pukul2.pukul as pukul2', // Pastikan hanya kolom yang dibutuhkan yang disertakan untuk menghindari konflik nama kolom
                'materi_ajar.*', // Pastikan hanya kolom yang dibutuhkan yang disertakan untuk menghindari konflik nama kolom
                'semester.*',
                'ruang.*',
                'dosen.*',
                'jurusan.*',
            )
            ->first();

        return view('page.jadwalreguler.editJadwal')->with([
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
            'id_sesi2' => $request->input('sesi_dua'),
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
            ->with('message_update', 'Data Jadwal Reguler Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_jadwal)
    {
        // Cari satu record Jadwalreguler berdasarkan id_jadwal
        $jadwal = Jadwalreguler::where('id_jadwal', $id_jadwal)->first();

        if ($jadwal) {
            // Dapatkan semua id_presensi yang terkait dengan id_jadwal ini
            $presensiIds = Presensi::where('id_jadwal', $id_jadwal)->pluck('id_presensi');

            // Hapus semua detail presensi yang terkait dengan id_presensi ini
            DetailPresensi::whereIn('id_presensi', $presensiIds)->delete();

            // Hapus semua presensi yang terkait dengan id_jadwal ini
            Presensi::where('id_jadwal', $id_jadwal)->delete();

            // Hapus jadwal reguler
            $jadwal->delete();

            return back()->with('message_delete', 'Data Jadwal Reguler dan detail presensi sudah dihapus');
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
            return back()->with('message_insert', 'Data Formatif Sudah Ditambahkan');
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

        return back()->with('message_update', 'Data Formatif Sudah Diubah');
    }

    public function formatif_destroy($id)
    {
        $formatif = Formatif::find($id);

        if ($formatif) {
            if ($formatif->formatif && file_exists(public_path('formatif/' . $formatif->formatif))) {
                unlink(public_path('formatif/' . $formatif->formatif));
            }
            $formatif->delete();
            return back()->with('message_delete', 'Data Informasi Sudah dihapus');
        } else {
            return back()->with('message_error', 'Tidak dapat menghapus data');
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
        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $query = DetailFormatif::query()
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'detail_formatif.nim')
            ->where('id_formatif', $id)
            ->select(
                'detail_formatif.id as id_detail',
                'detail_formatif.*',
                'mahasiswa.*'
            );;

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }
        $detail = $query->paginate($entries);

        $detail_mhs = DetailFormatif::where('id_formatif', $id)->where('nim', Auth::user()->email)->get();
        $formatif = Formatif::where('id_formatif', $id)->first();

        return view('page.jadwalreguler.formatif_answer', compact(['detail']))->with([
            'formatif' => $formatif,
            'detail_mhs' => $detail_mhs,
        ])->with('i', ($page - 1) * $entries);
    }

    public function jadwal_mhs(string $id)
    {
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $ga = $konfigurasi->keterangan;

        $mahasiswa = Mahasiswa::where('nim', $id)->first();

        if ($mahasiswa) {
            $tingkat = $mahasiswa->tingkat;

            $jadwal_reguler = Nilai::with(['mahasiswa', 'jadwal', 'jadwal.detail_kurikulum.materi_ajar.semester'])
                ->where('nim', $id)
                ->whereHas('jadwal.detail_kurikulum.materi_ajar.semester', function ($query) use ($tahun_akademik, $keterangan, $ga, $tingkat) {
                    $query->where('id_tahun_akademik', $tahun_akademik)
                        ->where('id_keterangan', $keterangan);
                    if ($tingkat === 2) {
                        $semester = $ga ? 3 : 4;
                    } elseif ($tingkat === 4) {
                        $semester = $ga ? 5 : 6;
                    } else {
                        $semester = $ga ? 1 : 2;
                    }
                    $query->where('semester', $semester);
                })
                ->get();
        } else {
            $jadwal_reguler = collect();
        }

        return view('page.jadwalreguler_mhs.index')->with([
            'jadwal_reguler' => $jadwal_reguler,
        ]);
    }

    public function jadwal_dosen(string $id)
    {
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;
        $kode_dosen = Auth::user()->email;

        $jadwal_reguler = Jadwalreguler::with([
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

        return view('page.jadwalreguler_dsn.index')->with([
            'jadwal_reguler' => $jadwal_reguler,
        ]);
    }

    public function print_jadwal()
    {
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $jadwal_reguler = Jadwalreguler::with([
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
            })->get();

        return view('page.jadwalreguler.print')->with([
            'jadwal_reguler' => $jadwal_reguler,
        ]);
    }

    public function print_jadwal_mhs(string $id)
    {
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $ga = $konfigurasi->keterangan;

        $mahasiswa = Mahasiswa::where('nim', $id)->first();

        if ($mahasiswa) {
            $tingkat = $mahasiswa->tingkat;

            $jadwal_reguler = Nilai::with(['mahasiswa', 'jadwal', 'jadwal.detail_kurikulum.materi_ajar.semester'])
                ->where('nim', $id)
                ->whereHas('jadwal.detail_kurikulum.materi_ajar.semester', function ($query) use ($tahun_akademik, $keterangan, $ga, $tingkat) {
                    $query->where('id_tahun_akademik', $tahun_akademik)
                        ->where('id_keterangan', $keterangan);
                    if ($tingkat === 2) {
                        $semester = $ga ? 3 : 4;
                    } elseif ($tingkat === 4) {
                        $semester = $ga ? 5 : 6;
                    } else {
                        $semester = $ga ? 1 : 2;
                    }
                    $query->where('semester', $semester);
                })
                ->get();
        } else {
            $jadwal_reguler = collect();
        }

        return view('page.jadwalreguler.print_mhs')->with([
            'jadwal_reguler' => $jadwal_reguler,
        ]);
    }

    public function print_jadwal_dosen(string $id)
    {
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;
        $kode_dosen = Auth::user()->email;

        $jadwal_reguler = Jadwalreguler::with([
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
            ->get();

        return view('page.jadwalreguler.print')->with([
            'jadwal_reguler' => $jadwal_reguler,
        ]);
    }
}
