@extends('layouts.app')

@section('title', $umkm->nama_usaha . ' - Detail UMKM')

@section('content')
    <!-- Main Content -->
    <div class="pt-32 pb-12">
        <div class="container mx-auto px-4">
            <!-- Back Button -->
            <a href="{{ route('umkm.index') }}" class="inline-flex items-center text-gray-600 hover:text-primary mb-6">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Katalog
            </a>

            <!-- UMKM Detail -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Image Section -->
                    <div class="relative h-[400px] lg:h-full">
                        <img src="{{ $umkm->foto_url }}" alt="{{ $umkm->nama_usaha }}" class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="px-4 py-2 rounded-full text-sm font-medium bg-white shadow-md text-primary">
                                {{ $umkm->kategori }}
                            </span>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="p-8">
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $umkm->nama_usaha }}</h1>

                        <!-- Owner Info -->
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-primary text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-gray-800">{{ $umkm->nama_pemilik }}</h3>
                                <p class="text-sm text-gray-600">Pemilik UMKM</p>
                            </div>
                        </div>

                        <!-- Business Info -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-store w-6 text-primary"></i>
                                <span class="ml-3">{{ $umkm->jenis_produk }}</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-tag w-6 text-primary"></i>
                                <span class="ml-3">{{ $umkm->formatted_harga_minimum }} -
                                    {{ $umkm->formatted_harga_maximum }}</span>
                            </div>
                            <div class="flex items-start text-gray-600">
                                <i class="fas fa-map-marker-alt w-6 text-primary mt-1"></i>
                                <span class="ml-3">{{ $umkm->alamat }}</span>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Deskripsi Usaha</h3>
                            <p class="text-gray-600">{{ $umkm->deskripsi }}</p>
                        </div>

                        <!-- Contact Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ $umkm->whatsapp_url }}" target="_blank"
                                class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                <i class="fab fa-whatsapp mr-2"></i>
                                Hubungi via WhatsApp
                            </a>
                            @if ($umkm->email)
                                <a href="mailto:{{ $umkm->email }}"
                                    class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                                    <i class="fas fa-envelope mr-2"></i>
                                    Kirim Email
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related UMKM -->
            @if ($related->count() > 0)
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">UMKM Terkait</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($related as $item)
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden group transform transition-all duration-300 hover:-translate-y-2">
                                <!-- UMKM Image -->
                                <div class="relative h-48 overflow-hidden">
                                    <img src="{{ $item->foto_url }}" alt="{{ $item->nama_usaha }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                </div>

                                <!-- UMKM Content -->
                                <div class="p-6">
                                    <div class="mb-3">
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-primary/10 text-primary">
                                            {{ $item->kategori }}
                                        </span>
                                    </div>

                                    <h3
                                        class="text-xl font-bold text-gray-800 mb-2 group-hover:text-primary transition-colors">
                                        {{ $item->nama_usaha }}
                                    </h3>

                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                        {{ $item->deskripsi }}
                                    </p>

                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                        <a href="{{ $item->whatsapp_url }}" target="_blank"
                                            class="inline-flex items-center text-green-600 hover:text-green-700">
                                            <i class="fab fa-whatsapp mr-2"></i>
                                            Hubungi
                                        </a>
                                        <a href="{{ route('umkm.show', $item->id) }}"
                                            class="text-primary hover:text-primary/80 font-medium text-sm">
                                            Detail
                                            <i
                                                class="fas fa-arrow-right ml-1 transition-transform group-hover:translate-x-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
