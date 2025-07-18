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

    @stack('styles')

    <!-- Additional Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Smooth transition for sidebar */
        .sidebar-transition {
            transition-property: transform, opacity;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
    </style>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    @livewireStyles
</head>

<body class="bg-gray-50" x-data="{ sidebarOpen: false }" @toggle-sidebar.window="sidebarOpen = !sidebarOpen">
    <div class="relative flex min-h-screen">
        <!-- Sidebar Component -->
        <div class="md:hidden">
            <x-admin.sidebar x-model="sidebarOpen" />
        </div>
        <div class="hidden md:block">
            <x-admin.sidebar />
        </div>

        <!-- Main Content -->
        <main class="flex-1 min-h-screen md:ml-64">
            <!-- Navbar Component -->
            <x-admin.navbar :title="$title ?? View::getSection('page-title', 'Dashboard')" />

            <!-- Page Content -->
            <div class="p-6 mt-16">
                @yield('content')
            </div>
        </main>

        <!-- Overlay for mobile sidebar -->
        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-black bg-opacity-50 md:hidden sidebar-transition"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        </div>
    </div>

    @stack('scripts')
    @livewireScripts
</body>

</html>
