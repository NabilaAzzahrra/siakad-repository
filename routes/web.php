<?php

use App\Http\Controllers\DataPrestasiController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DetailFormatif;
use App\Http\Controllers\DetailFormatifController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HariController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\JadwalregulerController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KeteranganController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\KonfigurasiUjianController;
use App\Http\Controllers\KrsMhsController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MateriajarController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PukulController;
use App\Http\Controllers\ReportDapresMahasiswaController;
use App\Http\Controllers\ReportDosenController;
use App\Http\Controllers\ReportKhsMahasiswaController;
use App\Http\Controllers\ReportMahasiswaKeseluruhanController;
use App\Http\Controllers\ReportNilaiKeseluruhanController;
use App\Http\Controllers\ReportNilaiMahasiswaController;
use App\Http\Controllers\ReportPresensiMahasiswaController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\TahunakademikController;
use App\Http\Controllers\TranskripController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\TugasPertemuanController;
use App\Http\Controllers\UasController;
use App\Http\Controllers\UjianUASController;
use App\Http\Controllers\UjianUASMhsController;
use App\Http\Controllers\UjianUTSController;
use App\Http\Controllers\UjianUTSMhsController;
use App\Http\Controllers\UtsController;
use App\Models\DetailPresensi;
use App\Models\Dosen;
use App\Models\Informasi;
use App\Models\Jadwalreguler;
use App\Models\Jurusan;
use App\Models\Konfigurasi;
use App\Models\Mahasiswa;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('ruang', RuangController::class)->middleware(['auth']);
Route::resource('sesi', SesiController::class)->middleware(['auth']);
Route::resource('pukul', PukulController::class)->middleware(['auth']);
Route::resource('jurusan', JurusanController::class)->middleware(['auth']);
Route::resource('kelas', KelasController::class)->middleware(['auth']);
Route::resource('keterangan', KeteranganController::class)->middleware(['auth']);
Route::resource('tahunakademik', TahunakademikController::class)->middleware(['auth']);
Route::resource('materi_ajar', MateriajarController::class)->middleware(['auth']);
Route::resource('semester', SemesterController::class)->middleware(['auth']);
Route::resource('kurikulum', KurikulumController::class)->middleware(['auth']);
Route::resource('detail', DetailController::class)->middleware(['auth']);
Route::resource('jadwal_reguler', JadwalregulerController::class)->middleware(['auth']);
Route::resource('dosen', DosenController::class)->middleware(['auth']);
Route::resource('konfigurasi', KonfigurasiController::class)->middleware(['auth']);
Route::resource('perhitungan', PerhitunganController::class)->middleware(['auth']);
Route::resource('hari', HariController::class)->middleware(['auth']);
Route::resource('mahasiswa', MahasiswaController::class)->middleware(['auth']);
Route::resource('detail_formatif', DetailFormatifController::class)->middleware(['auth']);
Route::resource('presensi', PresensiController::class)->middleware(['auth']);
Route::resource('uts', UtsController::class)->middleware(['auth']);
Route::resource('ujian_uts', UjianUTSController::class)->middleware(['auth']);
Route::get('/daftar_print_uts', [UjianUTSController::class, 'daftar_print_uts'])->name('ujian_uts.daftar_print_uts');
Route::post('/print_kartu_uts', [UjianUTSController::class, 'print_kartu_uts'])->name('ujian_uts.print_kartu_uts');
Route::resource('ujian_uts_mhs', UjianUTSMhsController::class)->middleware(['auth']);
Route::resource('ujian_uas_mhs', UjianUASMhsController::class)->middleware(['auth']);
Route::resource('tugas', TugasPertemuanController::class)->middleware(['auth']);
Route::resource('tugass', TugasPertemuanController::class)->middleware(['auth']);
Route::resource('nilai', NilaiController::class)->middleware(['auth']);
Route::resource('report_dosen', ReportDosenController::class)->middleware(['auth']);
Route::resource('konfigurasi_ujian', KonfigurasiUjianController::class)->middleware(['auth']);
Route::resource('uas', UasController::class)->middleware(['auth']);
Route::get('/daftar_print_uas', [UjianUASController::class, 'daftar_print_uas'])->name('ujian_uas.daftar_print_uas');
Route::post('/print_kartu_uas', [UjianUASController::class, 'print_kartu_uas'])->name('ujian_uas.print_kartu_uas');
Route::resource('ujian_uas', UjianUASController::class)->middleware(['auth']);
Route::resource('report_keseluruhan', ReportMahasiswaKeseluruhanController::class)->middleware(['auth']);
Route::resource('report_presensi_mahasiswa', ReportPresensiMahasiswaController::class)->middleware(['auth']);
Route::resource('report_nilai_keseluruhan', ReportNilaiKeseluruhanController::class)->middleware(['auth']);
Route::resource('report_nilai_mahasiswa', ReportNilaiMahasiswaController::class)->middleware(['auth']);
Route::resource('report_khs_mahasiswa', ReportKhsMahasiswaController::class)->middleware(['auth']);
Route::resource('report_dapres_mahasiswa', ReportDapresMahasiswaController::class)->middleware(['auth']);
Route::resource('khs', KHSController::class)->middleware(['auth']);
Route::resource('data_prestasi', DataPrestasiController::class)->middleware(['auth']);
Route::resource('krs_mhs', KrsMhsController::class)->middleware(['auth']);
Route::resource('transkrip', TranskripController::class)->middleware(['auth']);
Route::resource('informasi', InformasiController::class)->middleware(['auth']);

