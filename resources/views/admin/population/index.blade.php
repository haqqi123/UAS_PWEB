@extends('admin.layouts.admin')

@section('title', 'Statistik Penduduk')
@section('page-title', 'Statistik Penduduk')

@section('content')
    <div class="space-y-6">
        <!-- Header Actions -->
        <div class="flex justify-between">
            <div class="flex items-center gap-4">
                <form action="{{ route('admin.population.index') }}" method="GET" class="flex gap-4">
                    <!-- Year -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Tahun</label>
                        <select name="year"
                            class="border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @foreach ($years as $year)
                                <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Month -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Bulan</label>
                        <select name="month"
                            class="border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}" {{ $selectedMonth == $month ? 'selected' : '' }}>
                                    {{ Carbon\Carbon::create(null, $month, 1)->format('F') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="self-end">
                        <button type="submit" class="btn-primary">
                            <i class="mr-2 fas fa-filter"></i>
                            Filter
                        </button>
                    </div>
                </form>
            </div>

            <a href="{{ route('admin.population.create') }}" class="btn-primary">
                <i class="mr-2 fas fa-plus"></i>
                Input Data Baru
            </a>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <!-- Trend Chart -->
            <div class="col-span-2 p-6 bg-white shadow-md rounded-2xl">
                <h3 class="mb-4 text-lg font-semibold text-gray-800">Trend 6 Bulan Terakhir</h3>
                <div class="h-[300px]">
                    <canvas id="trendChart"></canvas>
                </div>
            </div>

            <!-- Age Distribution -->
            <div class="p-6 bg-white shadow-md rounded-2xl">
                <h3 class="mb-4 text-lg font-semibold text-gray-800">Distribusi Usia</h3>
                <div class="h-[300px]">
                    <canvas id="ageChart"></canvas>
                </div>
            </div>

            <!-- Gender Distribution -->
            <div class="p-6 bg-white shadow-md rounded-2xl">
                <h3 class="mb-4 text-lg font-semibold text-gray-800">Distribusi Gender</h3>
                <div class="h-[300px]">
                    <canvas id="genderChart"></canvas>
                </div>
            </div>

            <!-- Occupation Distribution -->
            <div class="col-span-2 p-6 bg-white shadow-md rounded-2xl">
                <h3 class="mb-4 text-lg font-semibold text-gray-800">Distribusi Pekerjaan</h3>
                <div class="h-[300px]">
                    <canvas id="occupationChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Current Data Table -->
        <div class="bg-white shadow-md rounded-2xl">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Data Statistik
                        {{ Carbon\Carbon::create($selectedYear, $selectedMonth, 1)->format('F Y') }}</h3>
                    @if ($currentData)
                        <a href="{{ route('admin.population.edit', $currentData->id) }}" class="btn-primary">
                            <i class="mr-2 fas fa-edit"></i>
                            Edit Data
                        </a>
                    @endif
                </div>

                @if ($currentData)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-sm font-medium text-left text-gray-500 border-b">
                                    <th class="pb-3 pr-4">Kategori</th>
                                    <th class="pb-3 pr-4">Jumlah</th>
                                    <th class="pb-3 pr-4">Perubahan (Bulanan)</th>
                                    <th class="pb-3">Perubahan (Tahunan)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @php
                                    $categories = [
                                        'total_penduduk' => 'Total Penduduk',
                                        'jumlah_kk' => 'Jumlah KK',
                                        'anak' => 'Anak-anak',
                                        'remaja' => 'Remaja',
                                        'dewasa' => 'Dewasa',
                                        'lansia' => 'Lansia',
                                        'laki_laki' => 'Laki-laki',
                                        'perempuan' => 'Perempuan',
                                        'petani' => 'Petani',
                                        'nelayan' => 'Nelayan',
                                        'wiraswasta' => 'Wiraswasta',
                                        'pekerjaan_lain' => 'Pekerjaan Lain',
                                    ];
                                @endphp

                                @foreach ($categories as $key => $label)
                                    <tr class="text-sm text-gray-600">
                                        <td class="py-3 pr-4">{{ $label }}</td>
                                        <td class="py-3 pr-4">{{ number_format($currentData->$key) }}</td>
                                        <td class="py-3 pr-4">
                                            @if (isset($monthlyChanges[$key]))
                                                <div class="flex items-center">
                                                    @if ($monthlyChanges[$key]['value'] > 0)
                                                        <i class="mr-1 text-green-500 fas fa-arrow-up"></i>
                                                    @elseif($monthlyChanges[$key]['value'] < 0)
                                                        <i class="mr-1 text-red-500 fas fa-arrow-down"></i>
                                                    @else
                                                        <i class="mr-1 text-gray-500 fas fa-minus"></i>
                                                    @endif
                                                    <span
                                                        class="{{ $monthlyChanges[$key]['value'] > 0 ? 'text-green-500' : ($monthlyChanges[$key]['value'] < 0 ? 'text-red-500' : 'text-gray-500') }}">
                                                        {{ $monthlyChanges[$key]['value'] > 0 ? '+' : '' }}{{ number_format($monthlyChanges[$key]['value']) }}
                                                        ({{ $monthlyChanges[$key]['percentage'] }}%)
                                                    </span>
                                                </div>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            @if (isset($yearlyChanges[$key]))
                                                <div class="flex items-center">
                                                    @if ($yearlyChanges[$key]['value'] > 0)
                                                        <i class="mr-1 text-green-500 fas fa-arrow-up"></i>
                                                    @elseif($yearlyChanges[$key]['value'] < 0)
                                                        <i class="mr-1 text-red-500 fas fa-arrow-down"></i>
                                                    @else
                                                        <i class="mr-1 text-gray-500 fas fa-minus"></i>
                                                    @endif
                                                    <span
                                                        class="{{ $yearlyChanges[$key]['value'] > 0 ? 'text-green-500' : ($yearlyChanges[$key]['value'] < 0 ? 'text-red-500' : 'text-gray-500') }}">
                                                        {{ $yearlyChanges[$key]['value'] > 0 ? '+' : '' }}{{ number_format($yearlyChanges[$key]['value']) }}
                                                        ({{ $yearlyChanges[$key]['percentage'] }}%)
                                                    </span>
                                                </div>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-4 text-center text-gray-500">
                        Tidak ada data untuk periode ini
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Trend Chart
        new Chart(document.getElementById('trendChart'), {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Total Penduduk',
                    data: @json($datasets['total_penduduk']),
                    borderColor: '#5B8BB8',
                    tension: 0.4,
                    fill: false,
                    pointRadius: 4,
                    pointBackgroundColor: '#5B8BB8'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw;
                                let prevValue = context.dataIndex > 0 ? context.dataset.data[context.dataIndex -
                                    1] : null;
                                let growth = prevValue ? ((value - prevValue) / prevValue * 100).toFixed(1) : 0;
                                let sign = growth > 0 ? '+' : '';
                                return [
                                    `Total: ${new Intl.NumberFormat('id-ID').format(value)} jiwa`,
                                    `Pertumbuhan: ${sign}${growth}%`
                                ];
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return new Intl.NumberFormat('id-ID').format(value);
                            }
                        }
                    }
                }
            }
        });

        // Age Distribution Chart
        new Chart(document.getElementById('ageChart'), {
            type: 'pie',
            data: {
                labels: ['Anak-anak', 'Remaja', 'Dewasa', 'Lansia'],
                datasets: [{
                    data: [
                        {{ $currentData?->anak ?? 0 }},
                        {{ $currentData?->remaja ?? 0 }},
                        {{ $currentData?->dewasa ?? 0 }},
                        {{ $currentData?->lansia ?? 0 }}
                    ],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw;
                                let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                let percentage = ((value / total) * 100).toFixed(1);
                                return `${context.label}: ${new Intl.NumberFormat('id-ID').format(value)} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        // Gender Distribution Chart
        new Chart(document.getElementById('genderChart'), {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [
                        {{ $currentData?->laki_laki ?? 0 }},
                        {{ $currentData?->perempuan ?? 0 }}
                    ],
                    backgroundColor: ['#36A2EB', '#FF6384']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw;
                                let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                let percentage = ((value / total) * 100).toFixed(1);
                                return `${context.label}: ${new Intl.NumberFormat('id-ID').format(value)} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        // Occupation Distribution Chart
        new Chart(document.getElementById('occupationChart'), {
            type: 'bar',
            data: {
                labels: ['Petani', 'Nelayan', 'Wiraswasta', 'Pekerjaan Lain'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        {{ $currentData?->petani ?? 0 }},
                        {{ $currentData?->nelayan ?? 0 }},
                        {{ $currentData?->wiraswasta ?? 0 }},
                        {{ $currentData?->pekerjaan_lain ?? 0 }}
                    ],
                    backgroundColor: '#5B8BB8'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw;
                                let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                let percentage = ((value / total) * 100).toFixed(1);
                                return `${context.label}: ${new Intl.NumberFormat('id-ID').format(value)} (${percentage}%)`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return new Intl.NumberFormat('id-ID').format(value);
                            }
                        }
                    }
                }
            }
        });
    </script>
@endpush
