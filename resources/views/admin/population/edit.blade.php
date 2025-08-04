@extends('admin.layouts.admin')

@section('title', 'Edit Data Statistik Penduduk')
@section('page-title', 'Edit Data Statistik Penduduk')

@section('content')
    <div class="space-y-6">
        <!-- Back Button -->
        <div>
            <a href="{{ route('admin.population.index', ['year' => $population->created_at->year, 'month' => $population->created_at->month]) }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Statistik Penduduk</span>
            </a>
        </div>

        <form id="population-form" action="{{ route('admin.population.update', $population) }}" method="POST"
            class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Period Info -->
            <div class="p-6 bg-white shadow-md rounded-2xl">
                <h3 class="text-lg font-semibold text-gray-800">
                    Data Statistik Periode {{ $population->created_at->format('F Y') }}
                </h3>
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
                                value="{{ old('total_penduduk', $population->total_penduduk) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('total_penduduk')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jumlah KK -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Jumlah KK</label>
                            <input type="number" name="jumlah_kk" id="jumlah_kk" required min="1"
                                value="{{ old('jumlah_kk', $population->jumlah_kk) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('jumlah_kk')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Reference Data -->
                <div class="space-y-6">
                    @if ($previousMonthData)
                        <div class="p-6 bg-white shadow-md rounded-2xl">
                            <h3 class="mb-4 text-lg font-semibold text-gray-800">Data Bulan Sebelumnya</h3>
                            <div class="space-y-2">
                                <p class="text-sm text-gray-600">
                                    Periode: {{ $previousMonthData->created_at->format('F Y') }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    Total Penduduk: {{ number_format($previousMonthData->total_penduduk) }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    Jumlah KK: {{ number_format($previousMonthData->jumlah_kk) }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if ($nextMonthData)
                        <div class="p-6 bg-white shadow-md rounded-2xl">
                            <h3 class="mb-4 text-lg font-semibold text-gray-800">Data Bulan Berikutnya</h3>
                            <div class="space-y-2">
                                <p class="text-sm text-gray-600">
                                    Periode: {{ $nextMonthData->created_at->format('F Y') }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    Total Penduduk: {{ number_format($nextMonthData->total_penduduk) }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    Jumlah KK: {{ number_format($nextMonthData->jumlah_kk) }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

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
                            <label class="block mb-2 text-sm font-medium text-gray-700">Anak-anak</label>
                            <input type="number" name="anak" id="anak" required min="0"
                                value="{{ old('anak', $population->anak) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 usia-input">
                            @error('anak')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remaja -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Remaja</label>
                            <input type="number" name="remaja" id="remaja" required min="0"
                                value="{{ old('remaja', $population->remaja) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 usia-input">
                            @error('remaja')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dewasa -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Dewasa</label>
                            <input type="number" name="dewasa" id="dewasa" required min="0"
                                value="{{ old('dewasa', $population->dewasa) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 usia-input">
                            @error('dewasa')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Lansia -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Lansia</label>
                            <input type="number" name="lansia" id="lansia" required min="0"
                                value="{{ old('lansia', $population->lansia) }}"
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
                                value="{{ old('laki_laki', $population->laki_laki) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 gender-input">
                            @error('laki_laki')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Perempuan -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Perempuan</label>
                            <input type="number" name="perempuan" id="perempuan" required min="0"
                                value="{{ old('perempuan', $population->perempuan) }}"
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
                                value="{{ old('petani', $population?->petani) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('petani')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Perkebunan -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Perkebunan</label>
                            <input type="number" name="perkebunan" id="perkebunan" required min="0"
                                value="{{ old('perkebunan', $population?->perkebunan) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('perkebunan')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Perdagangan -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Perdagangan</label>
                            <input type="number" name="perdagangan" id="perdagangan" required min="0"
                                value="{{ old('perdagangan', $population?->perdagangan) }}"
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
                                value="{{ old('pegawai_negeri_sipil', $population?->pegawai_negeri_sipil) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('pegawai_negeri_sipil')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pegawai Swasta -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Pegawai Swasta</label>
                            <input type="number" name="pegawai_swasta" id="pegawai_swasta" required min="0"
                                value="{{ old('pegawai_swasta', $population?->pegawai_swasta) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('pegawai_swasta')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buruh Tani -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Buruh Tani</label>
                            <input type="number" name="buruh_tani" id="buruh_tani" required min="0"
                                value="{{ old('buruh_tani', $population?->buruh_tani) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('buruh_tani')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pengrajin -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Pengrajin</label>
                            <input type="number" name="pengrajin" id="pengrajin" required min="0"
                                value="{{ old('pengrajin', $population?->pengrajin) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('pengrajin')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tukang Kayu -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Tukang Kayu</label>
                            <input type="number" name="tukang_kayu" id="tukang_kayu" required min="0"
                                value="{{ old('tukang_kayu', $population?->tukang_kayu) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('tukang_kayu')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Batu -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Pengrajin Batu</label>
                            <input type="number" name="batu" id="batu" required min="0"
                                value="{{ old('batu', $population?->batu) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('batu')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Polri -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Polri</label>
                            <input type="number" name="polri" id="polri" required min="0"
                                value="{{ old('polri', $population?->polri) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('polri')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- TNI -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">TNI</label>
                            <input type="number" name="tni" id="tni" required min="0"
                                value="{{ old('tni', $population?->tni) }}"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            @error('tni')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jasa -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Jasa</label>
                            <input type="number" name="jasa" id="jasa" required min="0"
                                value="{{ old('jasa', $population?->jasa) }}"
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
                    Simpan Perubahan
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

            // Show confirmation
            const result = await Swal.fire({
                title: 'Konfirmasi Perubahan',
                text: 'Apakah Anda yakin ingin menyimpan perubahan data?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Simpan',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#5B8BB8',
            });

            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: 'Menyimpan perubahan...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Submit form
                form.submit();
            }
        });

        // Initialize totals on page load
        updateTotals();
    </script>
@endpush