Route::get('/print_jadwal', [JadwalRegulerController::class, 'print_jadwal'])->name('jadwal_reguler.print_jadwal');
Route::get('/print_jadwal_mhs/{id}', [JadwalRegulerController::class, 'print_jadwal_mhs'])->name('jadwal_reguler.print_jadwal_mhs');
Route::get('/print_jadwal_dosen/{id}', [JadwalRegulerController::class, 'print_jadwal_dosen'])->name('jadwal_reguler.print_jadwal_dosen');
Route::get('print_uts_mhs', [UjianUTSMhsController::class, 'print_uts_mhs'])->name('ujian_uts_mhs.print_uts_mhs');
Route::get('print_uas_mhs', [UjianUASMhsController::class, 'print_uas_mhs'])->name('ujian_uas_mhs.print_uas_mhs');
Route::get('/jadwal_mhs/{id}', [JadwalRegulerController::class, 'jadwal_mhs'])->name('jadwal_reguler.jadwal_mhs');
Route::get('/jadwal_dosen/{id}', [JadwalRegulerController::class, 'jadwal_dosen'])->name('jadwal_reguler.jadwal_dosen');
Route::get('/ujian_uts_dosen/{id}', [UjianUTSController::class, 'ujian_uts_dosen'])->name('ujian_uts.ujian_uts_dosen');
Route::get('/ujian_uas_dosen/{id}', [UjianUASController::class, 'ujian_uas_dosen'])->name('ujian_uas.ujian_uas_dosen');
Route::get('/nilai_dosen/{id}', [NilaiController::class, 'nilai_dosen'])->name('nilai.nilai_dosen');
Route::get('/show_dosen/{id}', [ReportDosenController::class, 'show_dosen'])->name('report_dosen.show_dosen');
Route::get('/r_mahasiswa', [ReportMahasiswaKeseluruhanController::class, 'r_mahasiswa'])->name('report_keseluruhan.r_mahasiswa');
Route::post('/importExcel', [MahasiswaController::class, 'importExcel'])->name('mahasiswa.importExcel');

