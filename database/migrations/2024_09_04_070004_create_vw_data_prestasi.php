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
            SELECT
                detail_kurikulum.id,
                detail_kurikulum.id_materi_ajar,
                materi_ajar.materi_ajar,
                materi_ajar.sks,
                materi_ajar.id_semester,
                materi_ajar.id_jurusan,
                semester.semester,
                jadwal_reguler.id_jadwal,
                jadwal_reguler.id_hari,
                jadwal_reguler.id_sesi,
                jadwal_reguler.id_ruang,
                jadwal_reguler.id_kelas,
                jadwal_reguler.id_tahun_akademik,
                jadwal_reguler.id_kurikulum,
                jadwal_reguler.id_keterangan,
                jadwal_reguler.id_perhitungan,
                nilai.id_nilai,
                nilai.nim,
                nilai.presensi,
                nilai.tugas,
                nilai.formatif,
                nilai.uts,
                nilai.uas
            FROM
                detail_kurikulum
                INNER JOIN materi_ajar ON materi_ajar.id = detail_kurikulum.id_materi_ajar
                INNER JOIN semester ON semester.id = materi_ajar.id_semester
                LEFT JOIN jadwal_reguler ON jadwal_reguler.id_detail_kurikulum = detail_kurikulum.id
                LEFT JOIN nilai ON nilai.id_jadwal = jadwal_reguler.id_jadwal
                LEFT JOIN kelas ON kelas.id = jadwal_reguler.id_kelas
                LEFT JOIN jurusan ON jurusan.id = kelas.id_jurusan;
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
