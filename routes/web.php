<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalregulerController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KeteranganController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MateriajarController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PukulController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\TahunakademikController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('ruang',RuangController::class)->middleware(['auth']);
Route::resource('sesi',SesiController::class)->middleware(['auth']);
Route::resource('pukul',PukulController::class)->middleware(['auth']);
Route::resource('jurusan',JurusanController::class)->middleware(['auth']);
Route::resource('kelas',KelasController::class)->middleware(['auth']);
Route::resource('keterangan',KeteranganController::class)->middleware(['auth']);
Route::resource('tahunakademik',TahunakademikController::class)->middleware(['auth']);
Route::resource('materi_ajar',MateriajarController::class)->middleware(['auth']);
Route::resource('semester',SemesterController::class)->middleware(['auth']);
Route::resource('kurikulum',KurikulumController::class)->middleware(['auth']);
Route::resource('detail',DetailController::class)->middleware(['auth']);
Route::resource('jadwal_reguler',JadwalregulerController::class)->middleware(['auth']);
Route::resource('dosen',DosenController::class)->middleware(['auth']);
Route::resource('konfigurasi',KonfigurasiController::class)->middleware(['auth']);
Route::resource('perhitungan',PerhitunganController::class)->middleware(['auth']);
Route::post('/kurikulum/detail',[KurikulumController::class, 'detail'])->name('kurikulum.detail')->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
