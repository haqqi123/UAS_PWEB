<!-- Sidebar -->
<aside x-cloak :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }"
    class="fixed left-0 z-50 w-64 min-h-screen transition-all duration-300 ease-in-out transform bg-white shadow-lg md:translate-x-0">
    <!-- Logo -->
    <div class="flex items-center justify-between p-4 border-b">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8">
            <span class="text-lg font-bold text-gray-800">Admin Panel</span>
        </a>
        <!-- Close button for mobile -->
        <button @click="sidebarOpen = false" class="text-gray-500 md:hidden hover:text-gray-700">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="py-4 overflow-y-auto h-[calc(100vh-4rem)]">
        <ul class="space-y-1">
            <li>
                <a href="{{ route('admin.dashboard') }}" @click="sidebarOpen = false"
                    class="flex items-center px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary {{ request()->routeIs('admin.dashboard') ? 'bg-primary/5 text-primary font-medium border-r-4 border-primary' : '' }}">
                    <i class="w-5 fas fa-home"></i>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.umkm.index') }}" @click="sidebarOpen = false"
                    class="flex items-center px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary {{ request()->routeIs('admin.umkm.*') ? 'bg-primary/5 text-primary font-medium border-r-4 border-primary' : '' }}">
                    <i class="w-5 fas fa-store"></i>
                    <span class="ml-2">UMKM</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.article.index') }}" @click="sidebarOpen = false"
                    class="flex items-center px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary {{ request()->routeIs('admin.article.*') ? 'bg-primary/5 text-primary font-medium border-r-4 border-primary' : '' }}">
                    <i class="w-5 fas fa-newspaper"></i>
                    <span class="ml-2">Artikel</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.population.index') }}" @click="sidebarOpen = false"
                    class="flex items-center px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary {{ request()->routeIs('admin.population.*') ? 'bg-primary/5 text-primary font-medium border-r-4 border-primary' : '' }}">
                    <i class="w-5 fas fa-users"></i>
                    <span class="ml-2">Data Penduduk</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.organization.index') }}" @click="sidebarOpen = false"
                    class="flex items-center px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary {{ request()->routeIs('admin.organization.*') ? 'bg-primary/5 text-primary font-medium border-r-4 border-primary' : '' }}">
                    <i class="w-5 fas fa-sitemap"></i>
                    <span class="ml-2">Struktur Organisasi</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
