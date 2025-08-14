@extends('admin.layouts.admin')

@section('title', 'Detail UMKM')
@section('page-title', 'Detail UMKM')

@section('content')
    <div class="space-y-6">
        <!-- Back Button -->
        <div>
            <a href="{{ route('admin.umkm.index') }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-blue-900">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Daftar UMKM</span>
            </a>
        </div>

        <!-- Main Info -->
        <div class="bg-white shadow-md rounded-2xl">
            <div class="p-6">
                <div class="flex items-start justify-between">
                    <div class="space-y-1">
                        <h1 class="text-2xl font-bold text-gray-900">{{ $umkm->nama_usaha }}</h1>
                        <p class="text-sm text-gray-500">Terdaftar pada {{ $umkm->created_at->format('d M Y') }}</p>
                    </div>
                    <div>
                        @if ($umkm->status === 'menunggu')
                            <div class="flex items-center gap-2">
                                <button type="button" onclick="confirmApprove('{{ $umkm->id }}')" class="btn-success">
                                    <i class="mr-2 fas fa-check"></i>
                                    Setujui
                                </button>
                                <button type="button" onclick="confirmReject('{{ $umkm->id }}')" class="btn-danger">
                                    <i class="mr-2 fas fa-times"></i>
                                    Tolak
                                </button>
                            </div>
                        @else
                            <button type="button" onclick="confirmUpdateStatus('{{ $umkm->id }}')" class="btn-primary">
                                <i class="mr-2 fas fa-edit"></i>
                                Ubah Status
                            </button>
                            <button type="button" onclick="confirmDelete('{{ $umkm->id }}')" class="btn-danger">
                                <i class="mr-2 fas fa-trash"></i>
                                Hapus
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- UMKM Details -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Left Column - Images -->
            <div class="space-y-6 lg:col-span-1">
                <div class="overflow-hidden bg-white shadow-md rounded-2xl">
                    <img src="{{ $umkm->foto_url }}" alt="{{ $umkm->nama_usaha }}"
                        class="object-cover w-full h-64 cursor-pointer"
                        onclick="previewImage('{{ $umkm->foto_url }}', '{{ $umkm->nama_usaha }}')">
                </div>
            </div>

            <!-- Right Column - Details -->
            <div class="space-y-6 lg:col-span-2">
                <!-- Basic Info -->
                <div class="bg-white shadow-md rounded-2xl">
                    <div class="p-6">
                        <h2 class="mb-4 text-lg font-semibold text-gray-800">Informasi Dasar</h2>
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Nama Pemilik</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $umkm->nama_pemilik }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $umkm->kategori }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                <dd class="mt-1">
                                    @if ($umkm->status === 'diterima')
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-success/10 text-success">
                                            Diterima
                                        </span>
                                    @elseif($umkm->status === 'ditolak')
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-danger/10 text-danger">
                                            Ditolak
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-warning/10 text-warning">
                                            Menunggu
                                        </span>
                                    @endif
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Catatan Status</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $umkm->catatan_status ?: '-' }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="bg-white shadow-md rounded-2xl">
                    <div class="p-6">
                        <h2 class="mb-4 text-lg font-semibold text-gray-800">Kontak</h2>
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">WhatsApp</dt>
                                <dd class="mt-1">
                                    <a href="https://wa.me/{{ $umkm->whatsapp }}" target="_blank"
                                        class="inline-flex items-center text-sm text-primary hover:text-primary/80">
                                        <i class="mr-2 fab fa-whatsapp"></i>
                                        {{ $umkm->whatsapp }}
                                    </a>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1">
                                    <a href="mailto:{{ $umkm->email }}"
                                        class="inline-flex items-center text-sm text-primary hover:text-primary/80">
                                        <i class="mr-2 far fa-envelope"></i>
                                        {{ $umkm->email }}
                                    </a>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fungsi untuk konfirmasi persetujuan
        function confirmApprove(id) {
            Swal.fire({
                title: 'Setujui UMKM?',
                text: 'Apakah Anda yakin ingin menyetujui UMKM ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Setujui',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    submitAction(`{{ url('admin/umkm') }}/${id}/approve`);
                }
            });
        }

        // Fungsi untuk konfirmasi penolakan
        function confirmReject(id) {
            Swal.fire({
                title: 'Tolak UMKM?',
                input: 'textarea',
                inputLabel: 'Alasan Penolakan',
                inputPlaceholder: 'Tulis catatan atau alasan penolakan...',
                inputAttributes: {
                    'aria-label': 'Catatan status'
                },
                showCancelButton: true,
                confirmButtonText: 'Tolak UMKM',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                inputValidator: (value) => {
                    if (!value) {
                        return 'Catatan penolakan wajib diisi!'
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    submitAction(`{{ url('admin/umkm') }}/${id}/reject`, {
                        catatan_status: result.value
                    });
                }
            });
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus UMKM?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    submitAction(`{{ url('admin/umkm') }}/${id}`, {}, 'DELETE');
                }
            });
        }

        function submitAction(action, extraData = {}, method = 'PUT') {
            // Show loading state
            Swal.fire({
                title: 'Memproses...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = action;

            // CSRF Token
            const csrf = document.createElement('input');
            csrf.type = 'hidden';
            csrf.name = '_token';
            csrf.value = '{{ csrf_token() }}';
            form.appendChild(csrf);

            // Method spoofing
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = method;
            form.appendChild(methodInput);

            // Extra data
            for (const key in extraData) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = extraData[key];
                form.appendChild(input);
            }

            document.body.appendChild(form);
            form.submit();
        }

        function confirmUpdateStatus(id) {
            const currentStatus = '{{ $umkm->status }}';

            Swal.fire({
                title: 'Ubah Status UMKM',
                input: 'select',
                inputOptions: {
                    'menunggu': 'Menunggu',
                    'diterima': 'Diterima',
                    'ditolak': 'Ditolak'
                },
                inputValue: currentStatus,
                inputLabel: 'Status Baru',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                inputValidator: (value) => {
                    if (!value) {
                        return 'Status harus dipilih!';
                    }
                    // Cek jika status yang dipilih sama dengan status saat ini
                    if (value === currentStatus) {
                        return `UMKM sudah berstatus ${value}`;
                    }
                },
                preConfirm: (status) => {
                    if (status === 'ditolak') {
                        return Swal.fire({
                            title: 'Alasan Penolakan',
                            input: 'textarea',
                            inputLabel: 'Catatan',
                            inputPlaceholder: 'Tulis alasan penolakan...',
                            inputAttributes: {
                                'aria-label': 'Catatan status'
                            },
                            showCancelButton: true,
                            inputValidator: (value) => {
                                if (!value) {
                                    return 'Catatan penolakan wajib diisi!';
                                }
                            }
                        }).then(result => {
                            if (result.isConfirmed) {
                                return {
                                    status: status,
                                    catatan_status: result.value
                                };
                            }
                        });
                    }
                    return {
                        status: status,
                        catatan_status: status === 'diterima' ? 'UMKM telah disetujui' :
                            'UMKM dikembalikan ke status menunggu'
                    };
                }
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    submitAction(`{{ url('admin/umkm') }}/${id}/update-status`, result.value);
                }
            });
        }

        function previewImage(url, title) {
            Swal.fire({
                title: title,
                imageUrl: url,
                imageAlt: title,
                width: '80%',
                padding: '3em',
                showConfirmButton: false,
                showCloseButton: true
            })
        }
    </script>
@endpush
