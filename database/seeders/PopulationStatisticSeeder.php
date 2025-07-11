<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PopulationStatistic;

class PopulationStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PopulationStatistic::create([
            'total_penduduk' => 3500,
            'anak' => 700,
            'remaja' => 800,
            'dewasa' => 1400,
            'lansia' => 600,
            'laki_laki' => 1800,
            'perempuan' => 1700,
            'petani' => 1200,
            'nelayan' => 300,
            'wiraswasta' => 900,
            'pekerjaan_lain' => 1100,
            'jumlah_kk' => 950,
        ]);
    }
}
