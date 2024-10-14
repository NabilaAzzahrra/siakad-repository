<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class informasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('informasi')->insert([
            ['title' => 'Waktu Pembayaran KRS', 'informasi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, laudantium?', 'kategori' => 'Pemberitahuan'],
            ['title' => 'Waktu Pengumpulan Judul Sidang', 'informasi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, laudantium?', 'kategori' => 'Peringatan'],
            ['title' => 'Waktu Daftar Ulang', 'informasi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, laudantium?', 'kategori' => 'Pemberitahuan'],
        ]);
    }
}