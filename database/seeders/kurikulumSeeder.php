<?php

namespace Database\Seeders;

use App\Models\Kurikulum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class kurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kurikulum')->insert([
            ['kurikulum' => 'Merdeka', 'tahun' => '2024'],
            ['kurikulum' => 'Kurikulum Tiga Belas', 'tahun' => '2013'],
        ]);
    }
}