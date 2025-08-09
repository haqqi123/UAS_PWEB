@extends('layouts.app')

@section('title', 'Katalog UMKM Desa Kalibaru Manis')

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-32 pb-16 bg-primary/5">
        <div class="container px-4 mx-auto">
            <div class="text-center">
                <h1 class="mb-4 text-4xl font-bold text-primary">Katalog UMKM</h1>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Temukan berbagai produk dan layanan UMKM terbaik dari Desa Kalibaru Manis
                </p>
            </div>
        </div>
    </section>

    <!-- Catalog Section -->
    <section class="py-12">
        <div class="container px-4 mx-auto">
            @livewire('umkm-catalog')

            <!-- Register UMKM Button -->
            <div class="mt-12 text-center">
                <a href="{{ route('umkm.create') }}"
                    class="inline-flex items-center px-6 py-3 text-white transition-all duration-300 transform rounded-lg bg-primary hover:bg-primary/90 hover:-translate-y-1">
                    <i class="mr-2 fas fa-plus-circle"></i>
                    Daftarkan UMKM Anda
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @livewireScripts
@endpush
