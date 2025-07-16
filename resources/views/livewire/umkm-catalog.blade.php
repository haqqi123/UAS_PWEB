<div>
    <!-- Filter Categories -->
    <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Filter Kategori:</h3>
        <div class="flex flex-wrap gap-3">
            <button wire:click="$set('selectedCategory', '')"
                class="px-4 py-2 rounded-full {{ !$selectedCategory ? 'bg-primary text-white' : 'bg-white text-gray-700' }} hover:bg-primary/90 hover:text-white transition-colors shadow-sm">
                Semua
            </button>
            @foreach ($categories as $category)
                <button wire:click="$set('selectedCategory', '{{ $category }}')"
                    class="px-4 py-2 rounded-full {{ $selectedCategory === $category ? 'bg-primary text-white' : 'bg-white text-gray-700' }} hover:bg-primary/90 hover:text-white transition-colors shadow-sm">
                    {{ $category }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- UMKM Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($umkm as $item)
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden group transform transition-all duration-300 hover:-translate-y-2">
                <!-- UMKM Image -->
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $item->foto_url }}" alt="{{ $item->nama_usaha }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                </div>

                <!-- UMKM Content -->
                <div class="p-6">
                    <div class="mb-3">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-primary/10 text-primary">
                            {{ $item->kategori }}
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-primary transition-colors">
                        {{ $item->nama_usaha }}
                    </h3>

                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        {{ $item->deskripsi }}
                    </p>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-store mr-2 text-primary"></i>
                            <span>{{ $item->jenis_produk }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-tag mr-2 text-primary"></i>
                            <span>{{ $item->formatted_harga_minimum }} - {{ $item->formatted_harga_maximum }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span class="line-clamp-1">{{ $item->alamat }}</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="{{ $item->whatsapp_url }}" target="_blank"
                            class="inline-flex items-center text-green-600 hover:text-green-700">
                            <i class="fab fa-whatsapp mr-2"></i>
                            Hubungi
                        </a>
                        <a href="{{ route('umkm.show', $item) }}"
                            class="text-primary hover:text-primary/80 font-medium text-sm">
                            Detail
                            <i class="fas fa-arrow-right ml-1 transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-store text-primary text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Tidak Ada UMKM</h3>
                <p class="text-gray-600">Tidak ada UMKM yang ditemukan dalam kategori ini.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $umkm->links() }}
    </div>
</div>
