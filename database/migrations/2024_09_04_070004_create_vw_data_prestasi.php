<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('DROP VIEW IF EXISTS vw_data_prestasi;');
        DB::statement('
                CREATE VIEW vw_data_prestasi AS
                SELECT jadwal_reguler.id_jadwal, jadwal_reguler.id_perhitungan, materi_ajar.materi_ajar, materi_ajar.sks, kurikulum.id AS id_kurikulum, semester.semester, jurusan.jurusan, mahasiswa.nim, mahasiswa.nama, kelas.kelas, COALESCE(nilai.presensi, 0) AS presensi, COALESCE(nilai.tugas, 0) AS tugas, COALESCE(nilai.formatif, 0) AS formatif, COALESCE(nilai.uts, 0) AS uts, COALESCE(nilai.uas, 0) AS uas FROM jadwal_reguler
                RIGHT JOIN detail_kurikulum ON detail_kurikulum.id = jadwal_reguler.id_detail_kurikulum
                JOIN kurikulum ON kurikulum.id = detail_kurikulum.id_kurikulum
                JOIN materi_ajar ON materi_ajar.id = detail_kurikulum.id_materi_ajar
                JOIN semester ON semester.id = materi_ajar.id_semester
                JOIN jurusan ON jurusan.id = materi_ajar.id_jurusan
                LEFT JOIN mahasiswa ON mahasiswa.id_kelas = jadwal_reguler.id_kelas
                LEFT JOIN kelas ON kelas.id = mahasiswa.id_kelas
                LEFT JOIN nilai ON nilai.id_jadwal = jadwal_reguler.id_jadwal AND nilai.nim = mahasiswa.nim;
            ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vw_data_prestasi;');
    }
};
