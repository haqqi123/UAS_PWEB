@extends('admin.layouts.admin')

@section('title', 'Statistik Penduduk')
@section('page-title', 'Statistik Penduduk')

@section('content')
    <div class="space-y-6">
        <!-- Header Actions -->
        <div class="flex flex-col gap-4 lg:flex-row lg:justify-between">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end">
                <form action="{{ route('admin.population.index') }}" method="GET"
                    class="flex flex-col gap-3 sm:flex-row sm:gap-4">
                    <!-- Year -->
                    <div class="flex-1 sm:flex-none">
                        <label class="block mb-1 text-sm font-medium text-gray-700">Tahun</label>
                        <select name="year"
                            class="w-full border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 sm:w-auto">
                            @foreach ($years as $year)
                                <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Month -->
                    <div class="flex-1 sm:flex-none">
                        <label class="block mb-1 text-sm font-medium text-gray-700">Bulan</label>
                        <select name="month"
                            class="w-full border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 sm:w-auto">
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}" {{ $selectedMonth == $month ? 'selected' : '' }}>
                                    {{ Carbon\Carbon::create(null, $month, 1)->format('F') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="self-end">
                        <button type="submit" class="w-full btn-primary sm:w-auto">
                            <i class="mr-2 fas fa-filter"></i>
                            Filter
                        </button>
                    </div>
                </form>
            </div>

            <a href="{{ route('admin.population.create') }}" class="w-full btn-primary sm:w-auto">
                <i class="mr-2 fas fa-plus"></i>
                Input Data Baru
            </a>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 gap-4 md:gap-6 xl:grid-cols-2">
            <!-- Trend Chart -->
            <div class="col-span-1 p-4 bg-white shadow-md xl:col-span-2 rounded-2xl md:p-6">
                <h3 class="mb-4 text-base font-semibold text-gray-800 md:text-lg">Trend 6 Bulan Terakhir</h3>
                <div class="h-[250px] md:h-[300px]">
                    <canvas id="trendChart"></canvas>
                </div>
            </div>

            <!-- Age Distribution -->
            <div class="p-4 bg-white shadow-md rounded-2xl md:p-6">
                <h3 class="mb-4 text-base font-semibold text-gray-800 md:text-lg">Distribusi Usia</h3>
                <div class="h-[250px] md:h-[300px]">
                    <canvas id="ageChart"></canvas>
                </div>
            </div>

            <!-- Gender Distribution -->
            <div class="p-4 bg-white shadow-md rounded-2xl md:p-6">
                <h3 class="mb-4 text-base font-semibold text-gray-800 md:text-lg">Distribusi Gender</h3>
                <div class="h-[250px] md:h-[300px]">
                    <canvas id="genderChart"></canvas>
                </div>
            </div>

            <!-- Occupation Distribution -->
            <div class="col-span-1 p-4 bg-white shadow-md xl:col-span-2 rounded-2xl md:p-6">
                <h3 class="mb-4 text-base font-semibold text-gray-800 md:text-lg">Distribusi Pekerjaan</h3>
                <div class="h-[250px] md:h-[300px]">
                    <canvas id="occupationChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Current Data Table -->
        <div class="bg-white shadow-md rounded-2xl">
            <div class="p-4 md:p-6">
                <div class="flex flex-col gap-3 mb-4 sm:flex-row sm:items-center sm:justify-between">
                    <h3 class="text-base font-semibold text-gray-800 md:text-lg">Data Statistik
                        {{ Carbon\Carbon::create($selectedYear, $selectedMonth, 1)->format('F Y') }}</h3>
                    @if ($currentData)
                        <a href="{{ route('admin.population.edit', $currentData->id) }}"
                            class="w-full btn-primary sm:w-auto">
                            <i class="mr-2 fas fa-edit"></i>
                            Edit Data
                        </a>
                    @endif
                </div>

                @if ($currentData)
                    <div class="-mx-4 overflow-x-auto md:mx-0">
                        <div class="inline-block min-w-full px-4 align-middle md:px-0">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-xs font-medium text-left text-gray-500 border-b md:text-sm">
                                        <th class="pb-3 pr-3 whitespace-nowrap md:pr-4">Kategori</th>
                                        <th class="pb-3 pr-3 whitespace-nowrap md:pr-4">Jumlah</th>
                                        <th class="pb-3 pr-3 whitespace-nowrap md:pr-4">Perubahan (Bulanan)</th>
                                        <th class="pb-3 whitespace-nowrap">Perubahan (Tahunan)</th>
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
                                        <tr class="text-xs text-gray-600 md:text-sm">
                                            <td class="py-3 pr-3 font-medium whitespace-nowrap md:pr-4">{{ $label }}
                                            </td>
                                            <td class="py-3 pr-3 whitespace-nowrap md:pr-4">
                                                {{ number_format($currentData->$key) }}</td>
                                            <td class="py-3 pr-3 whitespace-nowrap md:pr-4">
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
                                                            <span
                                                                class="hidden sm:inline">({{ $monthlyChanges[$key]['percentage'] }}%)</span>
                                                        </span>
                                                    </div>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="py-3 whitespace-nowrap">
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
                                                            <span
                                                                class="hidden sm:inline">({{ $yearlyChanges[$key]['percentage'] }}%)</span>
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
    <style>
        /* Mobile responsive improvements */
        @media (max-width: 640px) {
            .btn-primary {
                @apply text-sm px-4 py-2;
            }

            /* Make select inputs full width on mobile */
            select {
                @apply text-sm;
            }

            /* Improve chart readability on mobile */
            canvas {
                min-height: 200px !important;
            }

            /* Better table spacing on mobile */
            .overflow-x-auto {
                scrollbar-width: thin;
                scrollbar-color: #cbd5e0 #f7fafc;
            }

            .overflow-x-auto::-webkit-scrollbar {
                height: 4px;
            }

            .overflow-x-auto::-webkit-scrollbar-track {
                background: #f7fafc;
            }

            .overflow-x-auto::-webkit-scrollbar-thumb {
                background: #cbd5e0;
                border-radius: 2px;
            }
        }

        /* Improve button spacing */
        .btn-primary {
            @apply inline-flex items-center justify-center;
        }
    </style>

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
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                size: window.innerWidth < 640 ? 10 : 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleColor: 'white',
                        bodyColor: 'white',
                        cornerRadius: 8,
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
                    x: {
                        ticks: {
                            font: {
                                size: window.innerWidth < 640 ? 10 : 12
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                size: window.innerWidth < 640 ? 10 : 12
                            },
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
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: window.innerWidth < 640 ? 15 : 20,
                            font: {
                                size: window.innerWidth < 640 ? 10 : 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleColor: 'white',
                        bodyColor: 'white',
                        cornerRadius: 8,
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
