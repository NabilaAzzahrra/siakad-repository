<?php

namespace Database\Seeders;

use App\Models\Semester;
use App\Models\Keterangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class keteranganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keterangan')->insert([
            ['keterangan' => 'Ganjil'],
            ['keterangan' => 'Genap'],
        ]);
    }
}