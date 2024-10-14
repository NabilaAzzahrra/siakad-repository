<?php

namespace Database\Seeders;

use App\Models\Tahunakademik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tahun_akademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahunAkademikData = [
            ['tahunakademik' => '2023/2024'],
            ['tahunakademik' => '2024/2025'],
            ['tahunakademik' => '2025/2026'],
        ];

        foreach ($tahunAkademikData as $data) {
            Tahunakademik::create($data);
        }
    }

}