<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_reguler', function (Blueprint $table) {
            $table->id();
            $table->string('id_jadwal');
            $table->integer('id_hari');
            $table->integer('id_sesi');
            $table->integer('id_sesi2')->nullable();
            $table->integer('id_detail_kurikulum');
            $table->integer('id_ruang');
            $table->integer('id_dosen');
            $table->integer('id_kelas');
            $table->integer('id_tahun_akademik');
            $table->integer('id_kurikulum');
            $table->integer('id_keterangan');
            $table->integer('id_perhitungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_reguler');
    }
};
