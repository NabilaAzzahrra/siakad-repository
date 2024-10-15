<?php

namespace Database\Seeders;

use App\Models\Hari;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class hariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hari')->insert([
            ['hari' => 'Senin'],
            ['hari' => 'Selasa'],
            ['hari' => 'Rabu'],
            ['hari' => 'Kamis'],
            ['hari' => 'Jumat'],
            ['hari' => 'Sabtu'],
            ['hari' => 'Minggu'],
        ]);
    }
}