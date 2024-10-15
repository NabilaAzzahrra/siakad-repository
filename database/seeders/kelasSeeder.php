<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class kelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            ['id_jurusan' => '1', 'kelas' => 'MI23B', 'id_dosen' => '1'],
            ['id_jurusan' => '2', 'kelas' => 'MI23A', 'id_dosen' => '2'],
            ['id_jurusan' => '3', 'kelas' => 'MI24', 'id_dosen' => '3'],
        ]);
    }
}
