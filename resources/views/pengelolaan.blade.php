@extends('layouts.app')

@section('title', 'Pengelolaan UMKM - Desa Suci')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="display-4 fw-bold text-primary">Pengelolaan UMKM</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-3">
        <a href="{{ route('tambah') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah UMKM
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-primary text-center">
            <tr>
                <th>Nama UMKM</th>
                <th>Deskripsi</th>
                <th>Harga Minimum</th>
                <th>Harga Maksimum</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($umkm as $item)
                <tr id="umkm-{{ $item->id }}">
                    <td>{{ $item->Nama_UMKM }}</td>
                    <td>{{ $item->Deskripsi }}</td>
                    <td>Rp {{ number_format($item->Harga_Minimum, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->Harga_Maximum, 0, ',', '.') }}</td>
                    <td class="text-center">
                        @if ($item->Gambar && file_exists(public_path('images/' . $item->Gambar)))
                            <img src="{{ asset('images/' . $item->Gambar) }}" alt="Gambar {{ $item->Nama_UMKM }}" width="100" class="img-thumbnail">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('edit', $item->id) }}" class="btn btn-warning btn-sm me-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm delete-button">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data UMKM.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- JavaScript Delete Confirmation --}}
<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (confirm('Yakin ingin menghapus data ini?')) {
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': this.querySelector('[name="_token"]').value,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ _method: 'DELETE' })
                })
                .then(response => {
                    if (response.ok) {
                        this.closest('tr').remove();
                    } else {
                        alert('Gagal menghapus data.');
                    }
                })
                .catch(() => {
                    alert('Terjadi kesalahan pada server.');
                });
            }
        });
    });
</script>
@endsection