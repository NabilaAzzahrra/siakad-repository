<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class konfigurasiUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('konfigurasi_ujian')->insert([
            ['id_tahun_akademik' => '1', 'id_keterangan' => '1', 'jenis_ujian' => 'UTS', 'tgl_mulai' => '2024-04-20'],
            ['id_tahun_akademik' => '2', 'id_keterangan' => '2', 'jenis_ujian' => 'UAS', 'tgl_mulai' => '2024-06-09'],
            ['id_tahun_akademik' => '1', 'id_keterangan' => '3', 'jenis_ujian' => 'UTS', 'tgl_mulai' => '2024-12-11'],
        ]);
    }
}