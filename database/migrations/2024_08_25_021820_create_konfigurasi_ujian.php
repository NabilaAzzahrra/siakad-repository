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
        Schema::create('konfigurasi_ujian', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tahun_akademik');
            $table->integer('id_keterangan');
            $table->string('jenis_ujian');
            $table->date('tgl_mulai');
            $table->date('tgl_susulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfigurasi_ujian');
    }
};
