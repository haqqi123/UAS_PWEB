@extends('admin.layouts.admin')

@section('title', 'Detail Artikel')
@section('page-title', 'Detail Artikel')

@section('content')
    <div class="space-y-6">
        <!-- Back Button -->
        <div>
            <a href="{{ route('admin.article.index') }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Daftar Artikel</span>
            </a>
        </div>

        <!-- Article Header -->
        <div class="bg-white shadow-md rounded-2xl">
            <div class="p-6">
                <div class="flex items-start justify-between">
                    <div class="space-y-1">
                        <h1 class="text-2xl font-bold text-gray-900">{{ $article->judul }}</h1>
                        <div class="flex items-center gap-4 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-user"></i>
                                {{ $article->penulis }}
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="fas fa-eye"></i>
                                {{ $article->views }} views
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="fas fa-calendar"></i>
                                {{ $article->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.article.edit', $article) }}" class="btn-primary">
                            <i class="mr-2 fas fa-edit"></i>
                            Edit Artikel
                        </a>
                        <button type="button" onclick="confirmDelete('{{ $article->slug }}')" class="btn-danger">
                            <i class="mr-2 fas fa-trash"></i>
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Article Content -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Thumbnail -->
            <div class="lg:col-span-1">
                <div class="overflow-hidden bg-white shadow-md rounded-2xl">
                    <img src="{{ asset($article->thumbnail) }}" alt="{{ $article->judul }}"
                        class="object-cover w-full h-auto cursor-pointer"
                        onclick="previewImage('{{ asset($article->thumbnail) }}', '{{ $article->judul }}')">
                </div>
            </div>

            <!-- Content -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow-md rounded-2xl">
                    <div class="p-6 prose max-w-none">
                        {!! $article->isi !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://unpkg.com/@tailwindcss/typography@0.4.x/dist/typography.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function previewImage(url, title) {
            Swal.fire({
                title: title,
                imageUrl: url,
                imageAlt: title,
                width: '80%',
                padding: '3em',
                showConfirmButton: false,
                showCloseButton: true
            });
        }

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
    </script>
@endpush
