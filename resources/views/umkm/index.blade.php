@extends('layouts.app')

@section('title', 'Katalog UMKM Desa Kalibaru Manis')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-32 pb-16 bg-primary/5">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Katalog UMKM</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Temukan berbagai produk dan layanan UMKM terbaik dari Desa Kalibaru Manis
                </p>
            </div>
        </div>
    </section>

    <!-- Catalog Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            @livewire('umkm-catalog')

            <!-- Register UMKM Button -->
            <div class="text-center mt-12">
                <a href="{{ route('umkm.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 transition-all duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Daftarkan UMKM Anda
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @livewireScripts
@endpush
