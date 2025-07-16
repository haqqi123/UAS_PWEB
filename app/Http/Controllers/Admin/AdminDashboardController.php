<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\UMKM;
use App\Models\PopulationStatistic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get total counts
        $totalUMKM = UMKM::count();
        $pendingUMKM = UMKM::where('status', 'menunggu')->count();
        $totalArticles = Article::count();
        $totalPopulation = PopulationStatistic::latest()->first()?->total_penduduk ?? 0;

        // Get monthly UMKM growth
        $monthlyUMKM = UMKM::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total', 'month')
            ->toArray();

        // Calculate percentage changes
        $lastMonthUMKM = UMKM::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
        $thisMonthUMKM = UMKM::whereMonth('created_at', Carbon::now()->month)->count();
        $umkmGrowth = $lastMonthUMKM > 0
            ? round((($thisMonthUMKM - $lastMonthUMKM) / $lastMonthUMKM) * 100, 1)
            : 0;

        // Get latest pending UMKMs
        $latestPendingUMKM = UMKM::where('status', 'menunggu')
            ->latest()
            ->take(5)
            ->get();

        // Get latest articles
        $latestArticles = Article::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalUMKM',
            'pendingUMKM',
            'totalArticles',
            'totalPopulation',
            'monthlyUMKM',
            'umkmGrowth',
            'latestPendingUMKM',
            'latestArticles'
        ));
    }
}
