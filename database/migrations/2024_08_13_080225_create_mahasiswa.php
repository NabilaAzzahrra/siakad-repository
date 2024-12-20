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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 50)->unique()->nullable();
            $table->string('nim')->nullable()->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->integer('id_kelas')->nullable();
            $table->integer('tingkat')->nullable();
            $table->string('no_hp')->unique();
            $table->boolean('status')->default(true);
            $table->integer('tahun_angkatan');
            $table->string('keaktifan')->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
