@extends('layouts.app')

@section('title', 'Tambah UMKM - Desa Suci')

@section('content')
<div class="container py-4">
    <!-- Header dengan ikon dan judul -->
    <div class="text-center mb-5">
        <div class="jember-icon-circle bg-jember-light mb-3 mx-auto">
            <i class="fas fa-store-alt fa-2x text-jember"></i>
        </div>
        <h1 class="fw-bold text-jember-dark mb-2">Tambah UMKM Baru</h1>
        <p class="text-muted">Isi data UMKM Jember</p>
    </div>

    <!-- Card Form -->
    <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
        <div class="card-header bg-jember text-white py-3">
            <h4 class="mb-0"><i class="fas fa-pencil-alt me-2"></i> Form Pendaftaran UMKM</h4>
        </div>
        
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Informasi Dasar UMKM -->
                <div class="mb-4">
                    <h5 class="fw-bold text-jember-dark mb-3 border-bottom pb-2">
                        <i class="fas fa-info-circle me-2"></i> Informasi Dasar
                    </h5>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="Nama_UMKM" class="form-label fw-semibold">Nama UMKM <span class="text-danger">*</span></label>
                            <input type="text" class="form-control border-jember" id="Nama_UMKM" name="Nama_UMKM" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="Gambar" class="form-label fw-semibold">Logo/Gambar UMKM <span class="text-danger">*</span></label>
                            <input class="form-control border-jember" type="file" id="Gambar" name="Gambar" required accept="image/*">
                            <small class="text-muted">Format: JPG, PNG (Maks. 2MB)</small>
                        </div>
                        
                        <div class="col-12">
                            <label for="Deskripsi" class="form-label fw-semibold">Deskripsi UMKM <span class="text-danger">*</span></label>
                            <textarea class="form-control border-jember" id="Deskripsi" name="Deskripsi" rows="3" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Informasi Harga -->
                <div class="mb-4">
                    <h5 class="fw-bold text-jember-dark mb-3 border-bottom pb-2">
                        <i class="fas fa-tags me-2"></i> Kisaran Harga
                    </h5>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="Harga_Minimum" class="form-label fw-semibold">Harga Minimum (Rp) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-jember-light text-jember-dark">Rp</span>
                                <input type="number" class="form-control border-jember" id="Harga_Minimum" name="Harga_Minimum" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="Harga_Maximum" class="form-label fw-semibold">Harga Maksimum (Rp) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-jember-light text-jember-dark">Rp</span>
                                <input type="number" class="form-control border-jember" id="Harga_Maximum" name="Harga_Maximum" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Kontak -->
                <div class="mb-4">
                    <h5 class="fw-bold text-jember-dark mb-3 border-bottom pb-2">
                        <i class="fas fa-phone-alt me-2"></i> Kontak
                    </h5>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="Nomor_Telephone" class="form-label fw-semibold">Nomor WhatsApp <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-jember-light text-jember-dark"></span>
                                <input type="tel" class="form-control border-jember" id="Nomor_Telephone" name="Nomor_Telephone" required>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <label for="Alamat" class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea class="form-control border-jember" id="Alamat" name="Alamat" rows="2" required></textarea>
                            <small class="text-muted">Contoh: Jl. Mangga No.10, Desa Suci, Kec. Patrang, Jember</small>
                        </div>
                    </div>
                </div>

                <!-- Daftar Produk -->
                <div class="mb-4">
                    <h5 class="fw-bold text-jember-dark mb-3 border-bottom pb-2">
                        <i class="fas fa-box-open me-2"></i> Produk UMKM
                    </h5>
                    
                    <div id="produk-container">
                        <!-- Produk Pertama (Default) -->
                        <div class="produk-item card mb-3 border-jember-light">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-5">
                                        <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control border-jember" name="nama_produk[]" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label fw-semibold">Gambar Produk <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control border-jember" name="gambar_produk[]" required accept="image/*">
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-sm btn-outline-jember w-100 hapus-produk" disabled>
                                            <i class="fas fa-trash me-1"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-jember-outline mt-2" id="tambah-produk">
                        <i class="fas fa-plus-circle me-1"></i> Tambah Produk
                    </button>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-between pt-3">
                    <a href="{{ route('pengelolaan') }}" class="btn btn-outline-jember">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-jember px-4">
                        <i class="fas fa-save me-1"></i> Simpan UMKM
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Warna Tema Jember */
    .text-jember-dark {
        color: #1B5E20;
    }
    .text-jember {
        color: #2E7D32;
    }
    .bg-jember {
        background-color: #2E7D32;
    }
    .bg-jember-light {
        background-color: #E8F5E9;
    }
    .border-jember {
        border-color: #2E7D32 !important;
    }
    .border-jember-light {
        border-color: #C8E6C9 !important;
    }
    .btn-jember {
        background-color: #2E7D32;
        color: white;
    }
    .btn-jember:hover {
        background-color: #1B5E20;
        color: white;
    }
    .btn-jember-outline {
        border-color: #2E7D32;
        color: #2E7D32;
    }
    .btn-jember-outline:hover {
        background-color: #2E7D32;
        color: white;
    }
    .btn-outline-jember {
        border-color: #2E7D32;
        color: #2E7D32;
    }
    .btn-outline-jember:hover {
        background-color: #E8F5E9;
    }
    .jember-icon-circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid #C8E6C9;
    }
</style>

<script>
    document.getElementById('tambah-produk').addEventListener('click', function() {
        const container = document.getElementById('produk-container');
        const newItem = document.createElement('div');
        newItem.className = 'produk-item card mb-3 border-jember-light';
        newItem.innerHTML = `
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-5">
                        <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control border-jember" name="nama_produk[]" required>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold">Gambar Produk <span class="text-danger">*</span></label>
                        <input type="file" class="form-control border-jember" name="gambar_produk[]" required accept="image/*">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-sm btn-outline-danger w-100 hapus-produk">
                            <i class="fas fa-trash me-1"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(newItem);
        
        // Aktifkan tombol hapus pada produk pertama jika ada lebih dari 1 produk
        if (container.children.length > 1) {
            container.firstElementChild.querySelector('.hapus-produk').disabled = false;
            container.firstElementChild.querySelector('.hapus-produk').classList.replace('btn-outline-jember', 'btn-outline-danger');
        }
        
        // Tambahkan event listener untuk tombol hapus
        newItem.querySelector('.hapus-produk').addEventListener('click', function() {
            container.removeChild(newItem);
            
            // Nonaktifkan tombol hapus pada produk pertama jika hanya ada 1 produk
            if (container.children.length === 1) {
                container.firstElementChild.querySelector('.hapus-produk').disabled = true;
                container.firstElementChild.querySelector('.hapus-produk').classList.replace('btn-outline-danger', 'btn-outline-jember');
            }
        });
    });

    // Validasi nomor telepon
    document.getElementById('Nomor_Telephone').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
@endsection