<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class jurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusan')->insert([
            ['jurusan' => 'Manajemen Informatika'],
            ['jurusan' => 'Manajemen Keuangan Perbankan'],
            ['jurusan' => 'Manajemen Pemasaran'],
            ['jurusan' => 'Administrasi Bisnis'],
            ['jurusan' => 'Teknik Otomotif'],
        ]);
    }
}
