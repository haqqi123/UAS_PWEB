@extends('layouts.app')

@section('title', 'Dashboard Desa Suci')

@section('content')
<div class="container-fluid px-4">
    <!-- Welcome Section with Village Identity -->
    <div class="welcome-banner bg-gradient-primary rounded-3 mb-4 p-4 p-md-5">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold text-white">Selamat Datang di Jember</h1>
                <p class="lead text-white mb-4">Membangun ekonomi melalui UMKM berkualitas</p>
                <div class="d-flex align-items-center">
                    <span class="text-white">Halo, Sahabat Jember </span>
                </div>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <img src="{{ asset('images/download__1_-removebg-preview.png') }}" alt="Ilustrasi Desa" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- UMKM Stats with Progress -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3 class="fw-semibold mb-3">Perkembangan UMKM Jember</h3>
                            <p class="text-muted">Jumlah UMKM yang terdaftar dalam sistem kami</p>
                            <div class="progress mb-3" style="height: 10px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($jumlahUMKM/150)*100 }}%" 
                                    aria-valuenow="{{ $jumlahUMKM }}" aria-valuemin="0" aria-valuemax="150"></div>
                            </div>
                            <small class="text-muted">Target 150 UMKM di tahun 2023</small>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="display-3 fw-bold text-primary">{{ $jumlahUMKM }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Village History Section -->
    <div class="row">
        <div class="col-12 mb-4">
            <h2 class="fw-semibold mb-0">Sejarah Jember</h2>
            <hr class="mt-2 mb-4">
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('images/download (1).png') }}" class="img-fluid h-100" alt="Sejarah Desa" style="object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h3 class="fw-semibold mb-3">Asal Usul Jember</h3>
                            <p class="text-muted mb-4">Ditulis oleh: Tim Budaya | Terakhir diperbarui: 12 Mei 2023</p>
                            <div class="history-content">
                                <p>Desa Suci didirikan pada tahun 1850 oleh sekelompok pendatang dari daerah Mataram yang mencari tempat baru untuk bermukim. Nama "Suci" diambil dari mata air jernih yang ditemukan di tengah hutan yang sekarang menjadi pusat desa.</p>
                                <p>Pada awalnya, Desa Suci hanya terdiri dari 15 kepala keluarga yang hidup dari bertani dan membuat kerajinan dari bambu. Mata air tersebut dianggap keramat dan menjadi tempat ritual masyarakat hingga kini.</p>
                                <p>Pada tahun 1930, Desa Suci mulai berkembang pesat setelah dibangunnya jalan penghubung ke kota kecamatan. Tradisi kerajinan bambu terus dilestarikan dan menjadi ciri khas desa hingga sekarang.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .welcome-banner {
        background: linear-gradient(135deg, #2E7D32 0%, #FFC107 100%);
        position: relative;
        overflow: hidden;
    }
    
    .welcome-banner::after {
        content: "";
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }
    
    .welcome-banner::before {
        content: "";
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }
    
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 10px;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .history-content p {
        margin-bottom: 1rem;
        line-height: 1.7;
    }
</style>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection