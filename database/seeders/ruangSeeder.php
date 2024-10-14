<?php

namespace Database\Seeders;

use App\Models\Ruang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ruangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ruang')->insert([
            ['ruang' => 'Ruang 201'],
            ['ruang' => 'Ruang 202'],
            ['ruang' => 'LAB 1'],
            ['ruang' => 'Aula'],
            ['ruang' => 'Ruang 401'],
        ]);
    }
}