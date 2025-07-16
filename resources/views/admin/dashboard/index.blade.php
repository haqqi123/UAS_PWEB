@extends('admin.layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total UMKM -->
        <x-admin.stats-card title="Total UMKM" :value="number_format($totalUMKM)" icon="fas fa-store" color="primary"
            :percentage="$umkmGrowth" :isIncrease="$umkmGrowth >= 0" />

        <!-- Pending UMKM -->
        <x-admin.stats-card title="UMKM Menunggu" :value="number_format($pendingUMKM)" icon="fas fa-clock" color="warning" />

        <!-- Total Articles -->
        <x-admin.stats-card title="Total Artikel" :value="number_format($totalArticles)" icon="fas fa-newspaper" color="success" />

        <!-- Total Population -->
        <x-admin.stats-card title="Total Penduduk" :value="number_format($totalPopulation)" icon="fas fa-users" color="info" />
    </div>

    <!-- Charts & Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- UMKM Growth Chart -->
        <x-admin.chart-card title="Pertumbuhan UMKM" chartId="umkmGrowthChart" height="300px">
            @slot('actions')
                <div class="flex items-center space-x-2">
                    <select id="umkmChartYear" class="form-select text-sm">
                        <option value="2024">2024</option>
                        <option value="2025" selected>2025</option>
                    </select>
                </div>
            @endslot
        </x-admin.chart-card>

        <!-- Latest Pending UMKM -->
        <div class="bg-white rounded-2xl shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h4 class="text-xl font-semibold text-gray-800">UMKM Menunggu Persetujuan</h4>
                <a href="{{ route('admin.umkm.index') }}?status=menunggu" class="text-primary hover:text-primary/80">
                    Lihat Semua
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-sm font-medium text-gray-500 border-b">
                            <th class="pb-3 pr-4">Nama Usaha</th>
                            <th class="pb-3 pr-4">Pemilik</th>
                            <th class="pb-3 pr-4">Tanggal Daftar</th>
                            <th class="pb-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($latestPendingUMKM as $umkm)
                            <tr class="text-sm text-gray-600">
                                <td class="py-3 pr-4">
                                    <div class="flex items-center">
                                        <img src="{{ asset($umkm->foto_url) }}" alt="{{ $umkm->nama_usaha }}"
                                            class="w-8 h-8 rounded-full object-cover mr-3">
                                        <span class="font-medium text-gray-800">{{ $umkm->nama_usaha }}</span>
                                    </div>
                                </td>
                                <td class="py-3 pr-4">{{ $umkm->nama_pemilik }}</td>
                                <td class="py-3 pr-4">{{ $umkm->created_at->format('d M Y') }}</td>
                                <td class="py-3">
                                    <a href="{{ route('admin.umkm.show', $umkm) }}"
                                        class="text-primary hover:text-primary/80">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-gray-500">
                                    Tidak ada UMKM yang menunggu persetujuan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Latest Articles -->
        <div class="bg-white rounded-2xl shadow-md p-6 lg:col-span-2">
            <div class="flex justify-between items-center mb-6">
                <h4 class="text-xl font-semibold text-gray-800">Artikel Terbaru</h4>
                <a href="{{ route('admin.articles.index') }}" class="text-primary hover:text-primary/80">
                    Lihat Semua
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-sm font-medium text-gray-500 border-b">
                            <th class="pb-3 pr-4">Judul</th>
                            <th class="pb-3 pr-4">Penulis</th>
                            <th class="pb-3 pr-4">Views</th>
                            <th class="pb-3 pr-4">Tanggal</th>
                            <th class="pb-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($latestArticles as $article)
                            <tr class="text-sm text-gray-600">
                                <td class="py-3 pr-4">
                                    <div class="flex items-center">
                                        @if ($article->thumbnail)
                                            <img src="{{ asset($article->thumbnail) }}" alt="{{ $article->judul }}"
                                                class="w-8 h-8 rounded object-cover mr-3">
                                        @else
                                            <div
                                                class="w-8 h-8 rounded bg-primary/10 flex items-center justify-center mr-3">
                                                <i class="fas fa-newspaper text-primary"></i>
                                            </div>
                                        @endif
                                        <span class="font-medium text-gray-800">{{ $article->judul }}</span>
                                    </div>
                                </td>
                                <td class="py-3 pr-4">{{ $article->penulis }}</td>
                                <td class="py-3 pr-4">{{ number_format($article->views) }}</td>
                                <td class="py-3 pr-4">{{ $article->created_at->format('d M Y') }}</td>
                                <td class="py-3">
                                    <a href="{{ route('admin.articles.edit', $article) }}"
                                        class="text-primary hover:text-primary/80">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 text-center text-gray-500">
                                    Belum ada artikel
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data untuk chart
            const monthlyData = @json($monthlyUMKM);
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const currentYear = new Date().getFullYear();

            // Prepare data
            const chartData = months.map((month, index) => {
                const key = `${currentYear}-${String(index + 1).padStart(2, '0')}`;
                return monthlyData[key] || 0;
            });

            // Create chart
            const ctx = document.getElementById('umkmGrowthChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'UMKM Baru',
                        data: chartData,
                        borderColor: '#5B8BB8',
                        backgroundColor: '#5B8BB8',
                        tension: 0.4,
                        pointRadius: 4,
                        pointBackgroundColor: '#5B8BB8'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                label: function(context) {
                                    return `${context.parsed.y} UMKM`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
