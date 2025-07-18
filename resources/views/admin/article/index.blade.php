@extends('admin.layouts.admin')

@section('title', 'Kelola Artikel')
@section('page-title', 'Kelola Artikel')

@section('content')
    <div class="space-y-6">
        <!-- Header Actions -->
        <div class="flex justify-between">
            <a href="{{ route('admin.article.create') }}" class="btn-primary">
                <i class="mr-2 fas fa-plus"></i>
                Tambah Artikel
            </a>
        </div>

        <!-- Filters -->
        <div class="bg-white shadow-md rounded-2xl">
            <div class="p-6">
                <form action="{{ route('admin.article.index') }}" method="GET" class="flex flex-wrap gap-4">
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

                    <div class="flex-1 min-w-[200px]">
                        <label class="block mb-1 text-sm font-medium text-gray-700">Urutkan Berdasarkan</label>
                        <select name="sort"
                            class="w-full border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Tanggal
                            </option>
                            <option value="views" {{ request('sort') == 'views' ? 'selected' : '' }}>Views</option>
                        </select>
                    </div>

                    <div class="flex-1 min-w-[200px]">
                        <label class="block mb-1 text-sm font-medium text-gray-700">Arah</label>
                        <select name="direction"
                            class="w-full border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20">
                            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Terbaru</option>
                            <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Terlama</option>
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

        <!-- Articles Table -->
        <div class="bg-white shadow-md rounded-2xl">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-sm font-medium text-left text-gray-500 border-b">
                            <th class="p-6">Artikel</th>
                            <th class="p-6">Views</th>
                            <th class="p-6">Tanggal</th>
                            <th class="p-6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($articles as $article)
                            <tr class="text-sm text-gray-600">
                                <td class="p-6">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset($article->thumbnail) }}" alt="{{ $article->judul }}"
                                            class="object-cover w-16 h-16 rounded-lg">
                                        <div>
                                            <h3 class="font-medium text-gray-900">{{ $article->judul }}</h3>
                                            <p class="mt-1 text-gray-500">{{ Str::limit(strip_tags($article->isi), 100) }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <span class="flex items-center gap-1">
                                        <i class="text-gray-400 fas fa-eye"></i>
                                        {{ $article->views }}
                                    </span>
                                </td>
                                <td class="p-6">{{ $article->created_at->format('d M Y') }}</td>
                                <td class="p-6">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.article.show', $article) }}" class="btn-secondary btn-sm"
                                            title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.article.edit', $article) }}" class="btn-primary btn-sm"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" onclick="confirmDelete('{{ $article->slug }}')"
                                            class="btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-6 text-center text-gray-500">
                                    Tidak ada artikel
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="p-6 border-t">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(slug) {
            Swal.fire({
                title: 'Hapus Artikel?',
                text: 'Artikel yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    submitDelete(slug);
                }
            });
        }

        function submitDelete(slug) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `{{ url('admin/article') }}/${slug}`;

            const csrf = document.createElement('input');
            csrf.type = 'hidden';
            csrf.name = '_token';
            csrf.value = '{{ csrf_token() }}';
            form.appendChild(csrf);

            const method = document.createElement('input');
            method.type = 'hidden';
            method.name = '_method';
            method.value = 'DELETE';
            form.appendChild(method);

            document.body.appendChild(form);
            form.submit();
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
    </script>
@endpush
