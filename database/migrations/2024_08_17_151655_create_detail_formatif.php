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
        Schema::create('detail_formatif', function (Blueprint $table) {
            $table->id();
            $table->string('id_formatif');
            $table->string('nim');
            $table->string('jawaban');
            $table->dateTime('tgl_pengumpulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_formatif');
    }
};
