@extends('admin.layouts.admin')

@section('title', 'Input Data Statistik Penduduk')
@section('page-title', 'Input Data Statistik Penduduk')

@section('content')
    <div class="space-y-6">
        <!-- Back Button -->
        <div>
            <a href="{{ route('admin.population.index') }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Statistik Penduduk</span>
            </a>
        </div>

        <form id="population-form" action="{{ route('admin.population.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Period Selection -->
            <div class="p-6 bg-white shadow-md rounded-2xl">
                <h3 class="mb-4 text-lg font-semibold text-gray-800">Periode</h3>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Year -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Tahun</label>
                        <select name="year" id="year" required
                            class="w-full border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @foreach ($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        @error('year')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Month -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Bulan</label>
                        <select name="month" id="month" required
                            class="w-full border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}">
                                    {{ Carbon\Carbon::create(null, $month, 1)->format('F') }}
                                </option>
                            @endforeach
                        </select>
                        @error('month')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @error('date')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- Main Data -->
                <div class="p-6 bg-white shadow-md rounded-2xl">
                    <h3 class="mb-4 text-lg font-semibold text-gray-800">Data Utama</h3>
                    <div class="space-y-4">
                        <!-- Total Penduduk -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Total Penduduk</label>
                            <input type="number" name="total_penduduk" id="total_penduduk" required min="1"
                                value="{{ old('total_penduduk', $lastMonthData?->total_penduduk) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('total_penduduk')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jumlah KK -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Jumlah KK</label>
                            <input type="number" name="jumlah_kk" id="jumlah_kk" required min="1"
                                value="{{ old('jumlah_kk', $lastMonthData?->jumlah_kk) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('jumlah_kk')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Previous Month Data -->
                @if ($lastMonthData)
                    <div class="p-6 bg-white shadow-md rounded-2xl">
                        <h3 class="mb-4 text-lg font-semibold text-gray-800">Data Bulan Sebelumnya</h3>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">
                                Periode: {{ $lastMonthData->created_at->format('F Y') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                Total Penduduk: {{ number_format($lastMonthData->total_penduduk) }}
                            </p>
                            <p class="text-sm text-gray-600">
                                Jumlah KK: {{ number_format($lastMonthData->jumlah_kk) }}
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Kategori Usia -->
                <div class="p-6 bg-white shadow-md rounded-2xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Kategori Usia</h3>
                        <p class="text-sm">
                            Total: <span id="total-usia" class="font-medium">0</span>
                            <span id="usia-difference" class="ml-1 text-xs"></span>
                        </p>
                    </div>
                    <div class="grid gap-4">
                        <!-- Anak -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Anak-anak (0-14)</label>
                            <input type="number" name="anak" id="anak" required min="0"
                                value="{{ old('anak', $lastMonthData?->anak) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 usia-input">
                            @error('anak')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remaja -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Remaja (15-24)</label>
                            <input type="number" name="remaja" id="remaja" required min="0"
                                value="{{ old('remaja', $lastMonthData?->remaja) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 usia-input">
                            @error('remaja')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dewasa -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Dewasa (25-54)</label>
                            <input type="number" name="dewasa" id="dewasa" required min="0"
                                value="{{ old('dewasa', $lastMonthData?->dewasa) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 usia-input">
                            @error('dewasa')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Lansia -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Lansia (>55)</label>
                            <input type="number" name="lansia" id="lansia" required min="0"
                                value="{{ old('lansia', $lastMonthData?->lansia) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 usia-input">
                            @error('lansia')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @error('usia')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori Gender -->
                <div class="p-6 bg-white shadow-md rounded-2xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Kategori Gender</h3>
                        <p class="text-sm">
                            Total: <span id="total-gender" class="font-medium">0</span>
                            <span id="gender-difference" class="ml-1 text-xs"></span>
                        </p>
                    </div>
                    <div class="grid gap-4">
                        <!-- Laki-laki -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Laki-laki</label>
                            <input type="number" name="laki_laki" id="laki_laki" required min="0"
                                value="{{ old('laki_laki', $lastMonthData?->laki_laki) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 gender-input">
                            @error('laki_laki')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Perempuan -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Perempuan</label>
                            <input type="number" name="perempuan" id="perempuan" required min="0"
                                value="{{ old('perempuan', $lastMonthData?->perempuan) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 gender-input">
                            @error('perempuan')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @error('gender')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori Pekerjaan -->
                <div class="p-6 bg-white shadow-md rounded-2xl lg:col-span-2">
                    <h3 class="mb-4 text-lg font-semibold text-gray-800">Kategori Pekerjaan</h3>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <!-- Petani -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Petani</label>
                            <input type="number" name="petani" id="petani" required min="0"
                                value="{{ old('petani', $lastMonthData?->petani) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('petani')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Perkebunan -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Perkebunan</label>
                            <input type="number" name="perkebunan" id="perkebunan" required min="0"
                                value="{{ old('perkebunan', $lastMonthData?->perkebunan) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('perkebunan')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Perdagangan -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Perdagangan</label>
                            <input type="number" name="perdagangan" id="perdagangan" required min="0"
                                value="{{ old('perdagangan', $lastMonthData?->perdagangan) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('perdagangan')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pegawai Negeri Sipil -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Pegawai Negeri Sipil</label>
                            <input type="number" name="pegawai_negeri_sipil" id="pegawai_negeri_sipil" required
                                min="0"
                                value="{{ old('pegawai_negeri_sipil', $lastMonthData?->pegawai_negeri_sipil) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('pegawai_negeri_sipil')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pegawai Swasta -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Pegawai Swasta</label>
                            <input type="number" name="pegawai_swasta" id="pegawai_swasta" required min="0"
                                value="{{ old('pegawai_swasta', $lastMonthData?->pegawai_swasta) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('pegawai_negeri_sipil')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buruh Tani -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Buruh Tani</label>
                            <input type="number" name="buruh_tani" id="buruh_tani" required min="0"
                                value="{{ old('buruh_tani', $lastMonthData?->buruh_tani) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('buruh_tani')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pengrajin -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Pengrajin</label>
                            <input type="number" name="pengrajin" id="pengrajin" required min="0"
                                value="{{ old('pengrajin', $lastMonthData?->pengrajin) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('pengrajin')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tukang Kayu -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Tukang Kayu</label>
                            <input type="number" name="tukang_kayu" id="tukang_kayu" required min="0"
                                value="{{ old('tukang_kayu', $lastMonthData?->tukang_kayu) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('tukang_kayu')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Batu -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Pengrajin Batu</label>
                            <input type="number" name="batu" id="batu" required min="0"
                                value="{{ old('batu', $lastMonthData?->batu) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('batu')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Polri -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Polri</label>
                            <input type="number" name="polri" id="polri" required min="0"
                                value="{{ old('polri', $lastMonthData?->polri) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('polri')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- TNI -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">TNI</label>
                            <input type="number" name="tni" id="tni" required min="0"
                                value="{{ old('tni', $lastMonthData?->tni) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('tni')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jasa -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Jasa</label>
                            <input type="number" name="jasa" id="jasa" required min="0"
                                value="{{ old('jasa', $lastMonthData?->jasa) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('jasa')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="btn-primary">
                    <i class="mr-2 fas fa-save"></i>
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Function to calculate and update totals
        function updateTotals() {
            const totalPenduduk = parseInt(document.getElementById('total_penduduk').value) || 0;

            // Calculate usia total
            const usiaInputs = document.querySelectorAll('.usia-input');
            let totalUsia = 0;
            usiaInputs.forEach(input => {
                totalUsia += parseInt(input.value) || 0;
            });

            // Calculate gender total
            const genderInputs = document.querySelectorAll('.gender-input');
            let totalGender = 0;
            genderInputs.forEach(input => {
                totalGender += parseInt(input.value) || 0;
            });

            // Update usia total display
            const totalUsiaDisplay = document.getElementById('total-usia');
            const usiaDifference = document.getElementById('usia-difference');
            totalUsiaDisplay.textContent = totalUsia.toLocaleString('id-ID');
            if (totalPenduduk > 0) {
                const diff = totalUsia - totalPenduduk;
                if (diff !== 0) {
                    usiaDifference.textContent = `(${diff > 0 ? '+' : ''}${diff.toLocaleString('id-ID')})`;
                    usiaDifference.className = 'ml-1 text-xs ' + (diff === 0 ? 'text-green-500' : 'text-red-500');
                } else {
                    usiaDifference.textContent = '(✓)';
                    usiaDifference.className = 'ml-1 text-xs text-green-500';
                }
            }

            // Update gender total display
            const totalGenderDisplay = document.getElementById('total-gender');
            const genderDifference = document.getElementById('gender-difference');
            totalGenderDisplay.textContent = totalGender.toLocaleString('id-ID');
            if (totalPenduduk > 0) {
                const diff = totalGender - totalPenduduk;
                if (diff !== 0) {
                    genderDifference.textContent = `(${diff > 0 ? '+' : ''}${diff.toLocaleString('id-ID')})`;
                    genderDifference.className = 'ml-1 text-xs ' + (diff === 0 ? 'text-green-500' : 'text-red-500');
                } else {
                    genderDifference.textContent = '(✓)';
                    genderDifference.className = 'ml-1 text-xs text-green-500';
                }
            }
        }

        // Add event listeners
        document.getElementById('total_penduduk').addEventListener('input', updateTotals);
        document.querySelectorAll('.usia-input, .gender-input').forEach(input => {
            input.addEventListener('input', updateTotals);
        });

        // Form submission
        const form = document.getElementById('population-form');
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const totalPenduduk = parseInt(document.getElementById('total_penduduk').value) || 0;

            // Calculate totals
            const usiaInputs = document.querySelectorAll('.usia-input');
            let totalUsia = 0;
            usiaInputs.forEach(input => {
                totalUsia += parseInt(input.value) || 0;
            });

            const genderInputs = document.querySelectorAll('.gender-input');
            let totalGender = 0;
            genderInputs.forEach(input => {
                totalGender += parseInt(input.value) || 0;
            });

            // Validate totals
            if (totalUsia !== totalPenduduk) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal',
                    text: 'Total kategori usia harus sama dengan total penduduk!'
                });
                return;
            }

            if (totalGender !== totalPenduduk) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal',
                    text: 'Total kategori gender harus sama dengan total penduduk!'
                });
                return;
            }

            // Check if data already exists
            const year = document.getElementById('year').value;
            const month = document.getElementById('month').value;
            const existingDates = @json($existingDates);
            const currentDate = `${year}-${month.toString().padStart(2, '0')}`;

            if (existingDates.includes(currentDate)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal',
                    text: 'Data untuk periode ini sudah ada!'
                });
                return;
            }

            // Show loading
            Swal.fire({
                title: 'Menyimpan data...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Submit form
            form.submit();
        });

        // Initialize totals on page load
        updateTotals();
    </script>
@endpush
