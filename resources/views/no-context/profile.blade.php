@extends('layouts.app')

@section('title', 'Profil UMKM - Desa Suci')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-success">UMKM Jember</h2>
        <p class="lead text-muted">Dukung produk lokal warga Jember untuk kemajuan ekonomi bersama</p>
        <div class="border-bottom mx-auto" style="width: 100px; border-color: #28a745 !important; border-width: 3px;"></div>
    </div>

    @if($umkmList->isEmpty())
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i> Belum ada UMKM yang terdaftar saat ini.
        </div>
    @else
        <div class="row g-4">
            @foreach($umkmList as $umkm)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-lg overflow-hidden hover-shadow">
                        <div class="position-relative">
                            <img src="{{ asset('images/' . $umkm->Gambar) }}" 
                                 class="card-img-top" 
                                 alt="{{ $umkm->Nama_UMKM }}" 
                                 style="height: 220px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 bg-success text-white px-3 py-1 rounded-tr-lg">
                                <small class="fw-bold">{{ $umkm->products->count() }} Produk</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-success mb-3">{{ $umkm->Nama_UMKM }}</h5>
                            <p class="card-text text-muted mb-3">
                                <i class="fas fa-map-marker-alt text-success me-2"></i>
                                {{ Str::limit($umkm->Alamat, 50) }}
                            </p>
                            <p class="card-text mb-3">
                                <i class="fas fa-phone-alt text-success me-2"></i>
                                {{ $umkm->Nomor_Telephone }}
                            </p>
                            <div class="price-range mb-3">
                                <span class="badge bg-light text-success fw-normal">
                                    Harga: Rp {{ number_format($umkm->Harga_Minimum, 0, ',', '.') }} - 
                                    Rp {{ number_format($umkm->Harga_Maximum, 0, ',', '.') }}
                                </span>
                            </div>
                            <p class="card-text mb-4">{{ Str::limit($umkm->Deskripsi, 100) }}</p>
                            <div class="d-grid">
                                <a href="{{ route('umkm.show', $umkm->id) }}" 
                                   class="btn btn-outline-success btn-sm rounded-pill">
                                    <i class="fas fa-store me-2"></i> Kunjungi UMKM
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    .hover-shadow {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .card {
        border-radius: 10px !important;
        overflow: hidden;
    }
    .price-range {
        font-size: 0.9rem;
    }
</style>
@endsection