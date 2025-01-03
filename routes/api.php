<?php

use App\Http\Controllers\API\DetailFormatifAPIController;
use App\Http\Controllers\API\DetailPresensiAPIController;
use App\Http\Controllers\API\DetailUasAPIController;
use App\Http\Controllers\API\DetailUtsAPIController;
use App\Http\Controllers\API\DosenAPIController;
use App\Http\Controllers\API\FakultasAPIController;
use App\Http\Controllers\API\FormatifAPIController;
use App\Http\Controllers\API\HariAPIController;
use App\Http\Controllers\API\IntegrationPMBOnline;
use App\Http\Controllers\API\JadwalregulerAPIController;
use App\Http\Controllers\API\JurusanAPIController;
use App\Http\Controllers\API\KelasAPIController;
use App\Http\Controllers\API\KeteranganAPIController;
use App\Http\Controllers\API\KonfigurasiAPIController;
use App\Http\Controllers\API\KonfigurasiUjianAPIController;
use App\Http\Controllers\API\KurikulumAPIController;
use App\Http\Controllers\API\KurikulumDetailAPIController;
use App\Http\Controllers\API\MahasiswaAPIController;
use App\Http\Controllers\API\MateriajarAPIController;
use App\Http\Controllers\API\NilaiAPIController;
use App\Http\Controllers\API\PerhitunganAPIController;
use App\Http\Controllers\API\PresensiAPIController;
use App\Http\Controllers\API\PukulAPIController;
use App\Http\Controllers\API\RuangAPIController;
use App\Http\Controllers\API\SemesterAPIController;
use App\Http\Controllers\API\SesiAPIController;
use App\Http\Controllers\API\TahunakademikAPIController;
use App\Http\Controllers\API\TugasPertemuanAPIController;
use App\Http\Controllers\API\UasAPIController;
use App\Http\Controllers\API\UtsAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ruang', [RuangAPIController::class, 'get_all'])->name('ruang.get');
Route::get('/sesi', [SesiAPIController::class, 'get_all'])->name('sesi.get');
Route::get('/pukul', [PukulAPIController::class, 'get_all'])->name('pukul.get');
Route::get('/jurusan', [JurusanAPIController::class, 'get_all'])->name('jurusan.get');
Route::get('/kelas', [KelasAPIController::class, 'get_all'])->name('kelas.get');
Route::get('/keterangan', [KeteranganAPIController::class, 'get_all'])->name('keterangan.get');
Route::get('/tahunakademik', [TahunakademikAPIController::class, 'get_all'])->name('tahunakademik.get');
Route::get('/materi_ajar', [MateriajarAPIController::class, 'get_all'])->name('materi_ajar.get');
Route::get('/semester', [SemesterAPIController::class, 'get_all'])->name('semester.get');
Route::get('/kurikulum', [KurikulumAPIController::class, 'get_all'])->name('kurikulum.get');
Route::get('/jadwal_reguler', [JadwalregulerAPIController::class, 'get_all'])->name('jadwal_reguler.get');
Route::get('/dosen', [DosenAPIController::class, 'get_all'])->name('jadwal_reguler.get');
Route::get('/konfigurasi', [KonfigurasiAPIController::class, 'get_all'])->name('konfigurasi.get');
Route::get('/kurikulum_detail', [KurikulumDetailAPIController::class, 'get_all'])->name('kurikulum.get');
Route::get('/perhitungan', [PerhitunganAPIController::class, 'get_all'])->name('perhitungan.get');
Route::get('/presensi', [PresensiAPIController::class, 'get_all'])->name('presensi.get');
Route::get('/detail_presensi', [DetailPresensiAPIController::class, 'get_all'])->name('detail_presensi.get');
Route::get('/pukul/{id}', [PukulAPIController::class, 'get_id']);
Route::get('/kurikulum_detail/{id}', [KurikulumDetailAPIController::class, 'get_id']);
Route::get('/kurikulum_detail_det/{id}', [KurikulumDetailAPIController::class, 'get_id_det']);
Route::get('/kurikulum_matkul/{id}', [KurikulumDetailAPIController::class, 'get_id_matkul']);
Route::get('/kelas/{id}', [KelasAPIController::class, 'get_id']);
Route::get('/hari', [HariAPIController::class, 'get_all'])->name('hari.get');
Route::get('/detail_formatif', [DetailFormatifAPIController::class, 'get_all'])->name('detail.get');
Route::post('/integration/pmb', [IntegrationPMBOnline::class, 'integrate']);

Route::get('/integration', [IntegrationPMBOnline::class, 'get_all'])->name('integration.get');

Route::get('/tugas', [TugasPertemuanAPIController::class, 'get_all'])->name('tugas.get');
Route::get('/nilai', [NilaiAPIController::class, 'get_all'])->name('nilai.get');
Route::get('/konfigurasi_ujian', [KonfigurasiUjianAPIController::class, 'get_all'])->name('konfigurasi_ujian.get');
Route::get('/uts', [UtsAPIController::class, 'get_all'])->name('uts.get');
Route::get('/detail_uts', [DetailUtsAPIController::class, 'get_all'])->name('detail_uts.get');
Route::get('/uas', [UasAPIController::class, 'get_all'])->name('uas.get');
Route::get('/detail_uas', [DetailUasAPIController::class, 'get_all'])->name('detail_uas.get');
Route::get('/formatif', [FormatifAPIController::class, 'get_all'])->name('formatif.get');
Route::get('/mahasiswa', [MahasiswaAPIController::class, 'get_all'])->name('mahasiswa.get');
Route::get('/fakultas', [FakultasAPIController::class, 'get_all'])->name('fakultas.get');
// Route::get('/recruitment/{id}', [PukulAPIController::class, 'get_code'])->name('recruitment.get');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
