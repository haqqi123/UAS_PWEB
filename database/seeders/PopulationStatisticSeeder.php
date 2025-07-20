<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PopulationStatistic;
use Carbon\Carbon;

class PopulationStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        PopulationStatistic::truncate();

        // Base numbers for initial month (start of 2024)
        $baseData = [
            'total_penduduk' => 3200, // Smaller initial number for 2024
            'anak' => 640,      // 20%
            'remaja' => 736,    // 23%
            'dewasa' => 1280,   // 40%
            'lansia' => 544,    // 17%
            'laki_laki' => 1632,  // ~51%
            'perempuan' => 1568,  // ~49%
            'petani' => 1088,     // ~34%
            'nelayan' => 288,     // ~9%
            'wiraswasta' => 832,  // ~26%
            'pekerjaan_lain' => 992, // ~31%
            'jumlah_kk' => 850,
        ];

        // Growth factors for 2024 (monthly changes in percentage)
        $monthlyGrowth2024 = [
            'population' => [0.2, 0.15, -0.05, 0.2, 0.1, 0.15, 0.25, -0.1, 0.2, 0.15, 0.1, 0.3], // Jan-Dec 2024
            'kk' => [0.15, 0.1, 0, 0.15, 0.1, 0.1, 0.2, -0.05, 0.15, 0.1, 0.1, 0.25], // KK growth slightly lower
        ];

        // Growth factors for current year (monthly changes in percentage)
        $monthlyGrowth2025 = [
            'population' => [0.15, 0.2, -0.1, 0.25, 0.1, -0.05, 0.3, 0.15, -0.1, 0.2, 0.1, 0.25], // Current year
            'kk' => [0.1, 0.15, -0.05, 0.2, 0.1, 0, 0.25, 0.1, -0.05, 0.15, 0.1, 0.2], // KK growth slightly lower
        ];

        // Function to create monthly record
        $createMonthlyRecord = function ($date, $data, $growth) use (&$baseData) {
            // Create record
            PopulationStatistic::create([
                'total_penduduk' => $data['total_penduduk'],
                'anak' => $data['anak'],
                'remaja' => $data['remaja'],
                'dewasa' => $data['dewasa'],
                'lansia' => $data['lansia'],
                'laki_laki' => $data['laki_laki'],
                'perempuan' => $data['perempuan'],
                'petani' => $data['petani'],
                'nelayan' => $data['nelayan'],
                'wiraswasta' => $data['wiraswasta'],
                'pekerjaan_lain' => $data['pekerjaan_lain'],
                'jumlah_kk' => $data['jumlah_kk'],
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            // Calculate next month's data
            $monthIndex = $date->month - 1; // 0-based index for array
            $populationGrowth = $growth['population'][$monthIndex] / 100;
            $kkGrowth = $growth['kk'][$monthIndex] / 100;

            // Update base data for next month
            $newTotalPenduduk = round($data['total_penduduk'] * (1 + $populationGrowth));
            $variation = rand(-5, 5) / 1000; // ±0.5% random variation

            $baseData = [
                'total_penduduk' => $newTotalPenduduk,
                'anak' => round($newTotalPenduduk * (0.20 + $variation)),
                'remaja' => round($newTotalPenduduk * (0.23 + $variation)),
                'dewasa' => round($newTotalPenduduk * (0.40 + $variation)),
                'lansia' => 0, // Will be calculated to ensure total matches
                'laki_laki' => round($newTotalPenduduk * (0.51 + $variation)),
                'perempuan' => 0, // Will be calculated to ensure total matches
                'jumlah_kk' => round($data['jumlah_kk'] * (1 + $kkGrowth)),
            ];

            // Ensure totals match
            $baseData['lansia'] = $newTotalPenduduk - ($baseData['anak'] + $baseData['remaja'] + $baseData['dewasa']);
            $baseData['perempuan'] = $newTotalPenduduk - $baseData['laki_laki'];

            // Calculate occupation distribution based on working age population
            $workingAgePop = $baseData['remaja'] + $baseData['dewasa'] + $baseData['lansia'];
            $baseData['petani'] = round($workingAgePop * (0.34 + $variation));
            $baseData['nelayan'] = round($workingAgePop * (0.09 + $variation));
            $baseData['wiraswasta'] = round($workingAgePop * (0.26 + $variation));
            $baseData['pekerjaan_lain'] = $workingAgePop - ($baseData['petani'] + $baseData['nelayan'] + $baseData['wiraswasta']);

            return $baseData;
        };

        // Generate data for 2024
        $currentData = $baseData;
        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::create(2024, $month, 1)->startOfMonth();
            $currentData = $createMonthlyRecord($date, $currentData, $monthlyGrowth2024);
        }

        // Generate data for 2025
        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::create(2025, $month, 1)->startOfMonth();
            $currentData = $createMonthlyRecord($date, $currentData, $monthlyGrowth2025);
        }
    }
}
