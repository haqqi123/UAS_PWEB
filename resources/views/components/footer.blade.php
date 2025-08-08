<footer class="bg-white border-t-4 border-accent">
    <div class="container px-2 py-8 mx-auto">
        <!-- Tambahkan justify-center untuk memusatkan grid -->
        <div class="grid justify-center max-w-full grid-cols-1 gap-8 mx-auto md:grid-cols-3">
            <!-- About Section -->
            <div class="md:px-4">
                <div class="flex items-center mb-4">
                    <div class="flex items-center justify-center w-12 h-12 mr-3 rounded-full bg-primary/10 text-primary">
                        <i class="text-xl fas fa-store-alt"></i>
                    </div>
                    <h4 class="text-xl font-bold text-primary">Kalibaru<span class="text-accent">Manis</span></h4>
                </div>
                <p class="mb-6 leading-relaxed text-gray-600">
                    Portal resmi Desa Kalibaru Manis yang menyajikan informasi lengkap tentang profil desa,
                    statistik penduduk, dan potensi UMKM lokal yang berkembang di wilayah kami.
                </p>
                <div>
                    <h6 class="mb-3 text-sm font-semibold">Ikuti Kami:</h6>
                    <div class="flex space-x-3">
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 transition-colors rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 transition-colors rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 transition-colors rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#"
                            class="flex items-center justify-center w-10 h-10 transition-colors rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="md:px-4">
                <h5 class="inline-block pb-2 mb-4 text-lg font-semibold border-b-2 text-primary border-accent">Menu
                    Cepat</h5>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center text-gray-600 hover:text-primary">
                            <i class="mr-2 text-xs fas fa-chevron-right text-accent"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-primary">
                            <i class="mr-2 text-xs fas fa-chevron-right text-accent"></i>
                            <span>UMKM Kalibaru</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="md:px-4">
                <h5 class="inline-block pb-2 mb-4 text-lg font-semibold border-b-2 text-primary border-accent">Hubungi
                    Kami</h5>
                <ul class="space-y-4">
                    <li class="flex">
                        <i class="mt-1 mr-3 text-xl fas fa-map-marker-alt text-primary"></i>
                        <div>
                            <h6 class="font-semibold text-primary">Kantor Kecamatan Kalibaru</h6>
                            <p class="text-sm text-gray-600">Jl. Jember No.157, Dusun Tegal Pakis, Kalibaruwetan, Kec.
                                Kalibaru, Kabupaten Banyuwangi, Jawa Timur 68467
                            </p>
                        </div>
                    </li>
                    <li class="flex">
                        <i class="mt-1 mr-3 text-xl fas fa-phone-alt text-primary"></i>
                        <div>
                            <h6 class="font-semibold text-primary">Telepon</h6>
                            <p class="text-sm text-gray-600">(0331) 1234567</p>
                        </div>
                    </li>
                    <li class="flex">
                        <i class="mt-1 mr-3 text-xl fas fa-envelope text-primary"></i>
                        <div>
                            <h6 class="font-semibold text-primary">Email</h6>
                            <p class="text-sm text-gray-600">info@umkmjember.id</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
