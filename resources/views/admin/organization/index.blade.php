@extends('admin.layouts.admin')

@section('title', 'Kelola Organisasi')
@section('page-title', 'Kelola Organisasi')

@section('content')
    <div class="space-y-6">
        <!-- Header Actions -->
        <div class="flex justify-end">
            <a href="{{ route('admin.organization.create') }}" class="btn-primary">
                <i class="mr-2 fas fa-plus"></i>
                Tambah Anggota
            </a>
        </div>

        <!-- Organizations Grid -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($organizations as $organization)
                <div class="overflow-hidden bg-white shadow-md rounded-2xl">
                    <!-- Image -->
                    <div class="relative aspect-[4/3]">
                        @if ($organization->foto)
                            <img src="{{ asset($organization->foto) }}" alt="{{ $organization->nama }}"
                                class="object-cover w-full h-full">
                        @else
                            <div class="flex items-center justify-center w-full h-full bg-gray-100">
                                <i class="text-4xl text-gray-400 fas fa-user"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="mb-1 text-xl font-semibold text-gray-800">{{ $organization->nama }}</h3>
                        <p class="mb-4 text-gray-600">{{ $organization->jabatan }}</p>

                        <!-- Actions -->
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.organization.edit', $organization) }}" class="btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" onclick="confirmDelete('{{ $organization->id }}')"
                                class="btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="p-8 text-center bg-white rounded-2xl">
                        <div class="inline-flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-primary/10">
                            <i class="text-2xl fas fa-users text-primary"></i>
                        </div>
                        <h3 class="mb-2 text-lg font-semibold text-gray-800">Belum Ada Data</h3>
                        <p class="mb-4 text-gray-600">Belum ada anggota organisasi yang ditambahkan.</p>
                        <a href="{{ route('admin.organization.create') }}" class="btn-primary">
                            <i class="mr-2 fas fa-plus"></i>
                            Tambah Anggota
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Delete Form -->
    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Anggota?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('delete-form');
                    form.action = `{{ url('admin/organization') }}/${id}`;
                    form.submit();
                }
            });
        }

        // Show success message if exists
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 1500,
                showConfirmButton: false
            });
        @endif

        // Show error message if exists
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                timer: 1500,
                showConfirmButton: false
            });
        @endif
    </script>
@endpush
