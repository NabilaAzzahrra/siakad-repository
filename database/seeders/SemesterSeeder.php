<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    public function run()
    {
        DB::table('semester')->insert([
            [
                'id' => 1,
                'semester' => 1,
                'id_keterangan' => 1,
                'created_at' => '2024-08-13 08:53:47',
                'updated_at' => '2024-08-13 08:53:47'
            ],
            [
                'id' => 2,
                'semester' => 2,
                'id_keterangan' => 2,
                'created_at' => '2024-08-13 08:53:50',
                'updated_at' => '2024-08-13 08:53:50'
            ],
            [
                'id' => 3,
                'semester' => 3,
                'id_keterangan' => 1,
                'created_at' => '2024-08-13 08:53:50',
                'updated_at' => '2024-08-13 08:53:50'
            ],
            [
                'id' => 4,
                'semester' => 4,
                'id_keterangan' => 2,
                'created_at' => '2024-08-13 08:53:58',
                'updated_at' => '2024-08-13 08:53:58'
            ]
        ]);
    }
}

