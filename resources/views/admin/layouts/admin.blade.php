<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Desa Kalibaru Manis</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Additional Styles -->
    @stack('styles')

    @livewireStyles
</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="fixed left-0 z-50 w-64 min-h-screen bg-white shadow-lg" x-data="{ open: true }">
            <!-- Logo -->
            <div class="p-4 border-b">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8">
                    <span class="text-lg font-bold text-gray-800">Admin Panel</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="py-4">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary {{ request()->routeIs('admin.dashboard') ? 'bg-primary/5 text-primary font-medium border-r-4 border-primary' : '' }}">
                            <i class="w-5 fas fa-home"></i>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.umkm.index') }}"
                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary {{ request()->routeIs('admin.umkm.*') ? 'bg-primary/5 text-primary font-medium border-r-4 border-primary' : '' }}">
                            <i class="w-5 fas fa-store"></i>
                            <span class="ml-2">UMKM</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.articles.index') }}"
                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary {{ request()->routeIs('admin.articles.*') ? 'bg-primary/5 text-primary font-medium border-r-4 border-primary' : '' }}">
                            <i class="w-5 fas fa-newspaper"></i>
                            <span class="ml-2">Artikel</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.population.index') }}"
                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary {{ request()->routeIs('admin.population.*') ? 'bg-primary/5 text-primary font-medium border-r-4 border-primary' : '' }}">
                            <i class="w-5 fas fa-users"></i>
                            <span class="ml-2">Data Penduduk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.organization.index') }}"
                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary {{ request()->routeIs('admin.organization.*') ? 'bg-primary/5 text-primary font-medium border-r-4 border-primary' : '' }}">
                            <i class="w-5 fas fa-sitemap"></i>
                            <span class="ml-2">Organisasi</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64">
            <!-- Navbar -->
            <nav class="fixed top-0 right-0 z-40 h-16 bg-white shadow-md left-64">
                <div class="flex items-center justify-between h-full px-4">
                    <!-- Page Title -->
                    <h1 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>

                    <!-- Right Navigation -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:text-primary">
                            <i class="fas fa-bell"></i>
                            <span
                                class="absolute top-0 right-0 w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- Profile Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center space-x-2 text-gray-600 hover:text-primary focus:outline-none">
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                    class="w-8 h-8 rounded-full">
                                <span class="font-medium">{{ auth()->user()->name }}</span>
                                <i class="text-xs fas fa-chevron-down"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 w-48 py-2 mt-2 bg-white rounded-lg shadow-lg">
                                <a href="#"
                                    class="block px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary">
                                    <i class="mr-2 fas fa-user-circle"></i>
                                    Profile
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full px-4 py-2 text-left text-gray-700 hover:bg-primary/5 hover:text-primary">
                                        <i class="mr-2 fas fa-sign-out-alt"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="p-6 mt-16">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
