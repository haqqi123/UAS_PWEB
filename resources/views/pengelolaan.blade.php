@extends('layouts.app')

@section('title', 'Pengelolaan UMKM - Desa Suci')

@section('content')
<div class="container py-4">
    <!-- Header dengan background khas Jember -->
    <div class="jember-header bg-jember-gradient rounded-3 p-4 mb-4 shadow">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fw-bold text-white mb-1">
                    <i class="fas fa-store-alt"></i> Pengelolaan UMKM
                </h1>
                <p class="text-white-50 mb-0">Kelola UMKM Jember</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light btn-sm">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </button>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Card Utama -->
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden mb-4">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-jember-dark">
                    <i class="fas fa-list me-2"></i> Daftar UMKM
                </h5>
                <a href="{{ route('umkm.create') }}" class="btn btn-jember">
                    <i class="fas fa-plus me-1"></i> Tambah UMKM
                </a>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-jember">
                        <tr>
                            <th width="180" class="ps-4">logo</th>
                            <th width="180" class="ps-4">UMKM</th>
                            <th width="180" class="ps-4">Alamat</th>
                            <th>Deskripsi</th>
                            <th width="120">Kisaran Harga</th>
                            <th width="120">Kontak</th>
                            <th width="100">Produk</th>
                            <th width="100" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($umkm as $item)
                            <tr class="align-middle" id="umkm-{{ $item->id }}">
                                <!-- Kolom Nama & Gambar -->
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            @if ($item->Gambar && file_exists(public_path('images/' . $item->Gambar)))
                                                <img src="{{ asset('images/' . $item->Gambar) }}" 
                                                     alt="Gambar {{ $item->Nama_UMKM }}" 
                                                     width="50" 
                                                     height="50" 
                                                     class="rounded-circle object-fit-cover border border-jember-light">
                                            @else
                                                <div class="bg-jember-light rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                    <i class="fas fa-store text-jember"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <strong class="d-block">{{ $item->Nama_UMKM }}</strong>
                                </td>
                                <td>
                                    <small class="text-muted">{{ Str::limit($item->Alamat, 20) }}</small>
                                </td>
                                <!-- Kolom Deskripsi -->
                                <td>
                                    <small>{{ Str::limit($item->Deskripsi, 70) }}</small>
                                </td>
                                
                                <!-- Kolom Harga -->
                                <td>
                                    <div class="badge bg-jember-light text-jember-dark">
                                        Rp{{ number_format($item->Harga_Minimum, 0, ',', '.') }} - 
                                        Rp{{ number_format($item->Harga_Maximum, 0, ',', '.') }}
                                    </div>
                                </td>
                                
                                <!-- Kolom Kontak -->
                                <td>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->Nomor_Telephone) }}" 
                                       class="text-decoration-none" target="_blank">
                                        <i class="fab fa-whatsapp text-success me-1"></i>
                                        {{ $item->Nomor_Telephone }}
                                    </a>
                                </td>
                                
                                <!-- Kolom Produk -->
                                <td>
                                    <a href="{{ route('umkm.show', $item->id) }}" 
                                       class="btn btn-sm btn-outline-jember rounded-pill">
                                        <i class="fas fa-box-open me-1"></i> 
                                        {{ $item->products_count ?? 0 }}
                                    </a>
                                </td>
                                
                                <!-- Kolom Aksi -->
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('umkm.edit', $item->id) }}" 
                                           class="btn btn-sm btn-jember-light me-1" 
                                           title="Edit">
                                            <i class="fas fa-edit text-jember">Edit</i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-sm btn-jember-light delete-button" 
                                                title="Hapus"
                                                onclick="confirmDelete({{ $item->id }}, '{{ $item->Nama_UMKM }}')">
                                            <i class="fas fa-trash text-danger">Hapus</i>
                                        </button>
                                        <form id="delete-form-{{ $item->id }}" 
                                              action="{{ route('umkm.destroy', $item->id) }}" 
                                              method="POST" 
                                              style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-store-slash fa-2x mb-3"></i>
                                        <p class="mb-0">Belum ada data UMKM</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Warna Tema Jember */
    .bg-jember-gradient {
        background: linear-gradient(135deg, #2E7D32 0%, #FFC107 100%);
    }
    .text-jember-dark {
        color: #1B5E20;
    }
    .text-jember {
        color: #2E7D32;
    }
    .bg-jember-light {
        background-color: #E8F5E9;
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
    .btn-outline-jember {
        border-color: #2E7D32;
        color: #2E7D32;
    }
    .btn-outline-jember:hover {
        background-color: #2E7D32;
        color: white;
    }
    .btn-jember-light {
        background-color: #E8F5E9;
    }
    .btn-jember-light:hover {
        background-color: #C8E6C9;
    }
    .table-jember {
        background-color: #2E7D32;
        color: white;
    }
    .table-jember th {
        border-bottom: none;
        font-weight: 500;
    }
    .object-fit-cover {
        object-fit: cover;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Hapus UMKM?',
            html: `Anda akan menghapus <strong>${name}</strong> beserta semua produknya.<br><br>Apakah Anda yakin?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2E7D32',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading indicator
                Swal.fire({
                    title: 'Menghapus...',
                    html: 'Sedang memproses penghapusan data',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Submit the form
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }

    // Handle success message from server
    @if(session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonColor: '#2E7D32'
        });
    @endif
</script>
@endsection