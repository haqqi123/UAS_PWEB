<?php
$isActive = fn($route) => request()->routeIs($route) ? 'text-white border-b-2 border-accent' : 'text-white/90 hover:text-white';
$isActiveScrolled = fn($route) => request()->routeIs($route) ? 'text-primary border-b-2 border-accent' : 'text-gray-700 hover:text-primary';

// Check if current page is dashboard
$isDashboard = request()->routeIs('dashboard');
?>

<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 {{ !$isDashboard ? 'bg-white shadow-lg' : '' }}"
    id="mainNav">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <!-- Brand -->
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                <div class="w-10 h-10 {{ !$isDashboard ? 'bg-primary/10 text-primary' : 'bg-white/10 text-white' }} rounded-full flex items-center justify-center transition-all duration-300"
                    id="navLogo">
                    <i class="fas fa-store-alt"></i>
                </div>
                <div>
                    <span
                        class="text-xl font-bold {{ !$isDashboard ? 'text-primary' : 'text-white' }} transition-colors duration-300"
                        id="navBrand">Kalibaru</span>
                    <span class="text-xl font-semibold text-accent">Manis</span>
                </div>
            </a>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="mobile-menu-button p-2 focus:outline-none" onclick="toggleMobileMenu()">
                    <svg class="h-6 w-6 {{ !$isDashboard ? 'text-primary' : 'text-white' }} transition-colors duration-300"
                        id="menuIcon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-6">
                <a href="{{ route('dashboard') }}"
                    class="nav-link flex items-center px-3 py-2 rounded-md {{ !$isDashboard ? $isActiveScrolled('dashboard') : $isActive('dashboard') }}">
                    <i class="fas fa-home mr-2"></i>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('umkm.index') }}"
                    class="nav-link flex items-center px-3 py-2 rounded-md {{ !$isDashboard ? $isActiveScrolled('umkm.index') : $isActive('umkm.index') }}">
                    <i class="fas fa-store mr-2"></i>
                    <span>Katalog UMKM</span>
                </a>
                <a href="{{ route('pengelolaan') }}"
                    class="nav-link flex items-center px-3 py-2 rounded-md {{ !$isDashboard ? $isActiveScrolled('pengelolaan') : $isActive('pengelolaan') }}">
                    <i class="fas fa-user-cog mr-2"></i>
                    <span>Admin</span>
                </a>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="mobile-menu hidden md:hidden">
            <div
                class="flex flex-col space-y-2 px-2 pt-2 pb-3 {{ $isDashboard ? 'bg-white/10 backdrop-blur-lg' : 'bg-white' }} rounded-lg mt-2">
                <a href="{{ route('dashboard') }}"
                    class="nav-link flex items-center px-3 py-2 rounded-md {{ !$isDashboard ? $isActiveScrolled('dashboard') : $isActive('dashboard') }}">
                    <i class="fas fa-home mr-2"></i>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('umkm.index') }}"
                    class="nav-link flex items-center px-3 py-2 rounded-md {{ !$isDashboard ? $isActiveScrolled('umkm.index') : $isActive('umkm.index') }}">
                    <i class="fas fa-store mr-2"></i>
                    <span>Katalog UMKM</span>
                </a>
                <a href="{{ route('pengelolaan') }}"
                    class="nav-link flex items-center px-3 py-2 rounded-md {{ !$isDashboard ? $isActiveScrolled('pengelolaan') : $isActive('pengelolaan') }}">
                    <i class="fas fa-user-cog mr-2"></i>
                    <span>Admin</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const mobileMenu = document.querySelector('.mobile-menu');
        mobileMenu.classList.toggle('hidden');
    }

    // Enhanced scroll effect - only apply to dashboard page
    window.addEventListener('scroll', function() {
        // Skip scroll effect if we're not on dashboard
        if ({{ !$isDashboard ? 'true' : 'false' }}) return;

        const navbar = document.getElementById('mainNav');
        const navLogo = document.getElementById('navLogo');
        const navBrand = document.getElementById('navBrand');
        const menuIcon = document.getElementById('menuIcon');
        const navLinks = document.querySelectorAll('.nav-link');

        if (window.scrollY > 10) {
            // Scrolled state
            navbar.classList.add('bg-white', 'shadow-lg');
            navbar.classList.remove('bg-transparent');
            navLogo.classList.remove('bg-white/10', 'text-white');
            navLogo.classList.add('bg-primary/10', 'text-primary');
            navBrand.classList.remove('text-white');
            navBrand.classList.add('text-primary');
            menuIcon.classList.remove('text-white');
            menuIcon.classList.add('text-primary');

            // Update nav links
            navLinks.forEach(link => {
                link.classList.remove('text-white/90', 'hover:text-white');
                link.classList.add('text-gray-700', 'hover:text-primary');
            });
        } else {
            // Top state
            navbar.classList.remove('bg-white', 'shadow-lg');
            navbar.classList.add('bg-transparent');
            navLogo.classList.add('bg-white/10', 'text-white');
            navLogo.classList.remove('bg-primary/10', 'text-primary');
            navBrand.classList.add('text-white');
            navBrand.classList.remove('text-primary');
            menuIcon.classList.add('text-white');
            menuIcon.classList.remove('text-primary');

            // Update nav links
            navLinks.forEach(link => {
                link.classList.add('text-white/90', 'hover:text-white');
                link.classList.remove('text-gray-700', 'hover:text-primary');
            });
        }
    });
</script>
