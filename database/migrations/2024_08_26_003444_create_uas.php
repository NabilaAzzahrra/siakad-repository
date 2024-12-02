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
        Schema::create('uas', function (Blueprint $table) {
            $table->id();
            $table->string('id_jadwal');
            $table->string('id_uas');
            $table->string('file_utama');
            $table->string('file_cadangan')->null();
            $table->string('tgl_ujian');
            $table->string('waktu_ujian');
            $table->string('tgl_ujian_susulan')->null();
            $table->boolean('verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uas');
    }
};
