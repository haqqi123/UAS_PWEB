@extends('layouts.app')

@section('title', 'Ubah Data UMKM - Desa Suci')

@section('content')
<div class="container">
    <h1 class="text-center mb-5 display-4 fw-bold text-primary">Ubah Data UMKM</h1>
    
    <div class="card shadow-lg">
        <div class="card-body p-5">
            <form action="{{ route('umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="Nama_UMKM" class="form-label fw-bold">Nama UMKM</label>
                        <input type="text" class="form-control" id="Nama_UMKM" name="Nama_UMKM" value="{{ $umkm->Nama_UMKM }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="Deskripsi" class="form-label fw-bold">Deskripsi UMKM</label>
                    <textarea class="form-control" id="Deskripsi" name="Deskripsi" rows="4" required>{{ $umkm->Deskripsi }}</textarea>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="Harga_Minimum" class="form-label fw-bold">Harga Minimum (Rp)</label>
                        <input type="number" class="form-control" id="Harga_Minimum" name="Harga_Minimum" value="{{ $umkm->Harga_Minimum }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="Harga_Maximum" class="form-label fw-bold">Harga Maksimum (Rp)</label>
                        <input type="number" class="form-control" id="Harga_Maximum" name="Harga_Maximum" value="{{ $umkm->Harga_Maximum }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Gambar Saat Ini</label>
                    <div class="mb-3">
                        <img src="{{ asset('images/'.$umkm->Gambar) }}" class="img-thumbnail" style="height: 150px;">
                    </div>
                    <label for="Gambar" class="form-label fw-bold">Ubah Gambar Produk (Opsional)</label>
                    <input class="form-control" type="file" id="Gambar" name="Gambar" accept="image/*">
                    <div class="form-text">Format: JPG, PNG, atau GIF (Maks. 2MB)</div>
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('umkm.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-arrow-left me-2"></i>Batal
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection