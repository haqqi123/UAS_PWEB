@extends('layouts.app')

@section('title', 'Tambah UMKM Baru - Desa Suci')

@section('content')
<div class="container">
    <h1 class="text-center mb-5 display-4 fw-bold text-primary">Tambah UMKM Baru</h1>
    
    <div class="card shadow-lg">
        <div class="card-body p-5">
            <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="Nama_UMKM" class="form-label fw-bold">Nama UMKM</label>
                        <input type="text" class="form-control" id="Nama_UMKM" name="Nama_UMKM" placeholder="Contoh: Kerajinan Bambu Suci" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="Deskripsi" class="form-label fw-bold">Deskripsi UMKM</label>
                    <textarea class="form-control" id="Deskripsi" name="Deskripsi" rows="4" placeholder="Deskripsikan produk/jasa yang ditawarkan" required></textarea>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="Harga_Minimum" class="form-label fw-bold">Harga Minimum (Rp)</label>
                        <input type="number" class="form-control" id="Harga_Minimum" name="Harga_Minimum" placeholder="Contoh: 50000" required>
                    </div>
                    <div class="col-md-6">
                        <label for="Harga_Maximum" class="form-label fw-bold">Harga Maksimum (Rp)</label>
                        <input type="number" class="form-control" id="Harga_Maximum" name="Harga_Maximum" placeholder="Contoh: 500000" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="Gambar" class="form-label fw-bold">Upload Gambar Produk</label>
                    <input class="form-control" type="file" id="Gambar" name="Gambar" accept="image/*" required>
                    <div class="form-text">Format: JPG, PNG, atau GIF (Maks. 2MB)</div>
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('umkm.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection