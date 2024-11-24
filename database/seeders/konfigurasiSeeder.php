<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class konfigurasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('konfigurasi')->insert([
            ['id_tahun_akademik' => '1', 'id_keterangan' => '1', 'id_kurikulum' => '1', 'id_perhitungan' => '1', 'jml_pertemuan' => '14'],
        ]);
    }
}