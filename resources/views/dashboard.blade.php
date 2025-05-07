@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <!-- Welcome Section -->
    <div class="p-5 mb-4 bg-primary text-white rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Selamat datang, {{ $username ?? 'Pengunjung' }}!</h1>
            <p class="col-md-8 fs-4">Mari bersama membangun ekonomi Desa Suci melalui UMKM berkualitas</p>
        </div>
    </div>

    <!-- Articles Section -->
    <h2 class="text-center border-bottom pb-2 mb-4">Artikel Desa Suci</h2>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($articles as $article)
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-info text-white rounded-circle p-3 me-3">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h3 class="card-title mb-0">{{ $article['title'] }}</h3>
                    </div>
                    <p class="card-text">{{ $article['content'] }}</p>
                </div>
                <div class="card-footer bg-white">
                    <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya →</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Quick Stats Section -->
    <div class="row mt-4 g-4">
        <div class="col-md-4">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <h3 class="card-title">15+</h3>
                    <p class="card-text">UMKM Terdaftar</p>
                    <i class="fas fa-store float-end fs-1 opacity-25"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <h3 class="card-title">8</h3>
                    <p class="card-text">Kategori Produk</p>
                    <i class="fas fa-tags float-end fs-1 opacity-25"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info h-100">
                <div class="card-body">
                    <h3 class="card-title">4.8/5</h3>
                    <p class="card-text">Rating Kepuasan</p>
                    <i class="fas fa-star float-end fs-1 opacity-25"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection