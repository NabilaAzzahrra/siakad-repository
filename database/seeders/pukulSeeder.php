<?php

namespace Database\Seeders;

use App\Models\Pukul;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class pukulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pukul')->insert([
            ['pukul' => '8.00 - 9.40'],
            ['pukul' => '9.50 - 11.30'],
            ['pukul' => '12.30 - 14.10'],
            ['pukul' => '14.20 - 16.00'],
            ['pukul' => '16.10 - 17.50'],
            ['pukul' => '18.30 - 20.10'],
        ]);
    }
}