@extends('layouts.app')

@section('title', 'Download Aplikasi')

@section('content')
    <br>
    <br>
    <!-- Apps Selection -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Paseban Kawis Apps Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 transform hover:scale-105 animate-fade-in-up">
                        <div class="text-center space-y-6">
                            <!-- App Icon -->
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-primary to-secondary rounded-2xl shadow-lg p-2">
                                <img src="{{ asset('apk/icon.png') }}" alt="Paseban Kawis Apps" class="w-20 h-20 rounded-xl">
                            </div>
                            
                            <!-- App Info -->
                            <div>
                                <h3 class="text-2xl font-bold text-primary mb-3">Paseban Kawis Apps</h3>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    Aplikasi mobile pembelajaran berbasis AI yang dirancang untuk UMKM dan masyarakat Desa Kalibaru Manis.
                                </p>
                                
                                <!-- Features Preview -->
                                <div class="space-y-2 text-sm text-left">
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-book-open mr-3 text-primary w-4"></i>
                                        <span>Modul pembelajaran untuk UMKM</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-brain mr-3 text-primary w-4"></i>
                                        <span>Chatbot AI untuk konsultasi</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-video mr-3 text-primary w-4"></i>
                                        <span>Video pelatihan interaktif</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <a href="{{ route('download.paseban-kawis') }}" 
                               class="inline-flex items-center justify-center w-full bg-primary text-white font-semibold px-6 py-4 rounded-lg hover:bg-primary/90 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-download mr-3"></i>
                                Download Paseban Kawis Apps
                            </a>
                        </div>
                    </div>

                    <!-- PasebanKas Apps Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 transform hover:scale-105 animate-fade-in-up delay-200">
                        <div class="text-center space-y-6">
                            <!-- App Icon -->
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-primary to-secondary rounded-2xl shadow-lg p-2">
                                <img src="{{ asset('apk/icon3.png') }}" alt="PasebanKas Apps" class="w-20 h-20 rounded-xl">
                            </div>
                            
                            <!-- App Info -->
                            <div>
                                <h3 class="text-2xl font-bold text-primary mb-3">PasebanKas Apps</h3>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    Aplikasi pencatatan keuangan yang membantu pengelolaan transaksi UMKM di Desa Kalibaru Manis.
                                </p>
                                
                                <!-- Features Preview -->
                                <div class="space-y-2 text-sm text-left">
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-chart-line mr-3 text-primary w-4"></i>
                                        <span>Laporan keuangan dengan grafik</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-money-bill-wave mr-3 text-primary w-4"></i>
                                        <span>Pencatatan pemasukan & pengeluaran</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-user-shield mr-3 text-primary w-4"></i>
                                        <span>Mode Admin & UMKM</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <a href="{{ route('download.pasebankas') }}" 
                               class="inline-flex items-center justify-center w-full bg-primary text-white font-semibold px-6 py-4 rounded-lg hover:bg-primary/90 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-download mr-3"></i>
                                Download PasebanKas Apps
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Help Section -->
                <div class="text-center mt-12">
                    <h3 class="text-xl font-semibold text-primary mb-4">Butuh Bantuan Memilih?</h3>
                    <p class="text-gray-600 mb-6">Tim support kami siap membantu Anda menentukan aplikasi yang tepat</p>
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