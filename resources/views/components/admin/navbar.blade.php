<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 z-40 h-16 bg-white shadow-md md:left-64">
    <div class="flex items-center justify-between h-full px-4">
        <!-- Hamburger Menu for Mobile -->
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-md md:hidden hover:bg-gray-100">
            <i class="text-gray-600 fas fa-bars"></i>
        </button>

        <!-- Page Title -->
        <h1 class="text-xl font-semibold text-gray-800">{{ $title ?? 'Dashboard' }}</h1>

        <!-- Right Navigation -->
        <div class="flex items-center space-x-4">

            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center space-x-2 text-gray-600 hover:text-primary focus:outline-none">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="w-8 h-8 rounded-full">
                    <span class="hidden font-medium sm:inline">{{ auth()->user()->name }}</span>
                    <i class="hidden text-xs fas fa-chevron-down sm:inline"></i>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" x-cloak @click.away="open = false"
                    class="absolute right-0 w-48 py-2 mt-2 bg-white rounded-lg shadow-lg">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-primary/5 hover:text-primary">
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
