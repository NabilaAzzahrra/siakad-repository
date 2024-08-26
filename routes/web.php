<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\DetailFormatif;
use App\Http\Controllers\DetailFormatifController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HariController;
use App\Http\Controllers\JadwalregulerController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KeteranganController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\KonfigurasiUjianController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MateriajarController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PukulController;
use App\Http\Controllers\ReportDosenController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\TahunakademikController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\TugasPertemuanController;
use App\Http\Controllers\UasController;
use App\Http\Controllers\UjianUASController;
use App\Http\Controllers\UjianUTSController;
use App\Http\Controllers\UtsController;
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
Route::resource('tugas', TugasPertemuanController::class)->middleware(['auth']);
Route::resource('tugass', TugasPertemuanController::class)->middleware(['auth']);
Route::resource('nilai', NilaiController::class)->middleware(['auth']);
Route::resource('report_dosen', ReportDosenController::class)->middleware(['auth']);
Route::resource('konfigurasi_ujian', KonfigurasiUjianController::class)->middleware(['auth']);
Route::resource('uas', UasController::class)->middleware(['auth']);
Route::resource('ujian_uas', UjianUASController::class)->middleware(['auth']);

Route::post('/download-zip', [DetailFormatifController::class, 'downloadZip']);
Route::post('/kurikulum/detail', [KurikulumController::class, 'detail'])->name('kurikulum.detail')->middleware(['auth']);
Route::put('/edit_det', [MahasiswaController::class, 'edit_det'])->name('mahasiswa.edit_det');
Route::get('/formatif/{id}', [JadwalregulerController::class, 'formatif'])->name('jadwal_reguler.formatif');
Route::post('/formatif_add', [JadwalregulerController::class, 'formatif_add'])->name('jadwal_reguler.formatif_add');
Route::patch('/formatif_update/{id}', [JadwalregulerController::class, 'formatif_update'])->name('jadwal_reguler.formatif_update');
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




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
