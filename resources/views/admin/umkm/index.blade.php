@extends('admin.layouts.admin')

@section('title', 'Kelola UMKM')
@section('page-title', 'Kelola UMKM')

@section('content')
    <div class="space-y-6">
        <!-- Pending UMKM Section -->
        <div class="space-y-6">
            <h2 class="text-xl font-semibold text-gray-800">UMKM Menunggu Persetujuan</h2>

            <!-- Filter Pending UMKM -->
            <div class="bg-white shadow-md rounded-2xl">
                <div class="p-6">
                    <form action="{{ route('admin.umkm.index') }}" method="GET" class="flex flex-wrap gap-4">
                        <div class="flex-1 min-w-[200px]">
                            <label class="block mb-1 text-sm font-medium text-gray-700">Tanggal Mulai</label>
                            <input type="date" name="start_date" value="{{ request('start_date') }}"
                                class="w-full border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                        </div>

                        <div class="flex-1 min-w-[200px]">
                            <label class="block mb-1 text-sm font-medium text-gray-700">Tanggal Akhir</label>
                            <input type="date" name="end_date" value="{{ request('end_date') }}"
                                class="w-full border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                        </div>

                        <div class="self-end flex-none">
                            <button type="submit" class="btn-primary">
                                <i class="mr-2 fas fa-filter"></i>
                                Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Pending UMKM Table -->
            <div class="bg-white shadow-md rounded-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-sm font-medium text-left text-gray-500 border-b">
                                <th class="p-6">Nama Usaha</th>
                                <th class="p-6">Pemilik</th>
                                <th class="p-6">Kategori</th>
                                <th class="p-6">Tanggal Daftar</th>
                                <th class="p-6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse($pendingUMKM as $item)
                                <tr class="text-sm text-gray-600">
                                    <td class="p-6">
                                        <div class="flex items-center">
                                            <img src="{{ $item->foto_url }}" alt="{{ $item->nama_usaha }}"
                                                class="object-cover w-10 h-10 mr-3 rounded-lg">
                                            <span class="font-medium text-gray-800">{{ $item->nama_usaha }}</span>
                                        </div>
                                    </td>
                                    <td class="p-6">{{ $item->nama_pemilik }}</td>
                                    <td class="p-6">{{ $item->kategori }}</td>
                                    <td class="p-6">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="p-6">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('admin.umkm.show', $item) }}" class="btn-secondary btn-sm"
                                                title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button type="button" onclick="confirmApprove('{{ $item->id }}')"
                                                class="btn-success btn-sm" title="Setujui">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="button" onclick="confirmReject('{{ $item->id }}')"
                                                class="btn-danger btn-sm" title="Tolak">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-6 text-center text-gray-500">
                                        Tidak ada UMKM yang menunggu persetujuan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="p-6 border-t">
                    {{ $pendingUMKM->withQueryString()->links() }}
                </div>
            </div>
        </div>

        <!-- All UMKM Section -->
        <div class="space-y-6">
            <h2 class="text-xl font-semibold text-gray-800">Semua UMKM</h2>

            <!-- Filter All UMKM -->
            <div class="bg-white shadow-md rounded-2xl">
                <div class="p-6">
                    <form action="{{ route('admin.umkm.index') }}" method="GET" class="flex flex-wrap gap-4">
                        <div class="flex-1 min-w-[200px]">
                            <label class="block mb-1 text-sm font-medium text-gray-700">Status</label>
                            <select name="status"
                                class="w-full border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                                <option value="">Semua Status</option>
                                <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu
                                </option>
                                <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima
                                </option>
                                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak
                                </option>
                            </select>
                        </div>
                        <div class="self-end flex-none">
                            <button type="submit" class="btn-primary">
                                <i class="mr-2 fas fa-filter"></i>
                                Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- All UMKM Table -->
            <div class="bg-white shadow-md rounded-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-sm font-medium text-left text-gray-500 border-b">
                                <th class="p-6">Nama Usaha</th>
                                <th class="p-6">Pemilik</th>
                                <th class="p-6">Kategori</th>
                                <th class="p-6">Status</th>
                                <th class="p-6">Tanggal Daftar</th>
                                <th class="p-6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse($allUMKM as $item)
                                <tr class="text-sm text-gray-600">
                                    <td class="p-6">
                                        <div class="flex items-center">
                                            <img src="{{ $item->foto_url }}" alt="{{ $item->nama_usaha }}"
                                                class="object-cover w-10 h-10 mr-3 rounded-lg">
                                            <span class="font-medium text-gray-800">{{ $item->nama_usaha }}</span>
                                        </div>
                                    </td>
                                    <td class="p-6">{{ $item->nama_pemilik }}</td>
                                    <td class="p-6">{{ $item->kategori }}</td>
                                    <td class="p-6">
                                        @if ($item->status == 'diterima')
                                            <span class="font-semibold text-success">Diterima</span>
                                        @elseif($item->status == 'ditolak')
                                            <span class="font-semibold text-danger">Ditolak</span>
                                        @else
                                            <span class="font-semibold text-warning">Menunggu</span>
                                        @endif
                                    </td>
                                    <td class="p-6">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="p-6">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('admin.umkm.show', $item) }}" class="btn-secondary btn-sm"
                                                title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if ($item->status == 'menunggu')
                                                <button type="button" onclick="confirmApprove('{{ $item->id }}')"
                                                    class="btn-success btn-sm" title="Setujui">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button type="button" onclick="confirmReject('{{ $item->id }}')"
                                                    class="btn-danger btn-sm" title="Tolak">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-6 text-center text-gray-500">
                                        Tidak ada data UMKM
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="p-6 border-t">
                    {{ $allUMKM->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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

        function submitAction(action, extraData = {}) {
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
            methodInput.value = 'PUT';
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
    </script>
@endpush
