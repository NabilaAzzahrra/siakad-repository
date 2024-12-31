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
        Schema::create('detail_revisi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sidang');
            $table->string('nim');
            $table->text('bab_satu');
            $table->text('bab_dua');
            $table->text('bab_tiga');
            $table->text('bab_empat');
            $table->text('bab_lima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_revisi');
    }
};
