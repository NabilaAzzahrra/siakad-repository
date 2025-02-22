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
        Schema::create('nilai_pembimbing', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('id_pembimbing');
            $table->string('sikap');
            $table->string('intensitas_kesungguhan');
            $table->string('kedalaman_materi');
            $table->string('verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_pembimbing');
    }
};
