@extends('layouts.app')

@section('title', 'Desa Kalibaru Manis')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-screen">
        <!-- Carousel Container -->
        <div class="relative w-full h-full overflow-hidden hero-carousel">
            <!-- Carousel Items -->
            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 carousel-item">
                <img src="{{ asset('images/hero-1.jpg') }}" alt="Desa Suci 1" class="object-cover w-full h-full">
            </div>
            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 carousel-item">
                <img src="{{ asset('images/hero-2.jpg') }}" alt="Desa Suci 2" class="object-cover w-full h-full">
            </div>
            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 carousel-item">
                <img src="{{ asset('images/hero-3.jpg') }}" alt="Desa Suci 3" class="object-cover w-full h-full">
            </div>

            <!-- Overlay with gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/25 to-black/50"></div>
        </div>

        <!-- Content -->
        <div class="absolute inset-0 flex items-center">
            <div class="container px-4 mx-auto">
                <div class="max-w-2xl animate-fade-in-up">
                    <h1 class="mb-4 text-5xl font-bold text-white opacity-0 md:text-6xl animate-slide-up"
                        style="text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">
                        Selamat Datang di <span class="text-primary"
                            style="-webkit-text-stroke: 1px white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Kalibaru</span>
                        <span class="text-accent"
                            style="-webkit-text-stroke: 1px white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Manis</span>
                    </h1>
                    <p class="mb-8 text-xl text-gray-200 delay-200 opacity-0 md:text-2xl animate-slide-up">
                        Membangun desa yang mandiri, sejahtera, dan berbudaya.
                    </p>
                    <div class="space-x-4 opacity-0 animate-slide-up delay-400">
                        <a href="https://wa.me/6282228175411" target="_blank"
                            class="inline-block px-6 py-3 text-white transition-all duration-300 transform rounded-lg bg-primary hover:bg-primary/90 hover:-translate-y-1">
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
    <section id="profile" class="relative py-20 overflow-hidden nature-bg leaf-pattern topographic-lines">

        <!-- Floating Background Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <!-- Organic shapes -->
            <div
                class="absolute w-64 h-64 opacity-5 bg-gradient-to-br from-green-400 to-blue-400 organic-shape top-20 -left-32 float-animation">
            </div>
            <div
                class="absolute w-48 h-48 opacity-5 bg-gradient-to-br from-yellow-400 to-green-400 organic-shape-2 top-1/3 -right-24 float-animation-delayed">
            </div>
            <div
                class="absolute w-32 h-32 opacity-10 bg-gradient-to-br from-blue-400 to-indigo-400 organic-shape bottom-32 left-1/4 float-animation">
            </div>

            <!-- Decorative dots -->
            <div class="absolute top-40 left-20">
                <div class="flex space-x-2">
                    <div class="w-2 h-2 bg-green-400 rounded-full opacity-20"></div>
                    <div class="w-1 h-1 bg-blue-400 rounded-full opacity-30"></div>
                    <div class="w-3 h-3 bg-yellow-400 rounded-full opacity-15"></div>
                </div>
            </div>
            <div class="absolute bottom-40 right-20">
                <div class="flex space-x-2">
                    <div class="w-1 h-1 bg-green-400 rounded-full opacity-25"></div>
                    <div class="w-2 h-2 bg-blue-400 rounded-full opacity-20"></div>
                    <div class="w-1 h-1 bg-yellow-400 rounded-full opacity-30"></div>
                </div>
            </div>
        </div>

        <div class="container relative z-10 px-4 mx-auto">
            <!-- Section Header -->
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-4xl font-bold section-title">Profil Desa Kalibaru Manis</h2>
                <div class="w-20 h-1 mx-auto mb-6 rounded-full bg-gradient-to-r from-green-800 via-green-600 to-green-800">
                </div>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Mengenal lebih dekat sejarah, visi, dan misi desa yang terus berkembang menuju kemajuan
                </p>
            </div>

            <!-- Dynamic Layout Content -->
            <div class="space-y-16">

                <!-- Sejarah Section with Image Integration -->
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <!-- Text Content -->
                    <div class="order-2 lg:order-1">
                        <div class="p-8 transition-all duration-500 nature-card rounded-3xl">
                            <div class="flex items-center mb-6">
                                <div
                                    class="flex items-center justify-center w-12 h-12 mr-4 text-white bg-gradient-to-br from-blue-500 to-green-500 rounded-2xl">
                                    <i class="fas fa-history"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800">Sejarah Desa</h3>
                            </div>
                            <p class="leading-relaxed text-gray-600">
                                <!-- Placeholder untuk konten sejarah -->
                                Sejarah Desa kalibarumanis tidak terlepas dari sejarah Masyarakat di Kabupaten Bayuwangi.
                                Desa Kalibarumanis di wilayah Kecamatan Kalibaru, Kabupaten Banyuwangi,Provinsi Jawa Timur,
                                Indoesia yang letaknya diujung paling barat dari Kecamatan Kalibaru sekaligus Pemeritahan
                                Kabupaten Banyuwangi yang perbatasan dengan Kabupaten Jember. Desa kalibarumanis terletak
                                tepat dikaki Gunung Gumitir sehingga suasananya sejuk. Desa ini memiliki nilai sejarah
                                Belanda, yakni terowongan Mrawan. Terowongan ini dibangun sekitar tahun 1901-1902 dan mulai
                                beroperasi pada tahun 1910. Pada mulanya Desa Kalibarumanis dan Desa Banyuanyar menjadi
                                satu, dan pada tahun 1992 Desa Kalibarumanis dipecah menjadi 2 (dua) yaitu : Desa Banyuanyar
                                menjadi desa persiapan dan sebagai induk Desa kalibarumanis. Selanjutnya pada tahun 1995
                                Desa Banyuanyar disahkan menjadi Desa difinitif (berdiri sendiri).
                            </p>
                            <!-- Decorative element -->
                            <div class="flex items-center mt-6">
                                <div class="w-8 h-1 mr-4 rounded-full bg-gradient-to-r from-blue-400 to-green-400"></div>
                                <span class="text-sm font-medium text-gray-500">Warisan Budaya Nusantara</span>
                            </div>
                        </div>
                    </div>

                    <!-- Image Content -->
                    <div class="order-1 lg:order-2">
                        <div class="relative group">
                            <!-- Main image -->
                            <div class="overflow-hidden shadow-2xl rounded-3xl">
                                <img src="images/profil-1.jpg" alt="Sejarah Desa Kalibaru Manis"
                                    class="object-cover w-full transition-transform duration-700 h-80 group-hover:scale-110">
                            </div>
                            <!-- Floating card overlay -->
                            <div
                                class="absolute p-4 transition-all duration-300 transform nature-card -bottom-6 -left-6 rounded-2xl group-hover:translate-y(-2px)">
                                <div class="flex items-center">
                                    <i class="mr-3 text-2xl text-blue-500 fas fa-landmark"></i>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-800">Est. 1901</div>
                                        <div class="text-xs text-gray-500">Tahun Berdiri</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visi Section -->
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <!-- Image Content -->
                    <div class="relative group">
                        <div class="overflow-hidden shadow-2xl rounded-3xl">
                            <img src="images/profil-2.jpg" alt="Visi Desa Kalibaru Manis"
                                class="object-cover w-full transition-transform duration-700 h-80 group-hover:scale-110">
                        </div>
                        <!-- Decorative elements -->
                        <div
                            class="absolute w-20 h-20 opacity-20 bg-gradient-to-br from-yellow-400 to-orange-400 organic-shape -top-4 -right-4 float-animation">
                        </div>
                        <div
                            class="absolute w-12 h-12 opacity-30 bg-gradient-to-br from-green-400 to-blue-400 organic-shape-2 -bottom-2 -left-2 float-animation-delayed">
                        </div>
                    </div>

                    <!-- Text Content -->
                    <div>
                        <div
                            class="p-8 transition-all duration-500 bg-gradient-to-br from-blue-50 to-green-50 nature-card rounded-3xl">
                            <div class="flex items-center mb-6">
                                <div
                                    class="flex items-center justify-center w-12 h-12 mr-4 text-white bg-gradient-to-br from-green-500 to-blue-500 rounded-2xl">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800">Visi Desa</h3>
                            </div>
                            <div class="p-6 bg-white/60 rounded-2xl backdrop-blur-sm">
                                <p class="text-lg font-medium leading-relaxed text-gray-800">
                                    <!-- Placeholder untuk visi -->
                                    "Terwujudnya Desa Kalibarumanis yang lebih maju dan Berkualitas Demi Membangkitkan
                                    Sumber Daya Manusia Yang Lebih baik Dengan Dasar Semangat Gotong royong membangun desa
                                    Semangat Bersama,Semangat Bermasyarakat dan Semangat Berprestasi untuk Menuju Masyarakat
                                    Yang Mandiri dan Sejahtera "
                                </p>
                            </div>
                            <!-- Quote decoration -->
                            <div class="flex justify-end mt-4">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="mr-2 fas fa-quote-right"></i>
                                    <span>Visi 2020-2027</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Misi Section -->
                <div class="grid gap-12 lg:grid-cols-3">
                    <!-- Header -->
                    <div class="lg:col-span-3">
                        <div class="mb-8 text-center">
                            <div class="flex items-center justify-center mb-4">
                                <div
                                    class="flex items-center justify-center w-16 h-16 text-white bg-gradient-to-br from-yellow-500 to-green-500 rounded-3xl">
                                    <i class="text-2xl fas fa-bullseye"></i>
                                </div>
                            </div>
                            <h3 class="mb-4 text-3xl font-bold text-gray-800">Misi Desa</h3>
                            <p class="max-w-2xl mx-auto text-gray-600">
                                Langkah konkret yang kami ambil untuk mewujudkan visi desa yang mandiri dan sejahtera
                            </p>
                        </div>
                    </div>

                    <!-- Misi Items with Image Background -->
                    <div class="relative lg:col-span-3">
                        <div class="grid justify-center gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <!-- Misi 1 -->
                            <div
                                class="relative p-6 transition-all duration-500 group nature-card rounded-3xl hover:shadow-2xl">
                                <div class="absolute inset-0 overflow-hidden rounded-3xl opacity-5">
                                    <img src="images/desa3.jpeg" alt="Background" class="object-cover w-full h-full">
                                </div>
                                <div class="relative z-10">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mb-4 text-white transition-transform duration-300 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl group-hover:scale-110">
                                        <span class="font-bold">1</span>
                                    </div>
                                    <p class="leading-relaxed text-gray-700">
                                        Mewujudkan dan mengembangkan kegiatan keagamaan untuk menambah keimanan dan
                                        ketaqwaan kepada Tuhan Yang Maha Esa.
                                    </p>
                                </div>
                            </div>

                            <!-- Misi 2 -->
                            <div
                                class="relative p-6 transition-all duration-500 group nature-card rounded-3xl hover:shadow-2xl">
                                <div class="absolute inset-0 overflow-hidden rounded-3xl opacity-5">
                                    <img src="images/desa1.jpeg" alt="Background" class="object-cover w-full h-full">
                                </div>
                                <div class="relative z-10">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mb-4 text-white transition-transform duration-300 bg-gradient-to-br from-green-500 to-teal-500 rounded-2xl group-hover:scale-110">
                                        <span class="font-bold">2</span>
                                    </div>
                                    <p class="leading-relaxed text-gray-700">
                                        Mewujudkan dan mendorong terjadinya usaha-usaha kerukunan antar dan internal warga
                                        masyarakat yang disebabkan karena adanya perbedaan agama, keyakinan, organisasi, dan
                                        lainnya dalam suasana saling menghargai dan menghormati.
                                    </p>
                                </div>
                            </div>

                            <!-- Misi 3 -->
                            <div
                                class="relative p-6 transition-all duration-500 group nature-card rounded-3xl hover:shadow-2xl">
                                <div class="absolute inset-0 overflow-hidden rounded-3xl opacity-5">
                                    <img src="images/desa2.jpeg" alt="Background" class="object-cover w-full h-full">
                                </div>
                                <div class="relative z-10">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mb-4 text-white transition-transform duration-300 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl group-hover:scale-110">
                                        <span class="font-bold">3</span>
                                    </div>
                                    <p class="leading-relaxed text-gray-700">
                                        Membangun dan meningkatkan hasil pertanian dengan jalan penataan pengairan,
                                        perbaikan jalan sawah / jalan usaha tani, pemupukan, dan polatanam yang baik.
                                    </p>
                                </div>
                            </div>

                            <!-- Misi 4 -->
                            <div
                                class="relative p-6 transition-all duration-500 group nature-card rounded-3xl hover:shadow-2xl">
                                <div class="absolute inset-0 overflow-hidden rounded-3xl opacity-5">
                                    <img src="images/desa3.jpeg" alt="Background" class="object-cover w-full h-full">
                                </div>
                                <div class="relative z-10">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mb-4 text-white transition-transform duration-300 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl group-hover:scale-110">
                                        <span class="font-bold">4</span>
                                    </div>
                                    <p class="leading-relaxed text-gray-700">
                                        Mewujudkan Pemerintahan Desa Demokratif & Responsif yang selaras dan bertanggung
                                        jawab dalam mengemban amanat masyarakat.
                                    </p>
                                </div>
                            </div>

                            <!-- Misi 5 -->
                            <div
                                class="relative p-6 transition-all duration-500 group nature-card rounded-3xl hover:shadow-2xl">
                                <div class="absolute inset-0 overflow-hidden rounded-3xl opacity-5">
                                    <img src="images/desa1.jpeg" alt="Background" class="object-cover w-full h-full">
                                </div>
                                <div class="relative z-10">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mb-4 text-white transition-transform duration-300 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-2xl group-hover:scale-110">
                                        <span class="font-bold">5</span>
                                    </div>
                                    <p class="leading-relaxed text-gray-700">
                                        Meningkatkan pelayanan masyarakat secara terpadu dan serius.
                                    </p>
                                </div>
                            </div>

                            <!-- Misi 6 -->
                            <div
                                class="relative p-6 transition-all duration-500 group nature-card rounded-3xl hover:shadow-2xl">
                                <div class="absolute inset-0 overflow-hidden rounded-3xl opacity-5">
                                    <img src="images/desa2.jpeg" alt="Background" class="object-cover w-full h-full">
                                </div>
                                <div class="relative z-10">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mb-4 text-white transition-transform duration-300 bg-gradient-to-br from-rose-500 to-red-500 rounded-2xl group-hover:scale-110">
                                        <span class="font-bold">6</span>
                                    </div>
                                    <p class="leading-relaxed text-gray-700">
                                        Mendorong terbentuknya Badan Usaha Milik Desa (BUMDes) beserta unit usahanya.
                                    </p>
                                </div>
                            </div>

                            <!-- Misi 7 -->
                            <div
                                class="relative p-6 transition-all duration-500 group nature-card rounded-3xl hover:shadow-2xl">
                                <div class="absolute inset-0 overflow-hidden rounded-3xl opacity-5">
                                    <img src="images/desa2.jpeg" alt="Background" class="object-cover w-full h-full">
                                </div>
                                <div class="relative z-10">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mb-4 text-white transition-transform duration-300 bg-gradient-to-br from-emerald-500 to-lime-500 rounded-2xl group-hover:scale-110">
                                        <span class="font-bold">7</span>
                                    </div>
                                    <p class="leading-relaxed text-gray-700">
                                        Menumbuhkembangkan usaha kecil dan menengah.
                                    </p>
                                </div>
                            </div>

                            <!-- Misi 8 -->
                            <div
                                class="relative p-6 transition-all duration-500 group nature-card rounded-3xl hover:shadow-2xl">
                                <div class="absolute inset-0 overflow-hidden rounded-3xl opacity-5">
                                    <img src="images/desa2.jpeg" alt="Background" class="object-cover w-full h-full">
                                </div>
                                <div class="relative z-10">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mb-4 text-white transition-transform duration-300 bg-gradient-to-br from-cyan-500 to-sky-500 rounded-2xl group-hover:scale-110">
                                        <span class="font-bold">8</span>
                                    </div>
                                    <p class="leading-relaxed text-gray-700">
                                        Bekerjasama dengan Dinas Kehutanan dan Perkebunan didalam Melestarikan Lingkungan
                                        Hidup.
                                    </p>
                                </div>
                            </div>

                            <!-- Misi 9 -->
                            <div
                                class="relative p-6 transition-all duration-500 group nature-card rounded-3xl hover:shadow-2xl">
                                <div class="absolute inset-0 overflow-hidden rounded-3xl opacity-5">
                                    <img src="images/desa2.jpeg" alt="Background" class="object-cover w-full h-full">
                                </div>
                                <div class="relative z-10">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mb-4 text-white transition-transform duration-300 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl group-hover:scale-110">
                                        <span class="font-bold">9</span>
                                    </div>
                                    <p class="leading-relaxed text-gray-700">
                                        Membangun dan mendorong majunya bidang pendidikan baik formal maupun informal yang
                                        mudah diakses dan dinikmati seluruh warga masyarakat tanpa terkecuali yang mampu
                                        menghasilkan insan intelektual, inovatif dan enterpreneur (wirausahawan).
                                    </p>
                                </div>
                            </div>

                            <!-- Misi 10 -->
                            <div
                                class="relative p-6 transition-all duration-500 group nature-card rounded-3xl hover:shadow-2xl">
                                <div class="absolute inset-0 overflow-hidden rounded-3xl opacity-5">
                                    <img src="images/desa2.jpeg" alt="Background" class="object-cover w-full h-full">
                                </div>
                                <div class="relative z-10">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mb-4 text-white transition-transform duration-300 bg-gradient-to-br from-violet-500 to-purple-500 rounded-2xl group-hover:scale-110">
                                        <span class="font-bold">10</span>
                                    </div>
                                    <p class="leading-relaxed text-gray-700">
                                        Melestarikan budaya, adat istiadat dan kearifan lokal.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="mt-16 text-center">
            <div class="inline-block p-8 transition-all duration-500 nature-card rounded-3xl hover:shadow-2xl">
                <h4 class="mb-4 text-xl font-bold text-gray-800">Mari Bersama Membangun Desa</h4>
                <p class="mb-6 text-gray-600">Bergabunglah dengan kami dalam mewujudkan visi dan misi desa yang lebih
                    baik</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://wa.me/6282228175411" target="_blank"
                        class="inline-flex items-center px-6 py-3 text-white transition-all duration-300 transform rounded-full bg-gradient-to-r from-blue-500 to-green-500 hover:scale-105 hover:shadow-lg">
                        <i class="mr-2 fas fa-phone"></i>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Statistik Section -->
    <section class="py-12">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-primary">Statistik Penduduk <span
                        class="text-xl italic font-light text-gray-600">(Data Tahun 2019)</span>
                </h2>
                <div class="w-12 h-1 mx-auto mt-4 bg-primary"></div>
            </div>

            <!-- Overview Cards -->
            <div class="grid grid-cols-1 gap-4 mb-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Total Penduduk -->
                <div class="group">
                    <div
                        class="p-5 transition-all duration-300 border border-gray-100 bg-white/80 backdrop-blur-sm rounded-2xl hover:bg-white hover:shadow-lg hover:border-primary/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Total Penduduk</h4>
                                <p class="mt-1 text-2xl font-bold text-primary">
                                    {{ number_format($statistik->total_penduduk ?? 0) }}
                                </p>
                            </div>
                            <div
                                class="flex items-center justify-center w-12 h-12 transition-colors bg-primary/10 rounded-xl group-hover:bg-primary/20">
                                <i class="text-lg fas fa-users text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah KK -->
                <div class="group">
                    <div
                        class="p-5 transition-all duration-300 border border-gray-100 bg-white/80 backdrop-blur-sm rounded-2xl hover:bg-white hover:shadow-lg hover:border-primary/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Jumlah KK</h4>
                                <p class="mt-1 text-2xl font-bold text-primary">
                                    {{ number_format($statistik->jumlah_kk ?? 0) }}
                                </p>
                            </div>
                            <div
                                class="flex items-center justify-center w-12 h-12 transition-colors bg-primary/10 rounded-xl group-hover:bg-primary/20">
                                <i class="text-lg fas fa-home text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Laki-laki -->
                <div class="group">
                    <div
                        class="p-5 transition-all duration-300 border border-gray-100 bg-white/80 backdrop-blur-sm rounded-2xl hover:bg-white hover:shadow-lg hover:border-primary/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Laki-laki</h4>
                                <p class="mt-1 text-2xl font-bold text-primary">
                                    {{ number_format($statistik->laki_laki ?? 0) }}
                                </p>
                            </div>
                            <div
                                class="flex items-center justify-center w-12 h-12 transition-colors bg-primary/10 rounded-xl group-hover:bg-primary/20">
                                <i class="text-lg fas fa-male text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Perempuan -->
                <div class="group">
                    <div
                        class="p-5 transition-all duration-300 border border-gray-100 bg-white/80 backdrop-blur-sm rounded-2xl hover:bg-white hover:shadow-lg hover:border-primary/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Perempuan</h4>
                                <p class="mt-1 text-2xl font-bold text-primary">
                                    {{ number_format($statistik->perempuan ?? 0) }}
                                </p>
                            </div>
                            <div
                                class="flex items-center justify-center w-12 h-12 transition-colors bg-primary/10 rounded-xl group-hover:bg-primary/20">
                                <i class="text-lg fas fa-female text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Statistics -->
            <div class="grid grid-cols-1 gap-8 xl:grid-cols-3">
                <!-- Kelompok Usia -->
                <div class="p-6 bg-white shadow-md rounded-2xl">
                    <h4 class="mb-6 text-xl font-semibold text-primary">Berdasarkan Kelompok Usia</h4>
                    <div class="relative h-[280px] mb-4">
                        <canvas id="ageChart"></canvas>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-6">
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Anak (0-14 th)</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->anak ?? 0) }} jiwa
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Remaja (15-24 th)</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->remaja ?? 0) }} jiwa
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Dewasa (25-54 th)</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->dewasa ?? 0) }} jiwa
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Lansia (>55 th)</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->lansia ?? 0) }} jiwa
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pekerjaan -->
                <div class="p-6 bg-white shadow-md rounded-2xl xl:col-span-2">
                    <h4 class="mb-6 text-xl font-semibold text-primary">Berdasarkan Pekerjaan</h4>
                    <div class="relative h-[280px] mb-4">
                        <canvas id="jobChart"></canvas>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-6 md:grid-cols-3 lg:grid-cols-4">
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Petani</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->petani ?? 0) }} jiwa
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Perkebunan</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->perkebunan ?? 0) }}
                                jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Perdagangan</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->perdagangan ?? 0) }}
                                jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">PNS</div>
                            <div class="mt-1 font-semibold text-primary">
                                {{ number_format($statistik->pegawai_negeri_sipil ?? 0) }}
                                jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Pegawai Swasta</div>
                            <div class="mt-1 font-semibold text-primary">
                                {{ number_format($statistik->pegawai_swasta ?? 0) }} jiwa
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Buruh Tani</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->buruh_tani ?? 0) }}
                                jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Pengrajin</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->pengrajin ?? 0) }}
                                jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Tukang Kayu</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->tukang_kayu ?? 0) }}
                                jiwa</div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Tukang Batu</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->batu ?? 0) }} jiwa
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">POLRI</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->polri ?? 0) }} jiwa
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">TNI</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->tni ?? 0) }} jiwa
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-primary/5">
                            <div class="text-sm text-black/70">Jasa</div>
                            <div class="mt-1 font-semibold text-primary">{{ number_format($statistik->jasa ?? 0) }} jiwa
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gender Distribution -->
                <div class="p-6 bg-white shadow-md rounded-2xl xl:col-span-3">
                    <h4 class="mb-6 text-xl font-semibold text-primary">Distribusi Gender</h4>
                    <div class="relative h-[250px]">
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
            <div class="grid grid-cols-2 gap-3 sm:grid-cols-2 sm:gap-4 md:grid-cols-3 md:gap-5 lg:grid-cols-4 lg:gap-6">
                @foreach ($organisations as $org)
                    <div class="relative animate-fade-in-up" style="animation-delay: {{ $loop->index * 100 }}ms;">
                        <div class="org-vertical-card group">
                            <div class="org-card-backdrop"></div>
                            <div class="org-card-content">
                                <!-- Avatar Section -->
                                <div class="org-avatar-section">
                                    <div class="org-avatar-frame">
                                        <img src="{{ $org->foto_url ?? asset('images/default-avatar.png') }}"
                                            alt="{{ $org->nama }}" class="org-avatar-img">
                                        <div class="org-avatar-overlay"></div>
                                    </div>
                                </div>

                                <!-- Info Section -->
                                <div class="org-info-section">
                                    <div class="org-main-content">
                                        <h5 class="org-member-name">{{ $org->nama }}</h5>
                                        <div class="org-position-tag">
                                            <i class="fas fa-user-tie org-position-icon"></i>
                                            <span>{{ $org->jabatan }}</span>
                                        </div>
                                        <!-- Decorative Elements -->
                                        <div class="org-decorative-line"></div>
                                    </div>

                                    <div class="org-status-indicator">
                                        <span class="org-status-dot"></span>
                                        <span class="org-status-text">Aktif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="group">
                    <div
                        class="p-5 transition-all duration-300 border border-gray-100 bg-white/80 backdrop-blur-sm rounded-2xl hover:bg-white hover:shadow-lg hover:border-primary/20">
                        <div class="flex items-center">
                            <div
                                class="flex items-center justify-center w-12 h-12 mr-4 transition-colors bg-primary/10 rounded-xl group-hover:bg-primary/20">
                                <i class="text-lg fas fa-map-marker-alt text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 font-semibold text-gray-800">Alamat</h6>
                                <p class="text-sm text-gray-500">{{ $kontak['alamat'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="group">
                    <div
                        class="p-5 transition-all duration-300 border border-gray-100 bg-white/80 backdrop-blur-sm rounded-2xl hover:bg-white hover:shadow-lg hover:border-primary/20">
                        <div class="flex items-center">
                            <div
                                class="flex items-center justify-center w-12 h-12 mr-4 transition-colors bg-primary/10 rounded-xl group-hover:bg-primary/20">
                                <i class="text-lg fas fa-phone text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 font-semibold text-gray-800">Telepon</h6>
                                <p class="text-sm text-gray-500">{{ $kontak['telepon'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="group">
                    <div
                        class="p-5 transition-all duration-300 border border-gray-100 bg-white/80 backdrop-blur-sm rounded-2xl hover:bg-white hover:shadow-lg hover:border-primary/20">
                        <div class="flex items-center">
                            <div
                                class="flex items-center justify-center w-12 h-12 mr-4 transition-colors bg-primary/10 rounded-xl group-hover:bg-primary/20">
                                <i class="text-lg fab fa-instagram text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 font-semibold text-gray-800">Instagram</h6>
                                <p class="text-sm text-gray-500">{{ $kontak['email'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sarana dan Prasarana Section -->
    <section class="py-12 bg-white">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-[#5B8BB8]">Sarana & Prasarana</h2>
                <div class="w-12 h-1 bg-[#5B8BB8] mx-auto mt-4"></div>
            </div>

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                <!-- Sarana Pemerintahan -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-landmark text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Sarana Pemerintahan</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Desa Kalibarumanis memiliki <strong>1 Kantor Desa</strong> yang berfungsi sebagai pusat
                            pelayanan
                            administrasi,
                            pengelolaan kegiatan pemerintahan, serta wadah koordinasi masyarakat dalam berbagai program
                            desa.
                        </p>
                    </div>
                </div>

                <!-- Sarana Jalan -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-road text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Sarana Jalan</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Jaringan jalan desa meliputi <strong>4 dusun</strong> dengan jalur penghubung berupa jalan desa,
                            jalan kampung,
                            dan jalan lingkungan RT yang memudahkan mobilitas warga serta mendukung kegiatan ekonomi dan
                            sosial.
                        </p>
                    </div>
                </div>

                <!-- Sarana Listrik -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-bolt text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Sarana Listrik</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Seluruh dusun di Desa Kalibarumanis telah terjangkau layanan listrik, dengan mayoritas rumah
                            tangga
                            menggunakan penerangan listrik. Jaringan ini juga mendukung kegiatan masyarakat dan fasilitas
                            umum.
                        </p>
                    </div>
                </div>

                <!-- Sarana Ekonomi -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-store text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Sarana Ekonomi</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Desa didukung oleh berbagai sarana ekonomi seperti <strong>toko</strong> dan
                            <strong>warung</strong>
                            yang menyediakan
                            kebutuhan pokok warga. Kegiatan pertanian seperti padi, cabe, dan tomat menjadi sumber
                            pendapatan
                            utama masyarakat.
                        </p>
                    </div>
                </div>

                <!-- Sarana Pendidikan -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-school text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Sarana Pendidikan</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Fasilitas pendidikan meliputi <strong>7 TK/PAUD</strong>, <strong>8 SD/MI</strong>, dan
                            <strong>1
                                SLTP</strong>,
                            yang menjadi pusat pembelajaran bagi generasi muda desa dengan dukungan tenaga pendidik yang
                            berdedikasi.
                        </p>
                    </div>
                </div>

                <!-- Sarana Kesehatan -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-clinic-medical text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Sarana Kesehatan</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Pelayanan kesehatan desa mencakup <strong>1 Ponkesdes</strong>, <strong>13 Posyandu</strong>,
                            <strong>2 Bidan</strong>,
                            <strong>1 Mantri</strong>, dan <strong>84 kader posyandu</strong> yang aktif membantu kesehatan
                            masyarakat.
                        </p>
                    </div>
                </div>

                <!-- Sarana Ibadah -->
                <div class="group md:col-span-2 lg:col-span-3">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-mosque text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Sarana Ibadah</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Desa memiliki <strong>19 Masjid</strong> dan <strong>32 Musholla</strong> yang menjadi pusat
                            kegiatan keagamaan
                            dan pembinaan umat, menunjang kehidupan religius masyarakat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Potensi Desa Section -->
    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-[#5B8BB8]">Potensi Desa</h2>
                <p class="max-w-2xl mx-auto mt-3 text-gray-600">
                    Potensi alam dan sumber daya Desa Kalibarumanis membuka peluang di sektor pertanian, perkebunan,
                    peternakan, dan agro-industri — khususnya kopi.
                </p>
                <div class="w-16 h-1 bg-[#5B8BB8] mx-auto mt-6"></div>
            </div>

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                <!-- Lahan Pertanian (sawah) -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-seedling text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Lahan Pertanian (Sawah)</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Tersedia <strong>155,4 Ha</strong> lahan sawah yang berpotensi ditingkatkan produktivitasnya
                            untuk
                            mendukung ketahanan pangan dan pengolahan pangan skala desa.
                        </p>
                    </div>
                </div>

                <!-- Perkebunan & Pekarangan -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-tree text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Perkebunan & Pekarangan</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Luas area perkebunan dan pekarangan mencapai <strong>1.474,7 Ha</strong>, dikelola secara
                            maksimal
                            dan mendukung produksi komoditas lokal.
                        </p>
                    </div>
                </div>

                <!-- Kawasan Hutan -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-mountain text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Kawasan Hutan</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Ada kawasan hutan negara yang dapat dikembangkan bersama masyarakat untuk konservasi
                            terintegrasi
                            dan kegiatan agroforestry yang berkelanjutan.
                        </p>
                    </div>
                </div>

                <!-- Peternakan & Pakan -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-tractor text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Peternakan & Pakan</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Ketersediaan pakan ternak mendukung pengembangan usaha ternak (sapi, kambing), dengan peluang
                            tambah
                            nilai dari pengolahan kotoran menjadi pupuk organik.
                        </p>
                    </div>
                </div>

                <!-- Pupuk Organik -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-recycle text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Pupuk Organik</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Melimpahnya sisa kotoran ternak membuka peluang usaha pupuk organik skala lokal yang dapat
                            meningkatkan produktivitas lahan.
                        </p>
                    </div>
                </div>

                <!-- Hasil Tanaman Lain -->
                <div class="group">
                    <div
                        class="p-6 transition-all duration-300 bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl hover:bg-white hover:shadow-lg hover:border-[#5B8BB8]/20">
                        <div
                            class="w-12 h-12 bg-[#5B8BB8]/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#5B8BB8]/20 transition-colors">
                            <i class="fas fa-warehouse text-[#5B8BB8] text-lg"></i>
                        </div>
                        <h3 class="mb-3 text-lg font-semibold text-gray-800">Hasil Tanaman</h3>
                        <p class="text-sm leading-relaxed text-gray-500">
                            Produksi kacang tanah, jagung, ubi, dan tanaman lainnya cukup melimpah — fondasi yang kuat untuk
                            pengembangan agro-industri lokal.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Spesial: Potensi Kopi -->
            <div class="mt-12">
                <div class="p-6 bg-white shadow-lg rounded-xl lg:flex lg:items-center lg:gap-8">
                    <div class="lg:w-1/3">
                        <img src="{{ asset('images/kopi.jpg') }}" alt="Kopi Kalibarumanis"
                            class="object-cover w-full h-48 rounded-lg">
                    </div>
                    <div class="mt-6 lg:mt-0 lg:w-2/3">
                        <h3 class="text-2xl font-semibold text-[#5B8BB8]">Potensi Kopi Kalibarumanis</h3>
                        <p class="mt-3 leading-relaxed text-gray-700">
                            Desa Kalibarumanis termasuk kawasan penghasil kopi (khususnya Robusta) di wilayah Kalibaru —
                            aktivitas kopi menjadi salah satu sumber penghidupan penting bagi warga.
                            Pengembangan kopi meliputi budidaya, panen, hingga pengolahan pasca-panen dan pemanggangan
                            (roasting) yang kini turut menjadi produk UMKM lokal.
                        </p>

                        <p class="mt-3 text-sm leading-relaxed text-gray-600">
                            Kalibarumanis juga menjadi salah satu lokasi kegiatan festival dan promosi kopi lokal yang
                            mengangkat produk petani setempat, membuka peluang pasar dan kolaborasi agribisnis.
                            <!-- Sumber: artikel lokal & pemberitaan terkait festival kopi Kalibaru. -->
                        </p>

                        <div class="flex items-center gap-4 mt-4">
                        </div>

                        <p class="mt-4 text-xs text-gray-500">
                            Sumber: publikasi lokal dan pemberitaan festival kopi Kalibaru.
                        </p>
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
                                        @if ($a->hasThumbnail())
                                            <img src="{{ $a->thumbnail_url }}" alt="{{ $a->judul }}"
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

    <!-- Enhanced Image Collage Section - Living Memories Garden -->
    <section class="relative py-16 overflow-hidden memories-garden-bg">
        <!-- Enhanced Floating Background Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <!-- Organic floating shapes -->
            <div
                class="absolute w-64 h-64 rounded-full opacity-5 bg-gradient-to-br from-white to-amber-200 top-10 left-16 blur-3xl animate-float-slow">
            </div>
            <div
                class="absolute rounded-full w-80 h-80 opacity-4 bg-gradient-to-br from-emerald-200 to-teal-200 bottom-20 right-20 blur-3xl animate-float-delayed">
            </div>
            <div
                class="absolute w-48 h-48 rounded-full opacity-6 bg-gradient-to-br from-yellow-200 to-orange-200 top-1/2 left-1/4 blur-2xl animate-float-reverse">
            </div>

            <!-- Nature pattern overlay -->
            <div class="absolute inset-0 opacity-10 nature-pattern"></div>

            <!-- Floating particles -->
            <div class="floating-particles">
                <div class="particle particle-1"></div>
                <div class="particle particle-2"></div>
                <div class="particle particle-3"></div>
                <div class="particle particle-4"></div>
                <div class="particle particle-5"></div>
            </div>
        </div>

        <div class="container relative z-10 px-4 mx-auto">
            <!-- Centered Section Header -->
            <div class="mb-12 text-center">
                <div class="flex items-center justify-center mb-6">
                    <div
                        class="flex items-center justify-center w-16 h-16 transition-all duration-500 transform shadow-2xl md:w-20 md:h-20 bg-gradient-to-br from-amber-400 via-yellow-400 to-orange-400 rounded-3xl rotate-3 hover:rotate-6">
                        <i class="text-2xl text-white md:text-3xl fas fa-heart animate-pulse"></i>
                    </div>
                </div>
                <h2 class="pb-3 mb-4 text-4xl font-bold text-white md:text-5xl section-title-gradient">Kehangatan
                    Masyarakat
                    Desa</h2>
                <div
                    class="w-24 h-1 mx-auto mb-6 rounded-full bg-gradient-to-r from-amber-400 via-yellow-400 to-orange-400">
                </div>
                <p class="max-w-3xl mx-auto text-lg leading-relaxed md:text-xl text-white/90">
                    Setiap sudut desa menyimpan cerita tentang kebersamaan, kekeluargaan, dan kehangatan yang tak ternilai
                    harganya
                </p>
            </div>

            <!-- Two Column Layout -->
            <div class="grid items-start grid-cols-1 gap-12 lg:grid-cols-5 lg:gap-16">
                <!-- Photo Grid Column (60% - 3/5) -->
                <div class="lg:col-span-3">
                    <!-- Enhanced Photo Grid -->
                    <div class="relative flex items-center justify-center h-[500px] md:h-[600px]">
                        <!-- Background decorative elements (keep existing floating particles, etc.) -->
                        <div class="absolute inset-0 pointer-events-none">
                            <!-- Enhanced Sparkle Effects -->
                            <div class="sparkle-constellation">
                                <div class="sparkle sparkle-1"></div>
                                <div class="sparkle sparkle-2"></div>
                                <div class="sparkle sparkle-3"></div>
                                <div class="sparkle sparkle-4"></div>
                                <div class="sparkle sparkle-5"></div>
                                <div class="sparkle sparkle-6"></div>
                            </div>

                            <!-- Orbital rings for decoration -->
                            <div class="orbital-ring ring-inner"></div>
                            <div class="orbital-ring ring-outer"></div>
                        </div>

                        <!-- Photo Grid -->
                        <div class="relative z-10 photo-grid">
                            <div class="photo-frame group">
                                <img src="images/kehangatan-1.jpg" alt="Kehangatan Masyarakat Desa Kalibaru Manis"
                                    class="photo-image">
                                <div class="photo-overlay">
                                    <div class="photo-overlay-content">
                                        <div class="photo-overlay-icon">
                                            <i class="fas fa-heart"></i>
                                        </div>
                                        <p class="photo-overlay-text">Kebersamaan Warga</p>
                                    </div>
                                </div>
                            </div>

                            <div class="photo-frame group">
                                <img src="images/kehangatan-2.jpg" alt="Aktivitas Sehari-hari Warga" class="photo-image">
                                <div class="photo-overlay">
                                    <div class="photo-overlay-content">
                                        <div class="photo-overlay-icon">
                                            <i class="fas fa-hands-helping"></i>
                                        </div>
                                        <p class="photo-overlay-text">Gotong Royong</p>
                                    </div>
                                </div>
                            </div>

                            <div class="photo-frame group">
                                <img src="images/kehangatan-3.jpg" alt="Tradisi dan Budaya Desa" class="photo-image">
                                <div class="photo-overlay">
                                    <div class="photo-overlay-content">
                                        <div class="photo-overlay-icon">
                                            <i class="fas fa-seedling"></i>
                                        </div>
                                        <p class="photo-overlay-text">Tradisi Terjaga</p>
                                    </div>
                                </div>
                            </div>

                            <div class="photo-frame group">
                                <img src="images/kehangatan-4.jpg" alt="Pemandangan Desa yang Asri" class="photo-image">
                                <div class="photo-overlay">
                                    <div class="photo-overlay-content">
                                        <div class="photo-overlay-icon">
                                            <i class="fas fa-leaf"></i>
                                        </div>
                                        <p class="photo-overlay-text">Alam Sejuk</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Column (40% - 2/5) -->
                <div class="lg:col-span-2">
                    <!-- Compact Testimonial Cards -->
                    <div class="space-y-4">
                        <!-- Testimonial 1 -->
                        <div class="group testimonial-card-compact testimonial-primary">
                            <div class="testimonial-icon-compact">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="testimonial-text-compact">
                                "Di sini, tetangga bukan hanya tetangga, tapi keluarga besar yang saling menjaga dan
                                mendukung dalam suka dan duka."
                            </p>
                            <div class="testimonial-author-compact">
                                <div class="author-avatar-compact">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="author-info">
                                    <div class="author-name-compact">Pak Suyanto</div>
                                    <div class="author-role-compact">Ketua RT 03</div>
                                </div>
                            </div>
                            <div class="testimonial-decoration"></div>
                        </div>

                        <!-- Testimonial 2 -->
                        <div class="group testimonial-card-compact testimonial-secondary">
                            <div class="testimonial-icon-compact">
                                <i class="fas fa-heart"></i>
                            </div>
                            <p class="testimonial-text-compact">
                                "Gotong royong bukan hanya tradisi, tapi jiwa yang mengalir dalam setiap aktivitas warga
                                desa kami."
                            </p>
                            <div class="testimonial-author-compact">
                                <div class="author-avatar-compact">
                                    <i class="fas fa-female"></i>
                                </div>
                                <div class="author-info">
                                    <div class="author-name-compact">Bu Siti Aminah</div>
                                    <div class="author-role-compact">Ketua PKK Desa</div>
                                </div>
                            </div>
                            <div class="testimonial-decoration"></div>
                        </div>

                        <!-- Testimonial 3 -->
                        <div class="group testimonial-card-compact testimonial-tertiary">
                            <div class="testimonial-icon-compact">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <p class="testimonial-text-compact">
                                "Anak-anak tumbuh dengan nilai kebersamaan yang akan mereka bawa dan ajarkan pada generasi
                                selanjutnya."
                            </p>
                            <div class="testimonial-author-compact">
                                <div class="author-avatar-compact">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <div class="author-info">
                                    <div class="author-name-compact">Ibu Ratna</div>
                                    <div class="author-role-compact">Guru SD Kalibaru Manis</div>
                                </div>
                            </div>
                            <div class="testimonial-decoration"></div>
                        </div>
                    </div>
                </div>
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
                    danger: '#DC2626',
                    warning: '#F59E0B', // kuning orange
                    info: '#3B82F6', // biru terang
                    lightGreen: '#10B981', // hijau cerah
                    deepPurple: '#7C3AED', // ungu gelap
                    pink: '#EC4899', // pink
                    brown: '#A16207', // coklat emas
                    blueGray: '#64748B', // abu kebiruan
                    lime: '#84CC16', // hijau limau
                    sky: '#0EA5E9', // biru langit
                    rose: '#F43F5E', // merah rose
                    indigo: '#6366F1', // indigo
                    amber: '#FBBF24', // kuning amber
                    emerald: '#34D399' // hijau emerald
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
                    labels: ['Petani', 'Perkebunan', 'Perdagangan', 'PNS', 'Pegawai Swasta', 'Buruh Tani',
                        'Pengrajin', 'Tukang Kayu', 'Tukang Batu', 'Polri', 'TNI', 'Jasa'
                    ],
                    data: [
                        {{ $statistik->petani ?? 0 }},
                        {{ $statistik->perkebunan ?? 0 }},
                        {{ $statistik->perdagangan ?? 0 }},
                        {{ $statistik->pegawai_negeri_sipil ?? 0 }},
                        {{ $statistik->pegawai_swasta ?? 0 }},
                        {{ $statistik->buruh_tani ?? 0 }},
                        {{ $statistik->pengrajin ?? 0 }},
                        {{ $statistik->tukang_kayu ?? 0 }},
                        {{ $statistik->batu ?? 0 }},
                        {{ $statistik->polri ?? 0 }},
                        {{ $statistik->tni ?? 0 }},
                        {{ $statistik->jasa ?? 0 }}
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
                                chartColors.secondary,
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
                                chartColors.tertiary,
                                chartColors.info,
                                chartColors.lightGreen,
                                chartColors.deepPurple,
                                chartColors.pink,
                                chartColors.brown,
                                chartColors.blueGray,
                                chartColors.lime,
                                chartColors.sky,
                                chartColors.rose
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

            // Parallax effect untuk floating elements
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll('.parallax-element');

                parallaxElements.forEach(element => {
                    const speed = element.dataset.speed || 0.5;
                    const yPos = -(scrolled * speed);
                    element.style.transform = `translateY(${yPos}px)`;
                });
            });

            // Intersection Observer untuk animasi saat scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe semua card elements
            document.querySelectorAll('.nature-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
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

        /* Nature-inspired background patterns */
        .nature-bg {
            background-image:
                radial-gradient(circle at 25% 25%, #5B8BB8 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, #6E7E2A 0%, transparent 50%),
                linear-gradient(135deg, rgba(91, 139, 184, 0.05) 0%, rgba(110, 126, 42, 0.05) 100%);
        }

        .leaf-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%235B8BB8' fill-opacity='0.03'%3E%3Cpath d='M30 30c0-16.569 13.431-30 30-30v60c-16.569 0-30-13.431-30-30z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .topographic-lines {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20 20c20 0 20 20 40 20s20-20 40-20 20 20 40 20 20-20 40-20' stroke='%236E7E2A' stroke-width='0.5' fill='none' opacity='0.1'/%3E%3Cpath d='M20 40c20 0 20 20 40 20s20-20 40-20 20 20 40 20 20-20 40-20' stroke='%235B8BB8' stroke-width='0.5' fill='none' opacity='0.1'/%3E%3Cpath d='M20 60c20 0 20 20 40 20s20-20 40-20 20 20 40 20 20-20 40-20' stroke='%23D4AB07' stroke-width='0.5' fill='none' opacity='0.1'/%3E%3C/svg%3E");
        }

        .organic-shape {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }


        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }

        /* Floating animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            33% {
                transform: translateY(-10px) rotate(1deg);
            }

            66% {
                transform: translateY(5px) rotate(-1deg);
            }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .float-animation-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: -2s;
        }

        /* Parallax scroll effect */
        .parallax-element {
            transition: transform 0.1s ease-out;
        }

        /* Custom card styling */
        .nature-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nature-card:hover {
            background: rgba(255, 255, 255, 0.98);
            transform: translateY(-5px);
        }

        /* Text styling */
        .section-title {
            background: linear-gradient(135deg, #5B8BB8, #6E7E2A);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Enhanced Background */
        .memories-garden-bg {
            background: linear-gradient(135deg,
                    #5B8BB8 0%,
                    #4A7C59 25%,
                    #6E7E2A 50%,
                    #5B8BB8 75%,
                    #4A7C59 100%);
            position: relative;
        }

        .nature-pattern {
            background-image:
                radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(212, 171, 7, 0.1) 0%, transparent 40%);
        }

        /* Floating Animations */
        @keyframes float-slow {

            0%,
            100% {
                transform: translateY(0px) translateX(0px) rotate(0deg);
            }

            33% {
                transform: translateY(-20px) translateX(10px) rotate(1deg);
            }

            66% {
                transform: translateY(10px) translateX(-5px) rotate(-1deg);
            }
        }

        @keyframes float-delayed {

            0%,
            100% {
                transform: translateY(0px) translateX(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) translateX(-8px) rotate(2deg);
            }
        }

        @keyframes float-reverse {

            0%,
            100% {
                transform: translateY(0px) translateX(0px) rotate(0deg);
            }

            33% {
                transform: translateY(15px) translateX(-10px) rotate(-1deg);
            }

            66% {
                transform: translateY(-8px) translateX(5px) rotate(1deg);
            }
        }

        .animate-float-slow {
            animation: float-slow 8s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 10s ease-in-out infinite;
        }

        .animate-float-reverse {
            animation: float-reverse 12s ease-in-out infinite;
        }

        /* Floating Particles */
        .floating-particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: particle-float 15s ease-in-out infinite;
        }

        .particle-1 {
            top: 20%;
            left: 15%;
            animation-delay: 0s;
        }

        .particle-2 {
            top: 60%;
            right: 20%;
            animation-delay: 3s;
        }

        .particle-3 {
            bottom: 30%;
            left: 30%;
            animation-delay: 6s;
        }

        .particle-4 {
            top: 40%;
            right: 40%;
            animation-delay: 9s;
        }

        .particle-5 {
            bottom: 50%;
            right: 15%;
            animation-delay: 12s;
        }

        @keyframes particle-float {

            0%,
            100% {
                transform: translateY(0px) opacity(0.6);
            }

            25% {
                transform: translateY(-30px) opacity(1);
            }

            50% {
                transform: translateY(-60px) opacity(0.8);
            }

            75% {
                transform: translateY(-30px) opacity(1);
            }
        }

        /* Sparkle Constellation */
        .sparkle-constellation {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .sparkle {
            position: absolute;
            width: 8px;
            height: 8px;
            background: linear-gradient(45deg, #FFD700, #FFA500);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            animation: sparkle-twinkle 3s ease-in-out infinite;
        }

        .sparkle-1 {
            top: 15%;
            right: 25%;
            animation-delay: 0s;
        }

        .sparkle-2 {
            top: 30%;
            left: 20%;
            animation-delay: 0.5s;
        }

        .sparkle-3 {
            bottom: 25%;
            right: 30%;
            animation-delay: 1s;
        }

        .sparkle-4 {
            bottom: 40%;
            left: 15%;
            animation-delay: 1.5s;
        }

        .sparkle-5 {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .sparkle-6 {
            top: 45%;
            left: 75%;
            animation-delay: 2.5s;
        }

        @keyframes sparkle-twinkle {

            0%,
            100% {
                opacity: 0.3;
                transform: scale(1) rotate(0deg);
            }

            50% {
                opacity: 1;
                transform: scale(1.3) rotate(180deg);
            }
        }

        /* Orbital Rings */
        .orbital-ring {
            position: absolute;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }

        .ring-inner {
            width: 400px;
            height: 400px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: rotate-slow 20s linear infinite;
        }

        .ring-outer {
            width: 500px;
            height: 500px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: rotate-reverse 30s linear infinite;
        }

        @keyframes rotate-slow {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes rotate-reverse {
            0% {
                transform: translate(-50%, -50%) rotate(360deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(0deg);
            }
        }

        /* Enhanced Typography */
        .section-title-gradient {
            background: linear-gradient(135deg, #FFF 0%, #F7D94C 50%, #FFB347 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Enhanced Testimonial Cards */
        .testimonial-card {
            position: relative;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1.5rem;
            transition: all 0.4s ease;
            overflow: hidden;
        }

        .testimonial-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(135deg, var(--testimonial-color), var(--testimonial-color-alt));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .testimonial-primary {
            --testimonial-color: #FFD700;
            --testimonial-color-alt: #FFA500;
        }

        .testimonial-secondary {
            --testimonial-color: #10B981;
            --testimonial-color-alt: #059669;
        }

        .testimonial-tertiary {
            --testimonial-color: #3B82F6;
            --testimonial-color-alt: #1D4ED8;
        }

        .testimonial-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        }

        .testimonial-card:hover::before {
            opacity: 1;
        }

        .testimonial-icon {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--testimonial-color);
        }

        .testimonial-text {
            font-size: 1.1rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--testimonial-color), var(--testimonial-color-alt));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .author-name {
            font-size: 1rem;
            font-weight: 600;
            color: white;
        }

        .author-role {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .testimonial-decoration {
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, var(--testimonial-color), transparent);
            opacity: 0.05;
            border-radius: 50%;
            transition: all 0.5s ease;
        }

        .group:hover .testimonial-decoration {
            transform: scale(1.5);
            opacity: 0.1;
        }

        /* Enhanced CTA Section */
        .cta-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .cta-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #FFD700, #FFA500, #FF6B35);
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .cta-primary {
            background: linear-gradient(135deg, #FFD700, #FFA500);
            color: #1F2937;
        }

        .cta-primary:hover {
            background: linear-gradient(135deg, #FFA500, #FF6B35);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 165, 0, 0.4);
        }

        .cta-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .cta-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);
        }

        /* Pulse Glow Animation */
        @keyframes pulse-glow {

            0%,
            100% {
                opacity: 0.3;
                transform: scale(1);
            }

            50% {
                opacity: 0.7;
                transform: scale(1.1);
            }
        }

        .animate-pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .diamond-large {
                width: 240px;
                height: 240px;
            }

            .diamond-medium {
                width: 160px;
                height: 160px;
            }

            .ring-inner {
                width: 350px;
                height: 350px;
            }

            .ring-outer {
                width: 450px;
                height: 450px;
            }
        }

        @media (max-width: 768px) {
            .diamond-universe {
                height: 500px;
            }

            .diamond-large {
                width: 200px;
                height: 200px;
            }

            .diamond-medium {
                width: 130px;
                height: 130px;
            }

            .diamond-north {
                top: 12%;
            }

            .diamond-south {
                bottom: 12%;
            }

            .diamond-east {
                right: 5%;
            }

            .diamond-west {
                left: 5%;
            }

            .ring-inner {
                width: 300px;
                height: 300px;
            }

            .ring-outer {
                width: 380px;
                height: 380px;
            }

            .testimonial-card {
                padding: 1.5rem;
            }

            .testimonial-text {
                font-size: 1rem;
            }

            .section-title-gradient {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 480px) {
            .diamond-universe {
                height: 400px;
            }

            .diamond-large {
                width: 160px;
                height: 160px;
            }

            .diamond-medium {
                width: 100px;
                height: 100px;
            }

            .diamond-north {
                top: 8%;
            }

            .diamond-south {
                bottom: 8%;
            }

            .diamond-east {
                right: 2%;
            }

            .diamond-west {
                left: 2%;
            }

            .ring-inner {
                width: 250px;
                height: 250px;
            }

            .ring-outer {
                width: 320px;
                height: 320px;
            }

            .connection-line {
                display: none;
            }

            .sparkle {
                width: 6px;
                height: 6px;
            }

            .cta-button {
                padding: 0.625rem 1.25rem;
                font-size: 0.9rem;
            }

            .testimonial-card {
                padding: 1.25rem;
            }

            .cta-card {
                padding: 1.5rem;
            }
        }

        /* Print styles */
        @media print {

            .floating-particles,
            .sparkle-constellation,
            .orbital-ring,
            .connection-line {
                display: none;
            }

            .memories-garden-bg {
                background: #f8f9fa;
                color: #333;
            }

            .testimonial-card,
            .cta-card {
                background: #fff;
                border: 1px solid #ddd;
            }
        }

        /* Modern Photo Grid Styles */
        .photo-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            max-width: 500px;
            margin: 0 auto;
        }

        .photo-frame {
            position: relative;
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }

        .photo-frame:nth-child(1) {
            transform: rotate(-2deg);
        }

        .photo-frame:nth-child(2) {
            transform: rotate(1.5deg);
            margin-top: 1.5rem;
        }

        .photo-frame:nth-child(3) {
            transform: rotate(1deg);
            margin-top: -1rem;
        }

        .photo-frame:nth-child(4) {
            transform: rotate(-1.5deg);
            margin-top: 0.5rem;
        }

        .photo-frame:hover {
            transform: scale(1.05) rotate(0deg);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
            z-index: 10;
        }

        .photo-image {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .photo-frame:hover .photo-image {
            filter: brightness(1.1) contrast(1.05);
        }

        .photo-overlay {
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.9) 0%, rgba(255, 152, 0, 0.8) 100%);
            border-radius: 4px;
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .photo-frame:hover .photo-overlay {
            opacity: 1;
        }

        .photo-overlay-content {
            text-align: center;
            color: white;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        .photo-frame:hover .photo-overlay-content {
            transform: translateY(0);
        }

        .photo-overlay-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .photo-overlay-text {
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .photo-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
                max-width: 100%;
            }

            .photo-image {
                height: 180px;
            }

            .photo-frame:nth-child(2),
            .photo-frame:nth-child(3),
            .photo-frame:nth-child(4) {
                margin-top: 0;
            }
        }

        @media (max-width: 480px) {
            .photo-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .photo-image {
                height: 200px;
            }

            .photo-frame:nth-child(1),
            .photo-frame:nth-child(2),
            .photo-frame:nth-child(3),
            .photo-frame:nth-child(4) {
                margin-top: 0;
            }
        }

        /* Compact Testimonial Cards */
        .testimonial-card-compact {
            position: relative;
            padding: 1.25rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            transition: all 0.4s ease;
            overflow: hidden;
        }

        .testimonial-card-compact::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(135deg, var(--testimonial-color), var(--testimonial-color-alt));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .testimonial-card-compact:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .testimonial-card-compact:hover::before {
            opacity: 1;
        }

        .testimonial-icon-compact {
            font-size: 1rem;
            margin-bottom: 0.75rem;
            color: var(--testimonial-color);
        }

        .testimonial-text-compact {
            font-size: 0.9rem;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 1rem;
            font-style: italic;
        }

        .testimonial-author-compact {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .author-avatar-compact {
            width: 2.25rem;
            height: 2.25rem;
            background: linear-gradient(135deg, var(--testimonial-color), var(--testimonial-color-alt));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.9rem;
        }

        .author-name-compact {
            font-size: 0.875rem;
            font-weight: 600;
            color: white;
        }

        .author-role-compact {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Organisation Vertical Cards */
        .org-vertical-card {
            position: relative;
            height: 520px;
            border-radius: 1.5rem;
            overflow: hidden;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 40px -10px rgba(91, 139, 184, 0.3);
            transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
            cursor: pointer;
        }

        .org-vertical-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 60px -15px rgba(91, 139, 184, 0.4);
        }

        .org-card-backdrop {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(91, 139, 184, 0.1), rgba(110, 126, 42, 0.08));
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .org-vertical-card:hover .org-card-backdrop {
            opacity: 1;
        }

        .org-card-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            padding: 2rem 1.5rem;
        }

        .org-avatar-section {
            flex: 0 0 auto;
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .org-avatar-frame {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 1rem;
            padding: 4px;
            background: linear-gradient(135deg, #5B8BB8, #6E7E2A, #D4AB07);
            background-size: 200% 200%;
            animation: gradient-shift 6s ease infinite;
        }

        @keyframes gradient-shift {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .org-avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.75rem;
            border: 3px solid rgba(255, 255, 255, 0.8);
            transition: all 0.4s ease;
        }

        .org-vertical-card:hover .org-avatar-img {
            transform: scale(1.05);
            filter: brightness(1.1);
        }

        .org-avatar-overlay {
            position: absolute;
            inset: 4px;
            border-radius: 0.75rem;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .org-vertical-card:hover .org-avatar-overlay {
            opacity: 1;
        }

        .org-info-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
            gap: 1rem;
            padding-top: 0.5rem;
        }

        .org-main-content {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            flex: 1;
            justify-content: center;
        }

        .org-member-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0;
            letter-spacing: 0.025em;
            line-height: 1.3;
        }

        .org-position-tag {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            background: linear-gradient(135deg, #5B8BB8, #4A7A9A);
            color: white;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(91, 139, 184, 0.3);
            transition: all 0.3s ease;
            margin: 0 auto;
        }

        .org-vertical-card:hover .org-position-tag {
            background: linear-gradient(135deg, #4A7A9A, #6E7E2A);
            box-shadow: 0 6px 20px rgba(91, 139, 184, 0.4);
            transform: translateY(-2px);
        }

        .org-position-icon {
            font-size: 0.875rem;
        }

        .org-decorative-line {
            width: 60%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #5B8BB8, transparent);
            margin: 0.5rem auto;
            border-radius: 1px;
            opacity: 0.6;
            transition: all 0.4s ease;
        }

        .org-vertical-card:hover .org-decorative-line {
            width: 80%;
            opacity: 1;
        }

        .org-status-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .org-status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: linear-gradient(135deg, #10B981, #059669);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
            animation: status-pulse 2s ease-in-out infinite;
        }

        @keyframes status-pulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
            }

            50% {
                transform: scale(1.1);
                box-shadow: 0 0 0 6px rgba(16, 185, 129, 0.1);
            }
        }

        .org-status-text {
            font-size: 0.75rem;
            color: #6B7280;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .org-vertical-card {
                height: 480px;
            }

            .org-avatar-frame {
                width: 130px;
                height: 130px;
            }

            .org-member-name {
                font-size: 1.125rem;
            }
        }

        @media (max-width: 640px) {
            .org-vertical-card {
                height: 420px;
                max-width: 180px;
                margin: 0 auto;
            }

            .org-avatar-frame {
                width: 90px;
                height: 90px;
            }

            .org-card-content {
                padding: 1.25rem 0.75rem;
            }

            .org-member-name {
                font-size: 0.875rem;
                line-height: 1.2;
            }

            .org-position-tag {
                padding: 0.5rem 0.75rem;
                font-size: 0.7rem;
            }

            .org-status-text {
                font-size: 0.65rem;
            }

            .org-status-dot {
                width: 6px;
                height: 6px;
            }
        }

        /* Extra small mobile devices */
        @media (max-width: 480px) {
            .org-vertical-card {
                height: 380px;
                max-width: 160px;
            }

            .org-avatar-frame {
                width: 80px;
                height: 80px;
            }

            .org-card-content {
                padding: 1rem 0.5rem;
            }

            .org-member-name {
                font-size: 0.8rem;
            }

            .org-position-tag {
                padding: 0.4rem 0.6rem;
                font-size: 0.65rem;
            }
        }

        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            .org-vertical-card {
                transition: none;
            }

            .org-vertical-card:hover {
                transform: none;
            }

            .gradient-shift,
            .status-pulse {
                animation: none;
            }
        }

        .org-card-wrapper:before,
        .org-card-wrapper:after {
            content: '';
            position: absolute;
            inset: 0;
            background: conic-gradient(from 0deg, rgba(91, 139, 184, 0.35), rgba(212, 171, 7, 0.35), rgba(91, 139, 184, 0.35));
            opacity: 0;
            transition: opacity .6s ease;
            pointer-events: none;
        }

        .org-card-wrapper:hover:before {
            opacity: .35;
            animation: rotate-gradient 6s linear infinite;
        }

        @keyframes rotate-gradient {
            to {
                transform: rotate(360deg);
            }
        }

        .org-card-sheen {
            position: absolute;
            top: 0;
            left: -150%;
            width: 130%;
            height: 100%;
            background: linear-gradient(105deg, transparent 20%, rgba(255, 255, 255, 0.15) 45%, rgba(255, 255, 255, 0.05) 60%, transparent 80%);
            transform: skewX(-15deg);
            transition: .75s;
            opacity: 0;
        }

        .org-card-wrapper:hover .org-card-sheen {
            left: -10%;
            opacity: 1;
        }
    </style>

@endsection
