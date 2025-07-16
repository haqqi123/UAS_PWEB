@extends('layouts.app')

@section('title', 'Daftarkan UMKM - Desa Kalibaru Manis')

@section('content')
    <div class="pt-32 pb-12">
        <div class="container mx-auto px-4">
            <!-- Back Button -->
            <a href="{{ route('umkm.index') }}" class="inline-flex items-center text-gray-600 hover:text-primary mb-6">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Katalog
            </a>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-md p-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftarkan UMKM Anda</h1>

                <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Informasi Pemilik -->
                    <div class="bg-gray-50 p-6 rounded-xl space-y-6">
                        <h2 class="text-xl font-semibold text-gray-800">Informasi Pemilik</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Pemilik -->
                            <div>
                                <label for="nama_pemilik" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Pemilik <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nama_pemilik" id="nama_pemilik"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required value="{{ old('nama_pemilik') }}">
                                @error('nama_pemilik')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- NIK -->
                            <div>
                                <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">
                                    NIK <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nik" id="nik"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required maxlength="16" minlength="16" value="{{ old('nik') }}">
                                @error('nik')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Usaha -->
                    <div class="bg-gray-50 p-6 rounded-xl space-y-6">
                        <h2 class="text-xl font-semibold text-gray-800">Informasi Usaha</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Usaha -->
                            <div class="md:col-span-2">
                                <label for="nama_usaha" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Usaha <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nama_usaha" id="nama_usaha"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required value="{{ old('nama_usaha') }}">
                                @error('nama_usaha')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kategori <span class="text-red-500">*</span>
                                </label>
                                <select name="kategori" id="kategori"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Makanan" {{ old('kategori') == 'Makanan' ? 'selected' : '' }}>Makanan
                                    </option>
                                    <option value="Minuman" {{ old('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman
                                    </option>
                                    <option value="Fashion" {{ old('kategori') == 'Fashion' ? 'selected' : '' }}>Fashion
                                    </option>
                                    <option value="Kerajinan" {{ old('kategori') == 'Kerajinan' ? 'selected' : '' }}>
                                        Kerajinan
                                    </option>
                                    <option value="Jasa" {{ old('kategori') == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                                    <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                    </option>
                                </select>
                                @error('kategori')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Jenis Produk -->
                            <div>
                                <label for="jenis_produk" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jenis Produk <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="jenis_produk" id="jenis_produk"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required value="{{ old('jenis_produk') }}"
                                    placeholder="Contoh: Kue Basah, Batik, Jasa Jahit">
                                @error('jenis_produk')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Harga Minimum -->
                            <div>
                                <label for="harga_minimum" class="block text-sm font-medium text-gray-700 mb-2">
                                    Harga Minimum <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 pointer-events-none">
                                        Rp
                                    </span>
                                    <input type="number" name="harga_minimum" id="harga_minimum"
                                        class="w-full pl-12 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                                        required min="0" value="{{ old('harga_minimum') }}">
                                </div>
                                @error('harga_minimum')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Harga Maximum -->
                            <div>
                                <label for="harga_maximum" class="block text-sm font-medium text-gray-700 mb-2">
                                    Harga Maximum <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 pointer-events-none">
                                        Rp
                                    </span>
                                    <input type="number" name="harga_maximum" id="harga_maximum"
                                        class="w-full pl-12 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                                        required min="0" value="{{ old('harga_maximum') }}">
                                </div>
                                @error('harga_maximum')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="md:col-span-2">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                                    Deskripsi Usaha <span class="text-red-500">*</span>
                                </label>
                                <textarea name="deskripsi" id="deskripsi" rows="4"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Foto Usaha -->
                            <div class="md:col-span-2">
                                <label for="foto_usaha" class="block text-sm font-medium text-gray-700 mb-2">
                                    Foto Usaha <span class="text-red-500">*</span>
                                </label>
                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg relative">
                                    <div class="space-y-1 text-center">
                                        <!-- Preview Container -->
                                        <div id="imagePreviewContainer" class="hidden mb-4">
                                            <img id="imagePreview" class="mx-auto max-h-48 rounded-lg" alt="Preview">
                                            <button type="button" id="removeImage"
                                                class="mt-2 text-sm text-red-600 hover:text-red-800">
                                                Hapus Gambar
                                            </button>
                                        </div>

                                        <!-- Upload Icon and Text -->
                                        <div id="uploadPrompt">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="foto_usaha"
                                                    class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary/90 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary">
                                                    <span>Upload a file</span>
                                                    <input id="foto_usaha" name="foto_usaha" type="file"
                                                        class="sr-only" accept="image/*" required>
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500">
                                                PNG, JPG, JPEG up to 2MB
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @error('foto_usaha')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Kontak -->
                    <div class="bg-gray-50 p-6 rounded-xl space-y-6">
                        <h2 class="text-xl font-semibold text-gray-800">Informasi Kontak</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- WhatsApp -->
                            <div>
                                <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nomor WhatsApp <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 pointer-events-none">
                                        +62
                                    </span>
                                    <input type="text" name="whatsapp" id="whatsapp"
                                        class="w-full pl-12 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                                        required value="{{ old('whatsapp') }}" placeholder="81234567890">
                                </div>
                                @error('whatsapp')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email
                                </label>
                                <input type="email" name="email" id="email"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                                    Alamat <span class="text-red-500">*</span>
                                </label>
                                <textarea name="alamat" id="alamat" rows="3"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                            Daftarkan UMKM
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Preview image before upload
            const imageInput = document.getElementById('foto_usaha');
            const imagePreview = document.getElementById('imagePreview');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const uploadPrompt = document.getElementById('uploadPrompt');
            const removeImageBtn = document.getElementById('removeImage');

            // Function to handle file selection
            function handleFileSelect(file) {
                if (file) {
                    // Validate file size
                    if (file.size > 2 * 1024 * 1024) {
                        alert('Ukuran file terlalu besar. Maksimal 2MB');
                        imageInput.value = '';
                        return;
                    }

                    // Validate file type
                    if (!['image/jpeg', 'image/png', 'image/jpg'].includes(file.type)) {
                        alert('Tipe file tidak didukung. Gunakan PNG, JPG, atau JPEG');
                        imageInput.value = '';
                        return;
                    }

                    // Create preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreviewContainer.classList.remove('hidden');
                        uploadPrompt.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }

            // Handle file input change
            imageInput.addEventListener('change', function(e) {
                handleFileSelect(e.target.files[0]);
            });

            // Handle drag and drop
            const dropZone = imageInput.closest('div');

            dropZone.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('border-primary', 'border-2');
            });

            dropZone.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.classList.remove('border-primary', 'border-2');
            });

            dropZone.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('border-primary', 'border-2');

                const file = e.dataTransfer.files[0];
                if (file) {
                    imageInput.files = e.dataTransfer.files;
                    handleFileSelect(file);
                }
            });

            // Handle remove image
            removeImageBtn.addEventListener('click', function() {
                imageInput.value = '';
                imagePreview.src = '';
                imagePreviewContainer.classList.add('hidden');
                uploadPrompt.classList.remove('hidden');
            });

            // Format WhatsApp number
            document.getElementById('whatsapp').addEventListener('input', function(e) {
                let number = e.target.value.replace(/\D/g, '');
                if (number.startsWith('0')) {
                    number = number.substring(1);
                }
                if (number.startsWith('62')) {
                    number = number.substring(2);
                }
                e.target.value = number;
            });

            // Validate NIK
            document.getElementById('nik').addEventListener('input', function(e) {
                e.target.value = e.target.value.replace(/\D/g, '').substring(0, 16);
            });

            // Validate price
            document.getElementById('harga_maximum').addEventListener('input', function(e) {
                const min = parseInt(document.getElementById('harga_minimum').value) || 0;
                const max = parseInt(e.target.value) || 0;
                if (max < min) {
                    alert('Harga maksimum tidak boleh lebih kecil dari harga minimum');
                    e.target.value = min;
                }
            });
        </script>
    @endpush
@endsection
