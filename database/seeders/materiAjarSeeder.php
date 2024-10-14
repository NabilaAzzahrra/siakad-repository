<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class materiAjarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materi_ajar')->insert([
            ['materi_ajar' => 'Pengenalan Database', 'sks' => '2', 'id_semester' => '1', 'ebook' => 'ebook Database', 'id_jurusan' => '1'],
            ['materi_ajar' => 'Pengenalan Jaringan', 'sks' => '4', 'id_semester' => '2', 'ebook' => 'ebook Jaringan', 'id_jurusan' => '1'],
            ['materi_ajar' => 'Pengenalan OOP', 'sks' => '2', 'id_semester' => '1', 'ebook' => 'ebook OOP', 'id_jurusan' => '1'],
        ]);
    }
}