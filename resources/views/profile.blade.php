@extends('layouts.app')

@section('title', 'Profile UMKM')

@section('content')
<div class="container mt-5">
    @foreach($selectedUmkm as $umkm)
    @csrf
    <div class="card shadow-lg p-4 mb-5 rounded">
        <div class="row">
            <div class="col-md-5">
                <img src="{{ asset('img/' . $umkm['image']) }}" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-7">
                <h2 class="fw-bold mb-2">{{ $umkm['name'] }}</h2>
                <p class="text-muted">Selamat datang, <span class="fw-semibold">{{ $username ?? 'Pengunjung' }}</span>!</p>

                <hr>

                <h4 class="mt-3"><i class="bi bi-info-circle-fill me-2"></i>Deskripsi UMKM</h4>
                <p class="text-justify">{{ $umkm['description'] }}</p>

                <h4 class="mt-4"><i class="bi bi-tag-fill me-2"></i>Range Harga Produk</h4>
                <p><span class="badge bg-success fs-6">{{ $umkm['price_range'] }}</span></p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