Route::post('/download-zip', [DetailFormatifController::class, 'downloadZip']);
Route::post('/kurikulum/detail', [KurikulumController::class, 'detail'])->name('kurikulum.detail')->middleware(['auth']);
Route::put('/edit_det', [MahasiswaController::class, 'edit_det'])->name('mahasiswa.edit_det');
Route::put('/edit_detDataBaru', [MahasiswaController::class, 'edit_detDataBaru'])->name('mahasiswa.edit_detDataBaru');
Route::get('/formatif/{id}', [JadwalregulerController::class, 'formatif'])->name('jadwal_reguler.formatif');
Route::post('/formatif_add', [JadwalregulerController::class, 'formatif_add'])->name('jadwal_reguler.formatif_add');
Route::patch('/formatif_update/{id}', [JadwalregulerController::class, 'formatif_update'])->name('jadwal_reguler.formatif_update');
Route::patch('/profilUpdate/{id}', [MahasiswaController::class, 'profilUpdate'])->name('mahasiswa.profilUpdate');
Route::patch('/updatePass/{id}', [ProfileController::class, 'updatePass'])->name('profile.updatePass');
Route::get('jadwal_reguler/{id}/editJadwal', [JadwalregulerController::class, 'editJadwal'])->name('jadwal_reguler.editJadwal');

Route::delete('/formatif_destroy/{id}', [JadwalregulerController::class, 'formatif_destroy'])->name('jadwal_reguler.formatif_destroy');
Route::get('/formatif_show/{id}', [JadwalregulerController::class, 'formatif_show'])->name('jadwal_reguler.formatif_show');
Route::get('/formatif_answer/{id}', [JadwalregulerController::class, 'formatif_answer'])->name('jadwal_reguler.formatif_answer');
Route::get('/materi_update/{id}', [PresensiController::class, 'materi_update'])->name('presensi.materi_update');
Route::post('/tugas_add', [TugasPertemuanController::class, 'tugas_add'])->name('tugass.tugas_add');
Route::post('/download-zip-tugas', [TugasPertemuanController::class, 'downloadZip']);
Route::get('/tugas_show/{id}', [TugasPertemuanController::class, 'tugas_show'])->name('tugass.tugas_show');
Route::patch('/nilai_verifikasi/{id}', [NilaiController::class, 'nilai_verifikasi'])->name('nilai.nilai_verifikasi');
Route::post('/jawaban_uts_add', [UtsController::class, 'jawaban_uts_add'])->name('uts.jawaban_uts_add');
Route::post('/download-zip-uts', [UtsController::class, 'downloadZip']);
Route::post('/jawaban_uas_add', [UasController::class, 'jawaban_uas_add'])->name('uas.jawaban_uas_add');
Route::post('/download-zip-uas', [UasController::class, 'downloadZip']);
Route::get('/cetak-pdf/{id_jadwal}', [ReportMahasiswaKeseluruhanController::class, 'generatePDF'])->name('cetak-pdf');
Route::post('/edit_databaru', [MahasiswaController::class, 'edit_databaru'])->name('mahasiswa.edit_databaru');

Route::get('/dashboard', function (Request $request) {
    $konfigurasi = Konfigurasi::first();
    if (!$konfigurasi) {
        return view('dashboard_konfig', []);
    } else {

        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $today = date('l');
        $now = "";

        switch ($today) {
            case "Monday":
                $now = "SENIN";
                break;
            case "Tuesday":
                $now = "SELASA";
                break;
            case "Wednesday":
                $now = "RABU";
                break;
            case "Thursday":
                $now = "KAMIS";
                break;
            case "Friday":
                $now = "JUMAT";
                break;
            case "Saturday":
                $now = "SABTU";
                break;
            case "Sunday":
                $now = "MINGGU";
                break;
        }

        $search = $request->input('search');

        $jadwal = Jadwalreguler::with('hari', 'dosen', 'detail_kurikulum.materi_ajar', 'sesi', 'sesi.pukul', 'ruang', 'kelas')
            ->whereHas('hari', function ($query) use ($now, $tahun_akademik, $keterangan) {
                $query->where('id_tahun_akademik', $tahun_akademik)
                    ->where('id_keterangan', $keterangan)
                    ->where('hari', $now);
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->whereHas('detail_kurikulum.materi_ajar', function ($query) use ($search) {
                        $query->where('materi_ajar', 'like', '%' . $search . '%');
                    })
                        ->orWhereHas('dosen', function ($query) use ($search) {
                            $query->where('nama_dosen', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('hari', function ($query) use ($search) {
                            $query->where('hari', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('detail_kurikulum.materi_ajar', function ($query) use ($search) {
                            $query->where('sks', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('sesi', function ($query) use ($search) {
                            $query->where('sesi', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('ruang', function ($query) use ($search) {
                            $query->where('ruang', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('kelas', function ($query) use ($search) {
                            $query->where('kelas', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('sesi.pukul', function ($query) use ($search) {
                            $query->where('pukul', 'like', '%' . $search . '%');
                        });
                });
            })
            ->paginate(10);

        $kode_dosen = Auth::user()->email;
        // dd($id_kelas);

        if (Auth::user()->role == "M") {
            $mhs = Mahasiswa::where('nim', Auth::user()->email)->first();
            $id_kelas = $mhs->id_kelas;

            $jadwal_mhs = Jadwalreguler::with('hari', 'dosen', 'detail_kurikulum.materi_ajar', 'sesi', 'sesi.pukul', 'ruang', 'kelas')
                ->whereHas('hari', function ($query) use ($now, $tahun_akademik, $keterangan, $id_kelas) {
                    $query->where('id_tahun_akademik', $tahun_akademik)
                        ->where('id_keterangan', $keterangan)
                        ->where('hari', $now)
                        ->where('id_kelas', $id_kelas);
                })->paginate(10);
        } else if (Auth::user()->role == "D") {
            $jadwal_mhs = Jadwalreguler::with('hari', 'dosen', 'detail_kurikulum.materi_ajar', 'sesi', 'sesi.pukul', 'ruang', 'kelas')
                ->whereHas('hari', function ($query) use ($now, $tahun_akademik, $keterangan) {
                    $query->where('id_tahun_akademik', $tahun_akademik)
                        ->where('id_keterangan', $keterangan)
                        ->where('hari', $now);
                })->whereHas('dosen', function ($query) use ($kode_dosen) {
                    $query->where('kode_dosen', $kode_dosen);
                })->paginate(10);
        } else if (Auth::user()->role == "O") {
            $mhs = Mahasiswa::where('nim', str_replace('ortu', '', Auth::user()->email))->first();
            $id_kelas_ortu = $mhs->id_kelas;
            // dd($id_kelas_ortu);
            $jadwal_mhs = Jadwalreguler::with('hari', 'dosen', 'detail_kurikulum.materi_ajar', 'sesi.pukul', 'ruang', 'kelas')
                ->whereHas('hari', function ($query) use ($now, $tahun_akademik, $keterangan, $id_kelas_ortu) {
                    $query->where('id_tahun_akademik', $tahun_akademik)
                        ->where('id_keterangan', $keterangan)
                        ->where('hari', $now)
                        ->where('id_kelas', $id_kelas_ortu);
                })
                ->paginate(10);

            // PRESENSI MAHASISWA
            $mhs = Mahasiswa::where('nim', str_replace('ortu', '', Auth::user()->email))->first();
            $id_kelas_ortu = $mhs->id_kelas;

            $nim = str_replace('ortu', '', Auth::user()->email);

            $presensiRealtimeNoData = Jadwalreguler::with('hari', 'dosen', 'detail_kurikulum.materi_ajar', 'sesi.pukul', 'ruang', 'kelas')
                ->whereHas('hari', function ($query) use ($now, $tahun_akademik, $keterangan, $id_kelas_ortu) {
                    $query->where('id_tahun_akademik', $tahun_akademik)
                        ->where('id_keterangan', $keterangan)
                        ->where('hari', $now)
                        ->where('id_kelas', $id_kelas_ortu);
                })
                ->get();

            $presensiRealtime = DetailPresensi::with(['presensi', 'presensi.jadwal', 'presensi.jadwal.hari', 'presensi.jadwal.dosen', 'presensi.jadwal.detail_kurikulum.materi_ajar', 'presensi.jadwal.sesi.pukul', 'presensi.jadwal.ruang', 'presensi.jadwal.kelas'])
                ->where('nim', $nim)
                ->whereHas('presensi', function ($query) use ($now) {
                    $query->where('tgl_presensi', date('Y-m-d'));
                })
                ->whereHas('presensi.jadwal.hari', function ($query) use ($now) {
                    $query->where('hari', $now);
                })
                ->get();
        } else {
            $jadwal_mhs = null;
        }

        if ($request->ajax()) {
            return view('partials.jadwal', ['jadwal' => $jadwal])->render();
        }

        if (Auth::user()->role == "M") {
            $informasi = Informasi::where('kategori', 'MAHASISWA')->orderBy('created_at', 'desc')->take(3)->get();
        } else if (Auth::user()->role == "D") {
            $informasi = Informasi::where('kategori', 'DOSEN')->orderBy('created_at', 'desc')->take(3)->get();
        } else if (Auth::user()->role == "O") {
            $informasi = Informasi::where('kategori', 'ORANG TUA')->orderBy('created_at', 'desc')->take(3)->get();
        } else {
            $informasi = Informasi::orderBy('created_at', 'desc')->take(3)->get();
        }

        $totalPengajar = Dosen::count('id');
        $totalPesertaDidik = Mahasiswa::where('id_kelas', '!=', null)->count();
        $totalProgramStudi = Jurusan::count();

        // PRESENSI MAHASISWA

        $nim = str_replace('ortu', '', Auth::user()->email);

        $presensiRealtimeNoData = Jadwalreguler::with('hari', 'dosen', 'detail_kurikulum.materi_ajar', 'sesi.pukul', 'ruang', 'kelas')
            ->whereHas('hari', function ($query) use ($now, $tahun_akademik, $keterangan) {
                $query->where('id_tahun_akademik', $tahun_akademik)
                    ->where('id_keterangan', $keterangan)
                    ->where('hari', $now);
                // ->where('id_kelas', $id_kelas_ortu);
            })
            ->get();

        $presensiRealtime = DetailPresensi::with(['presensi', 'presensi.jadwal', 'presensi.jadwal.hari', 'presensi.jadwal.dosen', 'presensi.jadwal.detail_kurikulum.materi_ajar', 'presensi.jadwal.sesi.pukul', 'presensi.jadwal.ruang', 'presensi.jadwal.kelas'])
            ->where('nim', $nim)
            ->whereHas('presensi', function ($query) use ($now) {
                $query->where('tgl_presensi', date('Y-m-d'));
            })
            ->whereHas('presensi.jadwal.hari', function ($query) use ($now) {
                $query->where('hari', $now);
            })
            ->get();

        $presensiMahasiswa = DetailPresensi::with(['presensi', 'presensi.jadwal', 'presensi.jadwal.hari', 'presensi.jadwal.dosen', 'presensi.jadwal.detail_kurikulum.materi_ajar', 'presensi.jadwal.sesi.pukul', 'presensi.jadwal.ruang', 'presensi.jadwal.kelas', 'mahasiswa'])
            ->where('keterangan', '!=', 'HADIR')
            ->whereHas('presensi', function ($query) use ($now) {
                $query->where('tgl_presensi', date('Y-m-d'));
            })
            ->whereHas('presensi.jadwal.hari', function ($query) use ($now) {
                $query->where('hari', $now);
            })
            ->get();


        // dd($presensiRealtime);

        return view('dashboard', [
            'jadwal' => $jadwal,
            'jadwal_mhs' => $jadwal_mhs,
            'informasi' => $informasi,
            'konfigurasi' => $konfigurasi,
            'totalPengajar' => $totalPengajar,
            'totalPesertaDidik' => $totalPesertaDidik,
            'totalProgramStudi' => $totalProgramStudi,
            'presensiRealtimeNoData' => $presensiRealtimeNoData,
            'presensiRealtime' => $presensiRealtime,
            'presensiMahasiswa' => $presensiMahasiswa,
        ]);
    }

    // $ga = $konfigurasi->keterangan;


})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
