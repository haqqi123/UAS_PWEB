<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PopulationStatistic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPopulationController extends Controller
{
    public function index(Request $request)
    {
        // Get selected year and month or default to current
        $selectedYear = $request->year ?? now()->year;
        $selectedMonth = $request->month ?? now()->month;
        $selectedDate = Carbon::createFromDate($selectedYear, $selectedMonth, 1);

        // Get current period data
        $currentData = PopulationStatistic::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)
            ->first();

        // Get last month data for comparison
        $lastMonthDate = $selectedDate->copy()->subMonth();
        $lastMonthData = PopulationStatistic::whereYear('created_at', $lastMonthDate->year)
            ->whereMonth('created_at', $lastMonthDate->month)
            ->first();

        // Get last year same month data for comparison
        $lastYearData = PopulationStatistic::whereYear('created_at', $selectedYear - 1)
            ->whereMonth('created_at', $selectedMonth)
            ->first();

        // Get last 6 months data for trend, including the selected month
        $startDate = $selectedDate->copy()->subMonths(5)->startOfMonth(); // 5 months back + current month = 6 months
        $trendData = PopulationStatistic::where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $selectedDate->endOfMonth())
            ->orderBy('created_at', 'asc')
            ->get();

        // Calculate month-over-month changes
        $monthlyChanges = [];
        if ($currentData && $lastMonthData) {
            foreach ($currentData->getFillable() as $field) {
                $current = $currentData->$field;
                $last = $lastMonthData->$field;
                $monthlyChanges[$field] = [
                    'value' => $current - $last,
                    'percentage' => $last > 0 ? round(($current - $last) / $last * 100, 1) : 0
                ];
            }
        }

        // Calculate year-over-year changes
        $yearlyChanges = [];
        if ($currentData && $lastYearData) {
            foreach ($currentData->getFillable() as $field) {
                $current = $currentData->$field;
                $last = $lastYearData->$field;
                $yearlyChanges[$field] = [
                    'value' => $current - $last,
                    'percentage' => $last > 0 ? round(($current - $last) / $last * 100, 1) : 0
                ];
            }
        }

        // Prepare trend data for charts
        $labels = $trendData->map(fn($data) => $data->created_at->format('M Y'));
        $datasets = [
            'total_penduduk' => $trendData->pluck('total_penduduk'),
            'usia' => [
                'anak' => $trendData->pluck('anak'),
                'remaja' => $trendData->pluck('remaja'),
                'dewasa' => $trendData->pluck('dewasa'),
                'lansia' => $trendData->pluck('lansia'),
            ],
            'gender' => [
                'laki_laki' => $trendData->pluck('laki_laki'),
                'perempuan' => $trendData->pluck('perempuan'),
            ],
            'pekerjaan' => [
                'petani' => $trendData->pluck('petani'),
                'nelayan' => $trendData->pluck('nelayan'),
                'wiraswasta' => $trendData->pluck('wiraswasta'),
                'pekerjaan_lain' => $trendData->pluck('pekerjaan_lain'),
            ],
        ];

        // Get years for dropdown (last 5 years)
        $years = range(now()->year, now()->year - 4);

        return view('admin.population.index', compact(
            'currentData',
            'monthlyChanges',
            'yearlyChanges',
            'labels',
            'datasets',
            'years',
            'selectedYear',
            'selectedMonth'
        ));
    }

    public function create()
    {
        // Get last month's data
        $lastMonthData = PopulationStatistic::orderBy('created_at', 'desc')->first();

        // Get available years and months (exclude existing records)
        $existingDates = PopulationStatistic::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
            ->get()
            ->map(function ($item) {
                return $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT);
            })
            ->toArray();

        // Get years (current year and next year only)
        $years = [now()->year, now()->year + 1];

        return view('admin.population.create', compact('lastMonthData', 'existingDates', 'years'));
    }

    public function store(Request $request)
    {
        // Validate basic required fields
        $validated = $request->validate([
            'year' => 'required|integer',
            'month' => 'required|integer|between:1,12',
            'total_penduduk' => 'required|integer|min:1',
            'jumlah_kk' => 'required|integer|min:1',
            'anak' => 'required|integer|min:0',
            'remaja' => 'required|integer|min:0',
            'dewasa' => 'required|integer|min:0',
            'lansia' => 'required|integer|min:0',
            'laki_laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0',
            'petani' => 'required|integer|min:0',
            'perkebunan' => 'required|integer|min:0',
            'perdagangan' => 'required|integer|min:0',
            'pegawai_negeri_sipil' => 'required|integer|min:0',
            'pegawai_swasta' => 'required|integer|min:0',
            'buruh_tani' => 'required|integer|min:0',
            'pengrajin' => 'required|integer|min:0',
            'tukang_kayu' => 'required|integer|min:0',
            'batu' => 'required|integer|min:0',
            'polri' => 'required|integer|min:0',
            'tni' => 'required|integer|min:0',
            'jasa' => 'required|integer|min:0',
        ]);

        // Check if data for this month already exists
        $exists = PopulationStatistic::whereYear('created_at', $request->year)
            ->whereMonth('created_at', $request->month)
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors(['date' => 'Data untuk periode ini sudah ada.']);
        }

        // Convert request data to integers and calculate totals
        $totalPenduduk = (int) $request->total_penduduk;
        $totalUsia = (int) $request->anak + (int) $request->remaja + (int) $request->dewasa + (int) $request->lansia;
        $totalGender = (int) $request->laki_laki + (int) $request->perempuan;

        if ($totalUsia !== $totalPenduduk) {
            return back()
                ->withInput()
                ->withErrors(['usia' => 'Total kategori usia harus sama dengan total penduduk.']);
        }

        if ($totalGender !== $totalPenduduk) {
            return back()
                ->withInput()
                ->withErrors(['gender' => 'Total kategori gender harus sama dengan total penduduk.']);
        }

        // Create record with the first day of the month
        $date = Carbon::create($request->year, $request->month, 1)->startOfMonth();

        PopulationStatistic::create([
            'total_penduduk' => $totalPenduduk,
            'anak' => (int) $request->anak,
            'remaja' => (int) $request->remaja,
            'dewasa' => (int) $request->dewasa,
            'lansia' => (int) $request->lansia,
            'laki_laki' => (int) $request->laki_laki,
            'perempuan' => (int) $request->perempuan,
            'jumlah_kk' => (int) $request->jumlah_kk,
            'petani' => (int) $request->petani,
            'perkebunan' => (int) $request->perkebunan,
            'perdagangan' => (int) $request->perdagangan,
            'pegawai_negeri_sipil' => (int) $request->pegawai_negeri_sipil,
            'pegawai_swasta' => (int) $request->pegawai_swasta,
            'buruh_tani' => (int) $request->buruh_tani,
            'pengrajin' => (int) $request->pengrajin,
            'tukang_kayu' => (int) $request->tukang_kayu,
            'batu' => (int) $request->batu,
            'polri' => (int) $request->polri,
            'tni' => (int) $request->tni,
            'jasa' => (int) $request->jasa,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        return redirect()
            ->route('admin.population.index')
            ->with('success', 'Data statistik penduduk berhasil ditambahkan.');
    }

    public function edit(PopulationStatistic $population)
    {
        // Get previous month's data
        $previousMonthData = PopulationStatistic::where('created_at', '<', $population->created_at)
            ->orderBy('created_at', 'desc')
            ->first();

        // Get next month's data
        $nextMonthData = PopulationStatistic::where('created_at', '>', $population->created_at)
            ->orderBy('created_at', 'asc')
            ->first();

        return view('admin.population.edit', compact('population', 'previousMonthData', 'nextMonthData'));
    }

    public function update(Request $request, PopulationStatistic $population)
    {
        // Validate basic required fields
        $validated = $request->validate([
            'total_penduduk' => 'required|integer|min:1',
            'jumlah_kk' => 'required|integer|min:1',
            'anak' => 'required|integer|min:0',
            'remaja' => 'required|integer|min:0',
            'dewasa' => 'required|integer|min:0',
            'lansia' => 'required|integer|min:0',
            'laki_laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0',
            'petani' => 'required|integer|min:0',
            'perkebunan' => 'required|integer|min:0',
            'perdagangan' => 'required|integer|min:0',
            'pegawai_negeri_sipil' => 'required|integer|min:0',
            'pegawai_swasta' => 'required|integer|min:0',
            'buruh_tani' => 'required|integer|min:0',
            'pengrajin' => 'required|integer|min:0',
            'tukang_kayu' => 'required|integer|min:0',
            'batu' => 'required|integer|min:0',
            'polri' => 'required|integer|min:0',
            'tni' => 'required|integer|min:0',
            'jasa' => 'required|integer|min:0',
        ]);

        // Convert request data to integers and calculate totals
        $totalPenduduk = (int) $request->total_penduduk;
        $totalUsia = (int) $request->anak + (int) $request->remaja + (int) $request->dewasa + (int) $request->lansia;
        $totalGender = (int) $request->laki_laki + (int) $request->perempuan;

        if ($totalUsia !== $totalPenduduk) {
            return back()
                ->withInput()
                ->withErrors(['usia' => 'Total kategori usia harus sama dengan total penduduk.']);
        }

        if ($totalGender !== $totalPenduduk) {
            return back()
                ->withInput()
                ->withErrors(['gender' => 'Total kategori gender harus sama dengan total penduduk.']);
        }

        // Update record
        $population->update([
            'total_penduduk' => $totalPenduduk,
            'anak' => (int) $request->anak,
            'remaja' => (int) $request->remaja,
            'dewasa' => (int) $request->dewasa,
            'lansia' => (int) $request->lansia,
            'laki_laki' => (int) $request->laki_laki,
            'perempuan' => (int) $request->perempuan,
            'jumlah_kk' => (int) $request->jumlah_kk,
            'petani' => (int) $request->petani,
            'perkebunan' => (int) $request->perkebunan,
            'perdagangan' => (int) $request->perdagangan,
            'pegawai_negeri_sipil' => (int) $request->pegawai_negeri_sipil,
            'pegawai_swasta' => (int) $request->pegawai_swasta,
            'buruh_tani' => (int) $request->buruh_tani,
            'pengrajin' => (int) $request->pengrajin,
            'tukang_kayu' => (int) $request->tukang_kayu,
            'batu' => (int) $request->batu,
            'polri' => (int) $request->polri,
            'tni' => (int) $request->tni,
            'jasa' => (int) $request->jasa,
        ]);

        return redirect()
            ->route('admin.population.index', [
                'year' => $population->created_at->year,
                'month' => $population->created_at->month,
            ])
            ->with('success', 'Data statistik penduduk berhasil diperbarui.');
    }
}
