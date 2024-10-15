<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class perhitunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perhitungan')->insert([
            ['nama_perhitungan' => 'Perhitungan Nilai Pertemuan 1', 'presensi' => '30', 'tugas' => '70', 'formatif' => '80', 'uts' => '85', 'uas' => '89'],
            ['nama_perhitungan' => 'Perhitungan Nilai Pertemuan 2', 'presensi' => '40', 'tugas' => '80', 'formatif' => '83', 'uts' => '95', 'uas' => '89'],
            ['nama_perhitungan' => 'Perhitungan Nilai Pertemuan 3', 'presensi' => '50', 'tugas' => '78', 'formatif' => '88', 'uts' => '87', 'uas' => '84']
        ]);
    }
}