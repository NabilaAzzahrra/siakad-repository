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
        Schema::create('nilai_penguji', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('id_penguji');
            $table->string('penampilan');
            $table->string('bahasa_asing');
            $table->string('bahasa_indonesia');
            $table->string('teknik_presentasi');
            $table->string('metoda_penelitian');
            $table->string('penguasaan_teori');
            $table->string('verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_penguji');
    }
};
