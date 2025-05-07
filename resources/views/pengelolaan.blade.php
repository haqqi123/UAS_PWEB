@extends('layouts.app')

@section('title', 'Daftar UMKM Desa Suci')

@section('content')
<div class="container">
    <h1 class="text-center mb-5 display-4 fw-bold text-primary">UMKM Desa Suci</h1>
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="border-bottom pb-2">Daftar UMKM Desa Suci</h2>
        <a href="{{ url('/umkm/tambah') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Tambah UMKM
</a>
    </div>

    <div class="row g-4">
        <!-- UMKM Card 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <img src="https://images.unsplash.com/photo-1580480055273-228ff5388ef8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Kerajinan Bambu" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h3 class="card-title text-primary">Kerajinan Bambu Suci</h3>
                    <p class="card-text">Menyediakan berbagai kerajinan tangan dari bambu seperti tempat tisu, vas bunga, dan furniture.</p>
                    <p class="fw-bold text-success">Rp 50.000 - Rp 500.000</p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <div>
                            <a href="{{ url('/umkm/ubah/1') }}" class="btn btn-warning text-white me-2">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- UMKM Card 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <img src="https://images.unsplash.com/photo-1587049352851-8d4e89133924?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Madu Asli" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h3 class="card-title text-primary">Madu Asli Desa Suci</h3>
                    <p class="card-text">Madu alami dari lebah yang dipelihara di hutan Desa Suci, tanpa bahan pengawet.</p>
                    <p class="fw-bold text-success">Rp 75.000 - Rp 200.000</p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <div>
                            <a href="{{ url('/umkm/ubah/2') }}" class="btn btn-warning text-white me-2">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- UMKM Card 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <img src="https://images.unsplash.com/photo-1516762689617-e1cffcef479d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Kain Tenun" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h3 class="card-title text-primary">Kain Tenun Suci</h3>
                    <p class="card-text">Kain tenun tradisional dengan motif khas Desa Suci, dibuat secara manual dengan teknik turun-temurun.</p>
                    <p class="fw-bold text-success">Rp 150.000 - Rp 1.000.000</p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <div>
                            <a href="{{ url('/umkm/ubah/3') }}" class="btn btn-warning text-white me-2">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection
