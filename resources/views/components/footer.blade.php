<footer class="bg-white border-t-4 border-accent mt-8">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- About Section -->
            <div>
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-store-alt text-xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-primary">UMKM<span class="text-accent">Jember</span></h4>
                </div>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Wadah bagi pelaku usaha mikro, kecil, dan menengah di Kabupaten Jember untuk berkembang bersama.
                    Kami mempromosikan produk lokal khas Jember yang berkualitas.
                </p>
                <div>
                    <h6 class="text-sm font-semibold mb-3">Ikuti Kami:</h6>
                    <div class="flex space-x-3">
                        <a href="#"
                            class="w-10 h-10 bg-primary/10 text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-primary/10 text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-primary/10 text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-primary/10 text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h5 class="text-lg font-semibold text-primary mb-4 pb-2 border-b-2 border-accent inline-block">Menu
                    Cepat</h5>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-primary flex items-center">
                            <i class="fas fa-chevron-right text-accent text-xs mr-2"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile') }}" class="text-gray-600 hover:text-primary flex items-center">
                            <i class="fas fa-chevron-right text-accent text-xs mr-2"></i>
                            <span>UMKM Jember</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengelolaan') }}" class="text-gray-600 hover:text-primary flex items-center">
                            <i class="fas fa-chevron-right text-accent text-xs mr-2"></i>
                            <span>Admin</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Developers -->
            <div>
                <h5 class="text-lg font-semibold text-primary mb-4 pb-2 border-b-2 border-accent inline-block">Tim
                    Pengembang</h5>
                <ul class="space-y-2">
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-user text-accent mr-2"></i>
                        <span>Haqqi</span>
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-user text-accent mr-2"></i>
                        <span>Catherine</span>
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-user text-accent mr-2"></i>
                        <span>Uni</span>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h5 class="text-lg font-semibold text-primary mb-4 pb-2 border-b-2 border-accent inline-block">Hubungi
                    Kami</h5>
                <ul class="space-y-4">
                    <li class="flex">
                        <i class="fas fa-map-marker-alt text-primary text-xl mt-1 mr-3"></i>
                        <div>
                            <h6 class="font-semibold text-primary">Kantor UMKM Jember</h6>
                            <p class="text-gray-600 text-sm">Jl. Kalimantan No. 37, Kec. Patrang, Kabupaten Jember 68121
                            </p>
                        </div>
                    </li>
                    <li class="flex">
                        <i class="fas fa-phone-alt text-primary text-xl mt-1 mr-3"></i>
                        <div>
                            <h6 class="font-semibold text-primary">Telepon</h6>
                            <p class="text-gray-600 text-sm">(0331) 1234567</p>
                        </div>
                    </li>
                    <li class="flex">
                        <i class="fas fa-envelope text-primary text-xl mt-1 mr-3"></i>
                        <div>
                            <h6 class="font-semibold text-primary">Email</h6>
                            <p class="text-gray-600 text-sm">info@umkmjember.id</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
