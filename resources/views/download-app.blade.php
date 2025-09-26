@extends('layouts.app')

@section('title', 'Download Aplikasi Paseban Kawis Apps')

@section('content')
    <!-- Main Content -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- App Info Card -->
                <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-lg p-8 mb-8 animate-fade-in-up">
                    <div class="flex flex-col items-center text-center space-y-6">
                        <!-- App Icon -->
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-primary to-secondary rounded-2xl shadow-lg p-2">
                            <img src="{{ asset('apk/icon.png') }}" alt="Paseban Kawis Apps" class="w-20 h-20 rounded-xl">
                        </div>
                        
                        <!-- App Info -->
                        <div class="text-center">
                            <h2 class="text-3xl font-bold text-primary mb-3">Paseban Kawis Apps</h2>
                            <p class="mb-6 text-lg text-gray-600 leading-relaxed">Aplikasi mobile pembelajaran berbasis AI yang dirancang untuk UMKM dan masyarakat Desa Kalibaru Manis.</p>
                            <p class="text-primary mb-4 font-medium">Versi {{ $appInfo['version'] }}</p>
                            
                            <div class="flex flex-wrap justify-center gap-4 text-sm text-gray-500 mb-6">
                                <div class="flex items-center">
                                    <i class="fas fa-download mr-2 text-primary"></i>
                                    <span>{{ $appInfo['size'] }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar mr-2 text-accent"></i>
                                    <span>Update: {{ $appInfo['updated_at'] }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fab fa-android mr-2 text-secondary"></i>
                                    <span>Android</span>
                                </div>
                            </div>
                        </div>

                        <!-- Download Button -->
                        @if(file_exists(public_path('apk/Paseban Kawis Apps V4.apk')))
                            <a href="{{ $appInfo['download_url'] }}" 
                               class="inline-flex items-center justify-center bg-gray-350 text-gray-700 font-semibold px-4 py-3 rounded-lg hover:bg-gray-400 transition-all duration-300 transform hover:scale-105 shadow-lg"
                               style="background-color: #d1d5db; min-width: 180px;"
                               download="paseban-kawis-apps-v4.apk">
                                <i class="fas fa-download mr-3 text-xl text-gray-700"></i>
                                <div class="text-center">
                                    <div class="text-lg text-gray-700">Download APK</div>
                                    <div class="text-sm text-gray-600">{{ $appInfo['size'] }}</div>
                                </div>
                            </a>
                        @else
                            <div class="bg-red-500 text-white px-8 py-4 rounded-lg text-center max-w-md w-full">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                File APK tidak tersedia
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Features Section -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-12 animate-fade-in-up delay-200">
                    <h3 class="text-2xl font-bold text-primary mb-8 text-center">Fitur Utama Aplikasi</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        @foreach($appInfo['features'] as $index => $feature)
                        <div class="text-center p-4 rounded-xl bg-gray-50 hover:bg-primary/5 transition-all duration-300 transform hover:scale-105">
                            <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto mb-3">
                                @switch($index)
                                    @case(0)
                                        <i class="fas fa-book-open"></i>
                                        @break
                                    @case(1)
                                        <i class="fas fa-video"></i>
                                        @break
                                    @case(2)
                                        <i class="fas fa-question-circle"></i>
                                        @break
                                    @case(3)
                                        <i class="fas fa-brain"></i>
                                        @break
                                    @case(4)
                                        <i class="fas fa-tools"></i>
                                        @break
                                    @case(5)
                                        <i class="fas fa-users"></i>
                                        @break
                                    @case(6)
                                        <i class="fas fa-mobile-alt"></i>
                                        @break
                                    @case(7)
                                        <i class="fas fa-chart-line"></i>
                                        @break
                                    @default
                                        <i class="fas fa-star"></i>
                                @endswitch
                            </div>
                            <p class="text-sm font-medium text-gray-700 leading-tight">{{ $feature }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Roles Section -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-12 animate-fade-in-up delay-300">
                    <h3 class="text-2xl font-bold text-primary mb-8 text-center">Pembagian Peran</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Admin Role -->
                        <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-xl p-6 border border-primary/20">
                            <div class="flex items-center sm:items-start mb-4">
                                <div class="w-12 h-12 bg-primary text-white rounded-lg flex items-center justify-center mr-4 flex-shrink-0 min-w-[48px] min-h-[48px]">
                                    <i class="fas fa-user-shield text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Admin</h4>
                                    <p class="text-gray-600 leading-relaxed text-sm">{{ $appInfo['roles']['admin'] }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- User Role -->
                        <div class="bg-gradient-to-br from-secondary/10 to-secondary/5 rounded-xl p-6 border border-secondary/20">
                            <div class="flex items-center sm:items-start mb-4">
                                <div class="w-12 h-12 text-white rounded-lg flex items-center justify-center mr-4 flex-shrink-0 min-w-[48px] min-h-[48px]" style="background-color: #5B8BB8;">
                                    <i class="fas fa-user-shield text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-xl font-semibold text-gray-900 mb-2">User</h4>
                                    <p class="text-gray-600 leading-relaxed text-sm">{{ $appInfo['roles']['user'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Installation Guide -->
                <div class="bg-white rounded-2xl shadow-lg p-8 animate-fade-in-up delay-400">
                    <h3 class="text-2xl font-bold text-primary mb-6 text-center">Cara Instalasi</h3>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="text-center p-6">
                            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl text-white font-bold" style="background-color: #5B8BB8;">
                                <span>1</span>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-2">Download APK</h4>
                            <p class="text-gray-600 text-sm">Klik tombol download untuk mengunduh file APK aplikasi</p>
                        </div>
                        <div class="text-center p-6">
                            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl text-white font-bold" style="background-color: #6E7E2A;">
                                <span>2</span>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-2">Izinkan Instalasi</h4>
                            <p class="text-gray-600 text-sm">Aktifkan "Install from Unknown Sources" di pengaturan Android</p>
                        </div>
                        <div class="text-center p-6">
                            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl text-white font-bold" style="background-color: #D4AB07;">
                                <span>3</span>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-2">Install & Jalankan</h4>
                            <p class="text-gray-600 text-sm">Tap file APK untuk menginstall, lalu buka aplikasi</p>
                        </div>
                    </div>

                    <!-- Warning Box -->
                    <div class="mt-8 bg-amber-50 border border-amber-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-triangle text-amber-500 mr-3 mt-1"></i>
                            <div class="text-sm">
                                <h4 class="font-semibold text-amber-800 mb-1">Penting!</h4>
                                <p class="text-amber-700">
                                    Aplikasi ini memerlukan izin untuk mengakses lokasi dan penyimpanan untuk fungsi optimal. 
                                    Pastikan Anda mengunduh dari sumber resmi ini.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security Section -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mt-12 animate-fade-in-up delay-500">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-accent/20 text-accent rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-shield-alt text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-accent mb-2">Keamanan & Privasi</h4>
                            <p class="text-gray-700 leading-relaxed">
                                Aplikasi ini memerlukan izin untuk mengakses lokasi dan penyimpanan untuk fungsi optimal. 
                                Pastikan Anda mengunduh dari sumber resmi ini.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Support Section -->
                <div class="text-center mt-12">
                    <h3 class="text-xl font-semibold text-primary mb-4">Butuh Bantuan?</h3>
                    <p class="text-gray-600 mb-6">Tim support kami siap membantu Anda</p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="https://wa.me/6285748290136" target="_blank" 
                           class="inline-flex items-center bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-105">
                            <i class="fab fa-whatsapp mr-2 text-xl"></i>
                            WhatsApp Support
                        </a>
                        <a href="mailto:ppkormawabemfasilkom@gmail.com" 
                           class="inline-flex items-center bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-envelope mr-2"></i>
                            Email Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Add fade-in animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-fade-in-up').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        observer.observe(el);
    });

    // Initialize animations for hero elements
    document.addEventListener('DOMContentLoaded', function() {
        const elements = document.querySelectorAll('.animate-slide-up');
        elements.forEach((el, index) => {
            setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, index * 200);
        });
    });
</script>
@endpush