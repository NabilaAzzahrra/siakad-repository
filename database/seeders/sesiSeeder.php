<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class sesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sesi')->insert([
            ['sesi'  =>  'Sesi 1', 'id_pukul'    =>  1],
            ['sesi'  =>  'Sesi 2', 'id_pukul'    =>  2],
            ['sesi'  =>  'Sesi 3', 'id_pukul'    =>  3],
            ['sesi'  =>  'Sesi 4', 'id_pukul'    =>  4],
            ['sesi'  =>  'Sesi 5', 'id_pukul'    =>  5],
            ['sesi'  =>  'Sesi 6', 'id_pukul'    =>  6],
        ]);
    }
}
