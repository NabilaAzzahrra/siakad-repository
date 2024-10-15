<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class dosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert([
            ['kode_dosen' => '001', 'nama_dosen' => 'Nabila Azzahra', 'email' => 'nabila@gmail.com', 'no_hp' => '088218267306', 'password' => Hash::make('password')],
            ['kode_dosen' => '002', 'nama_dosen' => 'Haisyam Maulana', 'email' => 'haisyam@gmail.com', 'no_hp' => '08573240129', 'password' => Hash::make('password')],
            ['kode_dosen' => '003', 'nama_dosen' => 'Ade Fuad', 'email' => 'adefuad@gmail.com', 'no_hp' => '082194173208', 'password' => Hash::make('password')],
        ]);

    }
}