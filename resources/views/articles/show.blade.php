@extends('layouts.app')

@section('title', $article->judul)

@section('content')
    <!-- Main Content -->
    <div class="pt-32 pb-12">
        <div class="container px-4 mx-auto">
            <!-- Back Button -->
            <a href="{{ url('/') }}" class="inline-flex items-center mb-6 text-gray-600 hover:text-primary">
                <i class="mr-2 fas fa-arrow-left"></i>
                Kembali ke Beranda
            </a>

            <!-- Article Detail -->
            <div class="overflow-hidden bg-white shadow-md rounded-2xl">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-5">
                    <!-- Image Section - 2 columns -->
                    <div class="lg:col-span-2 relative h-[400px] lg:h-full">
                        @if ($article->thumbnail)
                            <img src="{{ asset($article->thumbnail) }}" alt="{{ $article->judul }}"
                                class="object-cover w-full h-full">
                        @else
                            <div class="flex items-center justify-center w-full h-full bg-primary/10">
                                <i class="text-6xl fas fa-newspaper text-primary"></i>
                            </div>
                        @endif
                        <!-- Overlay with date -->
                        <div class="absolute top-4 left-4">
                            <div class="px-4 py-2 text-center bg-white rounded-lg shadow-md">
                                <span class="block text-2xl font-bold text-primary">
                                    {{ $article->created_at->format('d') }}
                                </span>
                                <span class="block text-sm text-gray-600">
                                    {{ $article->created_at->format('M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Content Section - 3 columns -->
                    <div class="p-8 lg:col-span-3">
                        <div class="flex items-center mb-6 space-x-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="mr-2 far fa-eye"></i>
                                <span>{{ number_format($article->views) }} views</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="mr-2 far fa-clock"></i>
                                <span>{{ $article->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <h1 class="mb-6 text-3xl font-bold text-gray-800">{{ $article->judul }}</h1>

                        <!-- Author Info -->
                        <div class="flex items-center mb-8">
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-primary/10">
                                <i class="text-xl fas fa-user text-primary"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-gray-800">{{ $article->penulis }}</h3>
                                <p class="text-sm text-gray-600">Penulis</p>
                            </div>
                        </div>

                        <!-- Article Content -->
                        <div class="prose prose-lg max-w-none">
                            <p class="leading-relaxed text-gray-600">
                                {!! $article->isi !!}
                            </p>
                        </div>

                        <!-- Share Buttons -->
                        <div class="pt-8 mt-8 border-t border-gray-100">
                            <h3 class="mb-4 text-lg font-semibold text-gray-800">Bagikan Artikel</h3>
                            <div class="flex space-x-4">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                    target="_blank"
                                    class="flex items-center justify-center w-10 h-10 text-white transition-colors bg-blue-500 rounded-full hover:bg-blue-600">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $article->judul }}"
                                    target="_blank"
                                    class="flex items-center justify-center w-10 h-10 text-white transition-colors rounded-full bg-sky-500 hover:bg-sky-600">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://wa.me/?text={{ $article->judul }}%20{{ url()->current() }}"
                                    target="_blank"
                                    class="flex items-center justify-center w-10 h-10 text-white transition-colors bg-green-500 rounded-full hover:bg-green-600">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <button onclick="navigator.clipboard.writeText(window.location.href)"
                                    class="flex items-center justify-center w-10 h-10 text-white transition-colors bg-gray-500 rounded-full hover:bg-gray-600">
                                    <i class="fas fa-link"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Articles -->
            @if ($related->count() > 0)
                <div class="mt-12">
                    <h2 class="mb-6 text-2xl font-bold text-gray-800">Artikel Terkait</h2>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                        @foreach ($related as $item)
                            <div
                                class="overflow-hidden transition-all duration-300 transform bg-white shadow-md rounded-2xl group hover:-translate-y-2">
                                <!-- Article Thumbnail -->
                                <div class="relative h-48 overflow-hidden">
                                    @if ($item->thumbnail)
                                        <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->judul }}"
                                            class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110">
                                    @else
                                        <div
                                            class="flex items-center justify-center w-full h-full transition-colors bg-primary/10 group-hover:bg-primary/20">
                                            <i class="text-4xl fas fa-newspaper text-primary"></i>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute inset-0 transition-opacity opacity-0 bg-gradient-to-t from-black/60 to-transparent group-hover:opacity-100">
                                    </div>
                                </div>

                                <!-- Article Content -->
                                <div class="p-6">
                                    <div class="flex items-center mb-3 text-sm text-gray-500">
                                        <i class="mr-2 far fa-calendar-alt"></i>
                                        <span>{{ $item->created_at->format('d M Y') }}</span>
                                    </div>

                                    <h3
                                        class="mb-2 text-xl font-bold text-gray-800 transition-colors line-clamp-2 group-hover:text-primary">
                                        {{ $item->judul }}
                                    </h3>

                                    <p class="mb-4 text-sm text-gray-600 line-clamp-3">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 150, '...') }}
                                    </p>

                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                        <div class="flex items-center">
                                            <div
                                                class="flex items-center justify-center w-8 h-8 rounded-full bg-primary/10">
                                                <i class="fas fa-user text-primary"></i>
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600">{{ $item->penulis }}</span>
                                        </div>
                                        <a href="{{ route('artikel.show', $item) }}"
                                            class="text-sm font-medium text-primary hover:text-primary/80">
                                            Baca Selengkapnya
                                            <i
                                                class="ml-1 transition-transform fas fa-arrow-right group-hover:translate-x-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
