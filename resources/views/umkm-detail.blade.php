@extends('layouts.app')

@section('title', 'Detail UMKM - ' . $umkm->Nama_UMKM)

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('profile') }}" class="text-decoration-none">Daftar UMKM</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $umkm->Nama_UMKM }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Kolom Gambar Utama -->
        <div class="col-lg-7">
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-body p-0 overflow-hidden rounded-3">
                    <img src="{{ asset('images/' . $umkm->Gambar) }}" 
                         class="img-fluid w-100" 
                         alt="{{ $umkm->Nama_UMKM }}" 
                         style="height: 400px; object-fit: cover;">
                </div>
            </div>
            
            <!-- Produk UMKM -->
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-header bg-white border-0">
                    <h3 class="fw-bold mb-0 text-jember">
                        <i class="fas fa-box-open me-2"></i> Produk Unggulan
                    </h3>
                </div>
                <div class="card-body">
                    @if($umkm->products->isEmpty())
                        <div class="text-center py-4">
                            <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada produk yang tersedia</p>
                        </div>
                    @else
                        <div class="row g-3">
                            @foreach($umkm->products as $product)
                                <div class="col-md-6">
                                    <div class="border p-3 rounded-3 h-100 hover-shadow">
                                        <div class="text-center mb-3">
                                            <img src="{{ asset('images/products/' . $product->gambar_produk) }}" 
                                                 class="img-fluid rounded-3" 
                                                 alt="{{ $product->nama_produk }}"
                                                 style="height: 150px; width: 100%; object-fit: cover;">
                                        </div>
                                        <h5 class="text-center fw-bold text-jember">{{ $product->nama_produk }}</h5>
                                        @if($product->harga)
                                            <p class="text-center text-success fw-bold mb-0">
                                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Kolom Informasi UMKM -->
        <div class="col-lg-5">
            <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
                <div class="card-body p-4">
                    <!-- Header dengan ikon khas Jember -->
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-jember-light p-3 rounded-circle me-3">
                            <i class="fas fa-store-alt fa-2x text-jember"></i>
                        </div>
                        <h1 class="fw-bold mb-0 text-jember">{{ $umkm->Nama_UMKM }}</h1>
                    </div>
                    
                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <p class="lead text-muted">{{ $umkm->Deskripsi }}</p>
                    </div>
                    
                    <hr class="my-4">
                    
                    <!-- Informasi Kontak -->
                    <div class="mb-4">
                        <h4 class="fw-bold text-jember mb-3">
                            <i class="fas fa-info-circle me-2"></i> Informasi UMKM
                        </h4>
                        
                        <div class="d-flex align-items-start mb-3">
                            <div class="me-3 text-jember">
                                <i class="fas fa-map-marker-alt fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Alamat</h6>
                                <p class="mb-0">{{ $umkm->Alamat }}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start mb-3">
                            <div class="me-3 text-jember">
                                <i class="fas fa-phone-alt fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Telepon</h6>
                                <p class="mb-0">{{ $umkm->Nomor_Telephone }}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start">
                            <div class="me-3 text-jember">
                                <i class="fas fa-tags fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Kisaran Harga</h6>
                                <p class="mb-0 text-success fw-bold">
                                    Rp {{ number_format($umkm->Harga_Minimum, 0, ',', '.') }} - 
                                    Rp {{ number_format($umkm->Harga_Maximum, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <!-- Tombol Aksi -->
                    <div class="d-grid gap-3">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $umkm->Nomor_Telephone) }}" 
                           class="btn btn-success btn-lg" target="_blank">
                            <i class="fab fa-whatsapp me-2"></i> Hubungi via WhatsApp
                        </a>
                        <a href="{{ route('profile') }}" class="btn btn-outline-jember btn-lg">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar UMKM
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Warna Tema Jember - Hijau dan Kuning */
    .text-jember {
        color: #2E7D32; /* Hijau */
    }
    .bg-jember-light {
        background-color: #E8F5E9; /* Hijau muda */
    }
    .btn-outline-jember {
        color: #2E7D32;
        border-color: #2E7D32;
    }
    .btn-outline-jember:hover {
        background-color: #2E7D32;
        color: white;
    }
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(46, 125, 50, 0.15);
        transition: all 0.3s ease;
    }
</style>
@endsection