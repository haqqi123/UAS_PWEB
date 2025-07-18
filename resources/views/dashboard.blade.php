@extends('layouts.app')

@section('title', 'Dashboard Desa Suci')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-screen">
        <!-- Carousel Container -->
        <div class="relative w-full h-full overflow-hidden hero-carousel">
            <!-- Carousel Items -->
            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 carousel-item">
                <img src="{{ asset('images/desa1.jpeg') }}" alt="Desa Suci 1" class="object-cover w-full h-full">
            </div>
            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 carousel-item">
                <img src="{{ asset('images/desa2.jpeg') }}" alt="Desa Suci 2" class="object-cover w-full h-full">
            </div>
            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 carousel-item">
                <img src="{{ asset('images/desa3.jpeg') }}" alt="Desa Suci 3" class="object-cover w-full h-full">
            </div>

            <!-- Overlay with gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/25 to-black/50"></div>
        </div>

        <!-- Content -->
        <div class="absolute inset-0 flex items-center">
            <div class="container px-4 mx-auto">
                <div class="max-w-2xl animate-fade-in-up">
                    <h1 class="mb-4 text-5xl font-bold text-white opacity-0 md:text-6xl animate-slide-up">
                        Selamat Datang di Kalibaru Manis
                    </h1>
                    <p class="mb-8 text-xl text-gray-200 delay-200 opacity-0 md:text-2xl animate-slide-up">
                        Membangun desa yang mandiri, sejahtera, dan berbudaya.
                    </p>
                    <div class="space-x-4 opacity-0 animate-slide-up delay-400">
                        <a href="#profile"
                            class="inline-block px-6 py-3 text-white transition-all duration-300 transform rounded-lg bg-primary hover:bg-primary/90 hover:-translate-y-1">
                            Jelajahi
                        </a>
                        <a href="#contact"
                            class="inline-block px-6 py-3 text-white transition-all duration-300 transform rounded-lg bg-white/10 hover:bg-white/20 backdrop-blur-sm hover:-translate-y-1">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Navigation -->
        <div class="absolute flex space-x-3 transform -translate-x-1/2 bottom-10 left-1/2">
            <button class="w-3 h-3 transition-all duration-300 rounded-full bg-white/50 carousel-dot hover:bg-white"
                data-index="0"></button>
            <button class="w-3 h-3 transition-all duration-300 rounded-full bg-white/50 carousel-dot hover:bg-white"
                data-index="1"></button>
            <button class="w-3 h-3 transition-all duration-300 rounded-full bg-white/50 carousel-dot hover:bg-white"
                data-index="2"></button>
        </div>
    </section>

    <!-- Profil Section -->
    <section id="profile" class="py-16 bg-primary/5">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-[#5B8BB8]">Profil Desa</h2>
                <div class="w-12 h-1 bg-[#5B8BB8] mx-auto mt-4"></div>
            </div>
            <div class="flex justify-center">
                <div class="w-full lg:w-2/3">
                    <div class="p-8 bg-white shadow-md rounded-2xl">
                        <div class="mb-12">
                            <h3 class="mb-6 text-2xl font-semibold">Sejarah</h3>
                            <p class="text-gray-600">{{ $profil['sejarah'] }}</p>
                        </div>
                        <div class="mb-12">
                            <h3 class="mb-6 text-2xl font-semibold">Visi</h3>
                            <div class="bg-[#5B8BB8]/10 rounded-lg p-6">
                                <p class="font-medium">{{ $profil['visi'] }}</p>
                            </div>
                        </div>
                        <div>
                            <h3 class="mb-6 text-2xl font-semibold">Misi</h3>
                            <div class="space-y-4">
                                @foreach ($profil['misi'] as $index => $misi)
                                    <div class="flex items-start">
                                        <span
                                            class="flex-shrink-0 w-8 h-8 bg-[#6E7E2A] text-white rounded-full flex items-center justify-center font-bold">
                                            {{ $index + 1 }}
                                        </span>
                                        <p class="ml-4">{{ $misi }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Section -->
    <section class="py-12">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-primary">Statistik Penduduk</h2>
                <div class="w-12 h-1 mx-auto mt-4 bg-primary"></div>
            </div>

            <!-- Overview Cards -->
            <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Total Penduduk -->
                <div class="p-6 transition-all duration-300 transform bg-white shadow-md rounded-2xl hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-gray-600">Total Penduduk</h4>
                            <p class="mt-2 text-3xl font-bold text-primary">
                                {{ number_format($statistik->total_penduduk ?? 0) }}
                            </p>
                        </div>
                        <div class="flex items-center justify-center rounded-full w-14 h-14 bg-primary/10">
                            <i class="text-2xl fas fa-users text-primary"></i>
                        </div>
                    </div>
                </div>

                <!-- Jumlah KK -->
                <div class="p-6 transition-all duration-300 transform bg-white shadow-md rounded-2xl hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-gray-600">Jumlah KK</h4>
                            <p class="mt-2 text-3xl font-bold text-primary">
                                {{ number_format($statistik->jumlah_kk ?? 0) }}
                            </p>
                        </div>
                        <div class="flex items-center justify-center rounded-full w-14 h-14 bg-primary/10">
                            <i class="text-2xl fas fa-home text-primary"></i>
                        </div>
                    </div>
                </div>

                <!-- Laki-laki -->
                <div class="p-6 transition-all duration-300 transform bg-white shadow-md rounded-2xl hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-gray-600">Laki-laki</h4>
                            <p class="mt-2 text-3xl font-bold text-primary">
                                {{ number_format($statistik->laki_laki ?? 0) }}
                            </p>
                        </div>
                        <div class="flex items-center justify-center rounded-full w-14 h-14 bg-primary/10">
                            <i class="text-2xl fas fa-male text-primary"></i>
                        </div>
                    </div>
                </div>

                <!-- Perempuan -->
                <div class="p-6 transition-all duration-300 transform bg-white shadow-md rounded-2xl hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-gray-600">Perempuan</h4>
                            <p class="mt-2 text-3xl font-bold text-primary">
                                {{ number_format($statistik->perempuan ?? 0) }}
                            </p>
                        </div>
                        <div class="flex items-center justify-center rounded-full w-14 h-14 bg-primary/10">
                            <i class="text-2xl fas fa-female text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Statistics -->
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                <!-- Kelompok Usia -->
                <div class="p-6 bg-white shadow-md rounded-2xl">
                    <h4 class="mb-6 text-xl font-semibold">Berdasarkan Kelompok Usia</h4>
                    <div class="relative h-[300px] mb-4">
                        <canvas id="ageChart"></canvas>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-gray-600">Anak (0-14 th)</div>
                            <div class="mt-1 font-semibold">{{ number_format($statistik->anak ?? 0) }} jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-gray-600">Remaja (15-24 th)</div>
                            <div class="mt-1 font-semibold">{{ number_format($statistik->remaja ?? 0) }} jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-gray-600">Dewasa (25-54 th)</div>
                            <div class="mt-1 font-semibold">{{ number_format($statistik->dewasa ?? 0) }} jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-gray-600">Lansia (>55 th)</div>
                            <div class="mt-1 font-semibold">{{ number_format($statistik->lansia ?? 0) }} jiwa</div>
                        </div>
                    </div>
                </div>

                <!-- Pekerjaan -->
                <div class="p-6 bg-white shadow-md rounded-2xl">
                    <h4 class="mb-6 text-xl font-semibold">Berdasarkan Pekerjaan</h4>
                    <div class="relative h-[300px] mb-4">
                        <canvas id="jobChart"></canvas>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-gray-600">Petani</div>
                            <div class="mt-1 font-semibold">{{ number_format($statistik->petani ?? 0) }} jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-gray-600">Nelayan</div>
                            <div class="mt-1 font-semibold">{{ number_format($statistik->nelayan ?? 0) }} jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-gray-600">Wiraswasta</div>
                            <div class="mt-1 font-semibold">{{ number_format($statistik->wiraswasta ?? 0) }} jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-gray-600">Pekerjaan Lain</div>
                            <div class="mt-1 font-semibold">{{ number_format($statistik->pekerjaan_lain ?? 0) }} jiwa
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gender Distribution -->
                <div class="p-6 bg-white shadow-md rounded-2xl lg:col-span-2">
                    <h4 class="mb-6 text-xl font-semibold">Distribusi Gender</h4>
                    <div class="relative h-[200px]">
                        <canvas id="genderChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Organisasi Section -->
    <section class="py-12 bg-[#5B8BB8]/5">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-[#5B8BB8]">Struktur Organisasi</h2>
                <div class="w-12 h-1 bg-[#5B8BB8] mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                @foreach ($organisations as $org)
                    <div
                        class="p-6 text-center transition-transform transform bg-white shadow-md rounded-2xl hover:-translate-y-2">
                        <div class="mb-6">
                            <img src="{{ asset($org->foto) }}" alt="{{ $org->nama }}"
                                class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-[#8AB9E0]">
                        </div>
                        <h5 class="mb-2 font-bold">{{ $org->nama }}</h5>
                        <p class="text-gray-600">{{ $org->jabatan }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Kontak & Peta Section -->
    <section id="contact" class="py-12">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-[#5B8BB8]">Kontak & Lokasi</h2>
                <div class="w-12 h-1 bg-[#5B8BB8] mx-auto mt-4"></div>
            </div>

            <!-- Map Container -->
            <div class="mb-8">
                <div class="overflow-hidden bg-white shadow-md rounded-2xl">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31584.74431057101!2d113.92956586765888!3d-8.293539571435337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6a5812cf776c1%3A0x2511e139049cb14d!2sKalibaru%20Manis%2C%20Kalibaru%2C%20Banyuwangi%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1752249373286!5m2!1sen!2sid"
                        class="w-full h-[600px]" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="p-6 transition-all duration-300 transform bg-white shadow-md rounded-2xl hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-12 h-12 mr-4 rounded-full bg-primary/10">
                            <i class="text-2xl fas fa-map-marker-alt text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 font-bold text-gray-800">Alamat</h6>
                            <p class="text-gray-600">{{ $kontak['alamat'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 transition-all duration-300 transform bg-white shadow-md rounded-2xl hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-12 h-12 mr-4 rounded-full bg-primary/10">
                            <i class="text-2xl fas fa-phone text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 font-bold text-gray-800">Telepon</h6>
                            <p class="text-gray-600">{{ $kontak['telepon'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 transition-all duration-300 transform bg-white shadow-md rounded-2xl hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-12 h-12 mr-4 rounded-full bg-primary/10">
                            <i class="text-2xl fas fa-envelope text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 font-bold text-gray-800">Email</h6>
                            <p class="text-gray-600">{{ $kontak['email'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Artikel Section -->
    <section class="py-12 bg-[#5B8BB8]/5">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-[#5B8BB8]">Artikel Terbaru</h2>
                <div class="w-12 h-1 bg-[#5B8BB8] mx-auto mt-4"></div>
            </div>

            <!-- Horizontal Scroll Container -->
            <div class="relative">
                <div class="overflow-x-auto scroll-smooth scrollbar-custom">
                    <div class="flex gap-6 pb-6" style="width: max-content;">
                        @foreach ($artikel as $a)
                            <div class="w-[350px]">
                                <div
                                    class="bg-white rounded-2xl shadow-md overflow-hidden group transform transition-all duration-300 hover:-translate-y-2 h-[450px] flex flex-col">
                                    <!-- Article Thumbnail -->
                                    <div class="relative h-48 overflow-hidden">
                                        @if ($a->thumbnail)
                                            <img src="{{ asset($a->thumbnail) }}" alt="{{ $a->judul }}"
                                                class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
                                        @else
                                            <div
                                                class="flex items-center justify-center w-full h-full transition-colors duration-300 bg-primary/10 group-hover:bg-primary/20">
                                                <i class="text-4xl fas fa-newspaper text-primary"></i>
                                            </div>
                                        @endif
                                        <div
                                            class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/60 to-transparent group-hover:opacity-100">
                                        </div>
                                    </div>

                                    <!-- Article Content -->
                                    <div class="flex flex-col flex-grow p-6">
                                        <div class="flex items-center mb-3 text-sm text-gray-500">
                                            <i class="mr-2 far fa-calendar-alt"></i>
                                            <span>{{ $a->created_at->format('d M Y') }}</span>
                                            <div class="mx-2">•</div>
                                            <i class="mr-2 far fa-eye"></i>
                                            <span>{{ number_format($a->views) }} views</span>
                                        </div>

                                        <h3
                                            class="mb-3 text-xl font-bold text-gray-800 transition-colors line-clamp-2 group-hover:text-primary">
                                            {{ $a->judul }}
                                        </h3>

                                        <p class="flex-grow mb-4 text-gray-600 line-clamp-3">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($a->isi), 150, '...') }}
                                        </p>

                                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex items-center justify-center w-8 h-8 rounded-full bg-primary/10">
                                                    <i class="fas fa-user text-primary"></i>
                                                </div>
                                                <span class="ml-2 text-sm text-gray-600">{{ $a->penulis }}</span>
                                            </div>
                                            <a href="{{ route('artikel.show', $a) }}"
                                                class="text-sm font-medium transition-transform text-primary hover:text-primary/80 group-hover:translate-x-1">
                                                Baca Selengkapnya
                                                <i
                                                    class="ml-1 transition-transform fas fa-arrow-right group-hover:translate-x-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- UMKM Catalog Section -->
    <section class="py-12">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-[#5B8BB8]">Katalog UMKM</h2>
                <div class="w-12 h-1 bg-[#5B8BB8] mx-auto mt-4"></div>
                <p class="mt-4 text-gray-600">Temukan UMKM terbaik di desa kami</p>
            </div>

            <!-- UMKM Grid -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($umkm->take(4) as $item)
                    <div
                        class="overflow-hidden transition-all duration-300 transform bg-white shadow-md rounded-2xl group hover:-translate-y-2">
                        <!-- UMKM Image -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $item->foto_url }}" alt="{{ $item->nama_usaha }}"
                                class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110">
                        </div>

                        <!-- UMKM Content -->
                        <div class="p-6">
                            <div class="mb-3">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-primary/10 text-primary">
                                    {{ $item->kategori }}
                                </span>
                            </div>

                            <h3 class="mb-2 text-xl font-bold text-gray-800 transition-colors group-hover:text-primary">
                                {{ $item->nama_usaha }}
                            </h3>

                            <p class="mb-4 text-sm text-gray-600 line-clamp-2">
                                {{ $item->deskripsi }}
                            </p>

                            <div class="mb-4 space-y-2">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="mr-2 fas fa-store text-primary"></i>
                                    <span>{{ $item->jenis_produk }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="mr-2 fas fa-tag text-primary"></i>
                                    <span>{{ $item->formatted_harga_minimum }} -
                                        {{ $item->formatted_harga_maximum }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="mr-2 fas fa-map-marker-alt text-primary"></i>
                                    <span class="line-clamp-1">{{ $item->alamat }}</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <a href="{{ $item->whatsapp_url }}" target="_blank"
                                    class="inline-flex items-center text-green-600 hover:text-green-700">
                                    <i class="mr-2 fab fa-whatsapp"></i>
                                    Hubungi
                                </a>
                                <a href="{{ route('umkm.show', $item) }}"
                                    class="text-sm font-medium text-primary hover:text-primary/80">
                                    Detail
                                    <i class="ml-1 transition-transform fas fa-arrow-right group-hover:translate-x-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="mt-10 text-center">
                <a href="{{ route('umkm.index') }}"
                    class="inline-flex items-center px-6 py-3 text-white transition-all duration-300 transform rounded-lg bg-primary hover:bg-primary/90 hover:-translate-y-1">
                    Lihat Semua UMKM
                    <i class="ml-2 fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const chartColors = {
                    primary: '#5B8BB8',
                    primaryLight: '#8AB9E0',
                    accent: '#D4AB07',
                    secondary: '#6E7E2A',
                    tertiary: '#4B5563',
                    quaternary: '#9CA3AF',
                    success: '#059669',
                    danger: '#DC2626'
                };

                // Fungsi untuk format angka
                function formatNumber(num) {
                    return new Intl.NumberFormat('id-ID').format(num);
                }

                // Data untuk grafik
                const ageData = {
                    labels: ['Anak (0-14 th)', 'Remaja (15-24 th)', 'Dewasa (25-54 th)', 'Lansia (>55 th)'],
                    data: [
                        {{ $statistik->anak ?? 0 }},
                        {{ $statistik->remaja ?? 0 }},
                        {{ $statistik->dewasa ?? 0 }},
                        {{ $statistik->lansia ?? 0 }}
                    ]
                };

                const jobData = {
                    labels: ['Petani', 'Nelayan', 'Wiraswasta', 'Lainnya'],
                    data: [
                        {{ $statistik->petani ?? 0 }},
                        {{ $statistik->nelayan ?? 0 }},
                        {{ $statistik->wiraswasta ?? 0 }},
                        {{ $statistik->pekerjaan_lain ?? 0 }}
                    ]
                };

                const genderData = {
                    labels: ['Laki-laki', 'Perempuan'],
                    data: [
                        {{ $statistik->laki_laki ?? 0 }},
                        {{ $statistik->perempuan ?? 0 }}
                    ]
                };

                // Buat chart usia (Bar Chart)
                new Chart(document.getElementById('ageChart'), {
                    type: 'bar',
                    data: {
                        labels: ageData.labels,
                        datasets: [{
                            data: ageData.data,
                            backgroundColor: [
                                chartColors.primary,
                                chartColors.primaryLight,
                                chartColors.accent,
                                chartColors.secondary
                            ],
                            borderRadius: 6,
                            borderWidth: 0
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
                                        const value = context.raw;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        return `${formatNumber(value)} jiwa (${percentage}%)`;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return formatNumber(value);
                                    }
                                }
                            }
                        }
                    }
                });

                // Buat chart pekerjaan (Pie Chart)
                new Chart(document.getElementById('jobChart'), {
                    type: 'pie',
                    data: {
                        labels: jobData.labels,
                        datasets: [{
                            data: jobData.data,
                            backgroundColor: [
                                chartColors.primary,
                                chartColors.accent,
                                chartColors.secondary,
                                chartColors.tertiary
                            ],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 20,
                                    usePointStyle: true,
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const value = context.raw;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        return `${formatNumber(value)} jiwa (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });

                // Buat chart gender (Horizontal Bar Chart)
                new Chart(document.getElementById('genderChart'), {
                    type: 'bar',
                    data: {
                        labels: genderData.labels,
                        datasets: [{
                            data: genderData.data,
                            backgroundColor: [
                                chartColors.primary,
                                chartColors.accent
                            ],
                            borderRadius: 6,
                            borderWidth: 0
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const value = context.raw;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        return `${formatNumber(value)} jiwa (${percentage}%)`;
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return formatNumber(value);
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>

        <!-- Hero Carousel with enhanced animations -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const items = document.querySelectorAll('.carousel-item');
                const dots = document.querySelectorAll('.carousel-dot');
                let currentIndex = 0;
                let interval;

                // Custom Animations
                const animations = {
                    fadeIn: [{
                            opacity: 0,
                            transform: 'scale(1.1)'
                        },
                        {
                            opacity: 1,
                            transform: 'scale(1)'
                        }
                    ],
                    fadeOut: [{
                            opacity: 1,
                            transform: 'scale(1)'
                        },
                        {
                            opacity: 0,
                            transform: 'scale(1.1)'
                        }
                    ],
                    timing: {
                        duration: 1500,
                        fill: 'forwards',
                        easing: 'ease-in-out'
                    }
                };

                function showSlide(index) {
                    // Hide all slides
                    items.forEach(item => {
                        item.animate(animations.fadeOut, animations.timing);
                    });

                    // Show selected slide
                    items[index].animate(animations.fadeIn, animations.timing);

                    // Update dots
                    dots.forEach(dot => {
                        dot.classList.remove('bg-white', 'w-8');
                        dot.classList.add('bg-white/50', 'w-3');
                    });
                    dots[index].classList.remove('bg-white/50', 'w-3');
                    dots[index].classList.add('bg-white', 'w-8');
                }

                function nextSlide() {
                    currentIndex = (currentIndex + 1) % items.length;
                    showSlide(currentIndex);
                }

                // Initialize carousel
                showSlide(0);
                interval = setInterval(nextSlide, 8000);

                // Dot navigation with hover pause
                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        clearInterval(interval);
                        currentIndex = index;
                        showSlide(currentIndex);
                        interval = setInterval(nextSlide, 8000);
                    });

                    // Add hover effect
                    dot.addEventListener('mouseenter', () => {
                        clearInterval(interval);
                    });

                    dot.addEventListener('mouseleave', () => {
                        interval = setInterval(nextSlide, 8000);
                    });
                });

                // Pause on hover
                const carousel = document.querySelector('.hero-carousel');
                carousel.addEventListener('mouseenter', () => {
                    clearInterval(interval);
                });

                carousel.addEventListener('mouseleave', () => {
                    interval = setInterval(nextSlide, 8000);
                });
            });
        </script>
    @endpush

    <style>
        /* Animations */
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out forwards;
        }

        .animate-slide-up {
            opacity: 0;
            animation: fade-in-up 0.6s ease-out forwards;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        /* Carousel Navigation */
        .carousel-dot {
            transition: all 0.3s ease-in-out;
        }

        .carousel-dot.active {
            width: 2rem;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar */
        .scrollbar-custom::-webkit-scrollbar {
            height: 8px;
        }

        .scrollbar-custom::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

@endsection
