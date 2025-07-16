@extends('layouts.app')

@section('title', $article->judul)

@section('content')
    <!-- Main Content -->
    <div class="pt-32 pb-12">
        <div class="container mx-auto px-4">
            <!-- Back Button -->
            <a href="{{ url('/') }}" class="inline-flex items-center text-gray-600 hover:text-primary mb-6">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Beranda
            </a>

            <!-- Article Detail -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                    <!-- Image Section - 2 columns -->
                    <div class="lg:col-span-2 relative h-[400px] lg:h-full">
                        @if ($article->thumbnail)
                            <img src="{{ asset($article->thumbnail) }}" alt="{{ $article->judul }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-primary/10 flex items-center justify-center">
                                <i class="fas fa-newspaper text-primary text-6xl"></i>
                            </div>
                        @endif
                        <!-- Overlay with date -->
                        <div class="absolute top-4 left-4">
                            <div class="bg-white rounded-lg shadow-md px-4 py-2 text-center">
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
                    <div class="lg:col-span-3 p-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="far fa-eye mr-2"></i>
                                <span>{{ number_format($article->views) }} views</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="far fa-clock mr-2"></i>
                                <span>{{ $article->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $article->judul }}</h1>

                        <!-- Author Info -->
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-primary text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-gray-800">{{ $article->penulis }}</h3>
                                <p class="text-sm text-gray-600">Penulis</p>
                            </div>
                        </div>

                        <!-- Article Content -->
                        <div class="prose prose-lg max-w-none">
                            <p class="text-gray-600 leading-relaxed">
                                {{ $article->isi }}
                            </p>
                        </div>

                        <!-- Share Buttons -->
                        <div class="mt-8 pt-8 border-t border-gray-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Bagikan Artikel</h3>
                            <div class="flex space-x-4">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                    target="_blank"
                                    class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-500 text-white hover:bg-blue-600 transition-colors">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $article->judul }}"
                                    target="_blank"
                                    class="flex items-center justify-center w-10 h-10 rounded-full bg-sky-500 text-white hover:bg-sky-600 transition-colors">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://wa.me/?text={{ $article->judul }}%20{{ url()->current() }}"
                                    target="_blank"
                                    class="flex items-center justify-center w-10 h-10 rounded-full bg-green-500 text-white hover:bg-green-600 transition-colors">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <button onclick="navigator.clipboard.writeText(window.location.href)"
                                    class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-500 text-white hover:bg-gray-600 transition-colors">
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
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Artikel Terkait</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($related as $item)
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden group transform transition-all duration-300 hover:-translate-y-2">
                                <!-- Article Thumbnail -->
                                <div class="relative h-48 overflow-hidden">
                                    @if ($item->thumbnail)
                                        <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->judul }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    @else
                                        <div
                                            class="w-full h-full bg-primary/10 flex items-center justify-center group-hover:bg-primary/20 transition-colors">
                                            <i class="fas fa-newspaper text-primary text-4xl"></i>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                    </div>
                                </div>

                                <!-- Article Content -->
                                <div class="p-6">
                                    <div class="flex items-center text-sm text-gray-500 mb-3">
                                        <i class="far fa-calendar-alt mr-2"></i>
                                        <span>{{ $item->created_at->format('d M Y') }}</span>
                                    </div>

                                    <h3
                                        class="text-xl font-bold text-gray-800 mb-2 line-clamp-2 group-hover:text-primary transition-colors">
                                        {{ $item->judul }}
                                    </h3>

                                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                        {{ $item->isi }}
                                    </p>

                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                        <div class="flex items-center">
                                            <div
                                                class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                                <i class="fas fa-user text-primary"></i>
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600">{{ $item->penulis }}</span>
                                        </div>
                                        <a href="{{ route('artikel.show', $item) }}"
                                            class="text-primary hover:text-primary/80 font-medium text-sm">
                                            Baca Selengkapnya
                                            <i
                                                class="fas fa-arrow-right ml-1 transition-transform group-hover:translate-x-1"></i>
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
