@extends('layouts.app')

@section('title', 'Ubah Data UMKM - Desa Suci')

@section('content')
<div class="container py-4">
    <!-- Header dengan ikon dan judul -->
    <div class="text-center mb-5">
        <div class="jember-icon-circle bg-jember-light mb-3 mx-auto">
            <i class="fas fa-store-alt fa-2x text-jember"></i>
        </div>
        <h1 class="fw-bold text-jember-dark mb-2">Edit UMKM</h1>
        <p class="text-muted">Perbarui data UMKM Jember</p>
    </div>

    <!-- Notifikasi Error -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm mb-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-circle me-2"></i>
                <div>
                    <h5 class="mb-1">Terjadi Kesalahan!</h5>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <!-- Card Form -->
    <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
        <div class="card-header bg-jember text-white py-3">
            <h4 class="mb-0"><i class="fas fa-edit me-2"></i> Form Edit UMKM</h4>
        </div>
        
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Informasi Dasar UMKM -->
                <div class="mb-4">
                    <h5 class="fw-bold text-jember-dark mb-3 border-bottom pb-2">
                        <i class="fas fa-info-circle me-2"></i> Informasi Dasar
                    </h5>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="Nama_UMKM" class="form-label fw-semibold">Nama UMKM <span class="text-danger">*</span></label>
                            <input type="text" class="form-control border-jember" id="Nama_UMKM" name="Nama_UMKM" 
                                   value="{{ old('Nama_UMKM', $umkm->Nama_UMKM) }}" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Gambar Saat Ini</label>
                            <div class="d-flex align-items-center">
                                @if ($umkm->Gambar && file_exists(public_path('images/' . $umkm->Gambar)))
                                    <img src="{{ asset('images/'.$umkm->Gambar) }}" 
                                         class="img-thumbnail rounded-circle me-3 border-jember-light" 
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-jember-light rounded-circle d-flex align-items-center justify-content-center me-3" 
                                         style="width: 60px; height: 60px;">
                                        <i class="fas fa-store text-jember"></i>
                                    </div>
                                @endif
                                <div>
                                    <label for="Gambar" class="form-label fw-semibold">Ubah Gambar</label>
                                    <input class="form-control border-jember" type="file" id="Gambar" name="Gambar" accept="image/*">
                                    <small class="text-muted">Format: JPG, PNG (Maks. 2MB)</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <label for="Deskripsi" class="form-label fw-semibold">Deskripsi UMKM <span class="text-danger">*</span></label>
                            <textarea class="form-control border-jember" id="Deskripsi" name="Deskripsi" rows="3" required>{{ old('Deskripsi', $umkm->Deskripsi) }}</textarea>
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
                                <input type="number" class="form-control border-jember" id="Harga_Minimum" name="Harga_Minimum" 
                                       value="{{ old('Harga_Minimum', $umkm->Harga_Minimum) }}" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="Harga_Maximum" class="form-label fw-semibold">Harga Maksimum (Rp) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-jember-light text-jember-dark">Rp</span>
                                <input type="number" class="form-control border-jember" id="Harga_Maximum" name="Harga_Maximum" 
                                       value="{{ old('Harga_Maximum', $umkm->Harga_Maximum) }}" required>
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
                                <input type="tel" class="form-control border-jember" id="Nomor_Telephone" name="Nomor_Telephone" 
                                       value="{{ old('Nomor_Telephone', $umkm->Nomor_Telephone) }}" required>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <label for="Alamat" class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea class="form-control border-jember" id="Alamat" name="Alamat" rows="2" required>{{ old('Alamat', $umkm->Alamat) }}</textarea>
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
                        @foreach($umkm->products as $product)
                            <div class="produk-item card mb-3 border-jember-light">
                                <div class="card-body">
                                    <input type="hidden" name="existing_products[{{ $loop->index }}][id]" value="{{ $product->id }}">
                                    <div class="row g-3">
                                        <div class="col-md-5">
                                            <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control border-jember" 
                                                   name="existing_products[{{ $loop->index }}][nama_produk]" 
                                                   value="{{ old('existing_products.'.$loop->index.'.nama_produk', $product->nama_produk) }}" required>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label fw-semibold">Gambar Produk</label>
                                            <div class="d-flex align-items-center">
                                                @if(file_exists(public_path('images/products/' . $product->gambar_produk)))
                                                    <img src="{{ asset('images/products/' . $product->gambar_produk) }}" 
                                                         class="img-thumbnail rounded-circle me-2 border-jember-light" 
                                                         style="width: 50px; height: 50px; object-fit: cover;">
                                                @endif
                                                <input type="file" class="form-control border-jember" 
                                                       name="existing_products[{{ $loop->index }}][gambar_produk]">
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-end">
                                            <button type="button" class="btn btn-sm btn-outline-danger w-100 hapus-produk"
                                                    onclick="confirmDeleteProduct(this)">
                                                <i class="fas fa-trash me-1"></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div id="new-produk-container"></div>
                    
                    <button type="button" class="btn btn-jember-outline mt-2" id="tambah-produk">
                        <i class="fas fa-plus-circle me-1"></i> Tambah Produk Baru
                    </button>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-between pt-3">
                    <a href="{{ route('pengelolaan') }}" class="btn btn-outline-jember">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-jember px-4">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
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
    // Fungsi untuk menambahkan produk baru
    document.getElementById('tambah-produk').addEventListener('click', function() {
        const container = document.getElementById('new-produk-container');
        const newIndex = document.querySelectorAll('#produk-container .produk-item').length + 
                         document.querySelectorAll('#new-produk-container .produk-item').length;
        
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
        
        // Tambahkan event listener untuk tombol hapus
        newItem.querySelector('.hapus-produk').addEventListener('click', function() {
            container.removeChild(newItem);
        });
    });

    // Fungsi konfirmasi hapus produk
    function confirmDeleteProduct(button) {
        Swal.fire({
            title: 'Hapus Produk?',
            text: "Produk yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2E7D32',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('.produk-item').remove();
            }
        });
    }

    // Validasi nomor telepon
    document.getElementById('Nomor_Telephone').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
@endsection