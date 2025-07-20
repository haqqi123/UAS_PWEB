@extends('admin.layouts.admin')

@section('title', 'Edit Anggota Organisasi')
@section('page-title', 'Edit Anggota Organisasi')

@section('content')
    <div class="space-y-6">
        <!-- Back Button -->
        <div>
            <a href="{{ route('admin.organization.index') }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Daftar Organisasi</span>
            </a>
        </div>

        <form id="organization-form" action="{{ route('admin.organization.update', $organization) }}" method="POST"
            enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="p-6 bg-white shadow-md rounded-2xl">
                <div class="grid gap-6 lg:grid-cols-2">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Nama -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama', $organization->nama) }}" required
                                maxlength="100"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20"
                                placeholder="Masukkan nama lengkap">
                            @error('nama')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                Hanya boleh berisi huruf dan spasi, maksimal 100 karakter.
                            </p>
                        </div>

                        <!-- Jabatan -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">Jabatan</label>
                            <input type="text" name="jabatan" value="{{ old('jabatan', $organization->jabatan) }}"
                                required maxlength="50"
                                class="w-full p-2 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring focus:ring-primary/20"
                                placeholder="Masukkan jabatan">
                            @error('jabatan')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                Maksimal 50 karakter.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column - Image Upload -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Foto</label>
                        <div class="space-y-4">
                            <!-- Current Image -->
                            <div class="p-4 border-2 border-gray-300 rounded-lg">
                                <p class="mb-2 text-sm font-medium text-gray-700">Foto Saat Ini:</p>
                                <div class="relative aspect-square">
                                    @if ($organization->foto)
                                        <img src="{{ asset($organization->foto) }}" alt="{{ $organization->nama }}"
                                            class="object-cover w-full h-full rounded-lg">
                                    @else
                                        <div class="flex items-center justify-center w-full h-full bg-gray-100 rounded-lg">
                                            <i class="text-4xl text-gray-400 fas fa-user"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <div class="relative aspect-square">
                                <img id="preview" src="{{ asset('images/placeholder.png') }}"
                                    class="object-cover w-full h-full border-2 border-gray-300 rounded-lg" alt="Preview">
                                <div id="overlay"
                                    class="absolute inset-0 flex items-center justify-center transition-opacity bg-black rounded-lg opacity-0 hover:opacity-50">
                                    <i class="text-2xl text-white fas fa-camera"></i>
                                </div>
                            </div>

                            <!-- File Input -->
                            <input type="file" name="foto" id="foto" accept="image/jpeg,image/jpg,image/png"
                                class="hidden">

                            <!-- Custom Upload Button -->
                            <button type="button" onclick="document.getElementById('foto').click()"
                                class="w-full p-2 text-sm text-center border-2 border-gray-300 rounded-lg hover:border-primary">
                                <i class="mr-2 fas fa-upload"></i>
                                Pilih Foto Baru
                            </button>

                            @error('foto')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500">
                                Format: JPG, JPEG, PNG. Ukuran maksimal: 2MB. <br>
                                Gambar akan di-crop menjadi persegi. <br>
                                Biarkan kosong jika tidak ingin mengubah foto.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="btn-primary">
                    <i class="mr-2 fas fa-save"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.12/dist/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.12/dist/cropper.min.css">

    <script>
        // Image preview and cropper
        const input = document.getElementById('foto');
        const preview = document.getElementById('preview');
        let cropper = null;

        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            // Validate file size (2MB)
            if (file.size > 2 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'File Terlalu Besar',
                    text: 'Ukuran file maksimal 2MB!'
                });
                input.value = '';
                return;
            }

            // Validate file type
            if (!['image/jpeg', 'image/jpg', 'image/png'].includes(file.type)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format File Tidak Sesuai',
                    text: 'Format file harus JPG, JPEG, atau PNG!'
                });
                input.value = '';
                return;
            }

            // Read and preview image
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;

                // Initialize cropper
                if (cropper) cropper.destroy();
                cropper = new Cropper(preview, {
                    aspectRatio: 1,
                    viewMode: 2,
                    autoCropArea: 1,
                    crop: function(event) {
                        // You can use event.detail to get cropped image data
                    }
                });
            };
            reader.readAsDataURL(file);
        });

        // Form submission
        const form = document.getElementById('organization-form');
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Show confirmation
            const result = await Swal.fire({
                title: 'Simpan Perubahan?',
                text: 'Pastikan data yang diinput sudah benar.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Simpan',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#5B8BB8',
            });

            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: 'Menyimpan perubahan...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Get cropped image if available
                if (cropper && input.files.length > 0) {
                    cropper.getCroppedCanvas().toBlob((blob) => {
                        const formData = new FormData(form);
                        formData.set('foto', blob, input.files[0].name);

                        // Submit form
                        form.submit();
                    }, input.files[0].type);
                } else {
                    form.submit();
                }
            }
        });
    </script>
@endpush
