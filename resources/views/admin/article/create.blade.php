@extends('admin.layouts.admin')

@section('title', 'Tambah Artikel')
@section('page-title', 'Tambah Artikel')

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

        <form id="article-form" action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <div class="bg-white shadow-md rounded-2xl">
                <div class="p-6 space-y-6">
                    <!-- Judul -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Judul Artikel</label>
                        <input type="text" name="judul" value="{{ old('judul') }}" required
                            class="w-full border border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 @error('judul') border-red-500 @enderror"
                            maxlength="255">
                        @error('judul')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Thumbnail -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Thumbnail</label>
                        <div class="flex items-start gap-4">
                            <img id="thumbnail-preview" src="{{ asset('images/placeholder.png') }}"
                                class="object-cover w-48 h-48 border border-gray-300 rounded-lg">
                            <!-- Ubah ukuran dan tambah border -->
                            <div class="flex-1">
                                <input type="file" name="thumbnail" id="thumbnail" accept="image/*" required
                                    class="w-full border border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20 @error('thumbnail') border-red-500 @enderror"
                                    onchange="previewImage()">
                                <p class="mt-1 text-sm text-gray-500">
                                    Format: JPG, JPEG, PNG. Maksimal 2MB.
                                </p>
                                @error('thumbnail')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Isi -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Isi Artikel</label>
                        <textarea name="isi" id="editor" style="display: none;">{{ old('isi') }}</textarea>
                        @error('isi')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn-primary">
                    <i class="mr-2 fas fa-save"></i>
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Initialize CKEditor
        let editor;
        ClassicEditor
            .create(document.querySelector('#editor'), {
                // CKEditor configuration
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'blockQuote',
                    'insertTable', 'undo', 'redo'
                ],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        }
                    ]
                }
            })
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });

        // Form submission
        const form = document.getElementById('article-form');
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Tunggu CKEditor siap
            const editorContent = editor.getData();
            if (!editorContent || editorContent.length < 100) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal',
                    text: 'Isi artikel minimal 100 karakter!'
                });
                return;
            }

            // Masukkan isi editor ke dalam textarea hidden sebelum submit
            document.querySelector('#editor').value = editorContent;

            // Tampilkan loading
            Swal.fire({
                title: 'Menyimpan artikel...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Lanjutkan submit form secara langsung
            form.submit();
        });


        // Image preview
        function previewImage() {
            const input = document.getElementById('thumbnail');
            const preview = document.getElementById('thumbnail-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
