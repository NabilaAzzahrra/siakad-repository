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
        Schema::create('penguji', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sidang');
            $table->string('nim');
            $table->integer('id_dosen');
            $table->integer('id_penguji');
            $table->date('tgl_sidang');
            $table->string('pukul');
            $table->integer('id_ruang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguji');
    }
};
