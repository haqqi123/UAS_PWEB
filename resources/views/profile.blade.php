@extends('layouts.app')

@section('title', 'Profil UMKM - Desa Suci')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-primary">Profil UMKM Terdaftar</h2>

    @if($umkmList->isEmpty())
        <p class="text-muted">Tidak ada data UMKM yang tersedia.</p>
    @else
        <div class="row">
            @foreach($umkmList as $umkm)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/' . $umkm->Gambar) }}" class="card-img-top" alt="{{ $umkm->Nama_UMKM }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $umkm->Nama_UMKM }}</h5>
                            <p class="card-text">{{ $umkm->Deskripsi }}</p>
                            <p class="card-text text-muted">
                                Harga: Rp {{ number_format($umkm->Harga_Minimum, 0, ',', '.') }}
                                - Rp {{ number_format($umkm->Harga_Maximum, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
