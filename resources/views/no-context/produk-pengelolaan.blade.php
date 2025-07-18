@extends('layouts.app')

@section('title', 'Detail Produk UMKM')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-primary">Detail Produk – {{ $umkm->Nama_UMKM }}</h2>

    {{-- Informasi UMKM (dinamis) --}}
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title fw-bold">Profil UMKM</h5>
            <p><strong>Deskripsi:</strong> {{ $umkm->Deskripsi }}</p>
            <p><strong>Alamat:</strong> {{ $umkm->Alamat }}</p>
            <p><strong>Telepon:</strong> {{ $umkm->Nomor_Telephone }}</p>
        </div>
    </div>

    {{-- Daftar Produk (contoh statis) --}}
    <div class="row row-cols-1 row-cols-md-2 g-4">
        {{-- Silakan ganti dengan data produk dinamis nanti --}}
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/contoh_produk1.jpg') }}" class="card-img-top" alt="Arabika Premium">
                <div class="card-body">
                    <h5 class="card-title">Arabika Premium</h5>
                    <p class="card-text">Kopi arabika pilihan dengan rasa ringan dan aroma floral.</p>
                    <p class="text-muted">Rp 75.000</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/contoh_produk2.jpg') }}" class="card-img-top" alt="Robusta Sangrai">
                <div class="card-body">
                    <h5 class="card-title">Robusta Sangrai</h5>
                    <p class="card-text">Kopi robusta dengan rasa kuat dan pahit khas.</p>
                    <p class="text-muted">Rp 55.000</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tombol Kembali --}}
    <div class="mt-4">
        <a href="{{ route('pengelolaan') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Pengelolaan
        </a>
    </div>
</div>
@endsection
