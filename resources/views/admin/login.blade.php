<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UMKM Jember</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .floating-image {
            animation: float 6s ease-in-out infinite;
        }

        .bg-primary {
            background-color: #5B8BB8;
        }

        .text-primary {
            color: #5B8BB8;
        }

        .border-primary {
            border-color: #5B8BB8;
        }

        .hover\:bg-primary-dark:hover {
            background-color: #4A7AA7;
        }

        .bg-primary-light {
            background-color: rgba(91, 139, 184, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-6xl">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    <!-- Left Side - Login Form -->
                    <div class="w-full md:w-1/2 p-8 lg:p-12">
                        <div class="text-center mb-8">
                            <img src="{{ asset('images/download__1_-removebg-preview.png') }}" alt="Logo Jember"
                                class="h-16 mx-auto mb-4">
                            <h2 class="text-3xl font-bold text-gray-800">Selamat Datang</h2>
                            <p class="text-gray-600 mt-2">Silakan masuk ke akun Anda</p>
                        </div>

                        @if ($errors->any())
                            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                                <div class="flex items-center text-red-800">
                                    <i class="fas fa-exclamation-circle mr-2"></i>
                                    <div>
                                        @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf
                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-envelope text-gray-400"></i>
                                    </div>
                                    <input type="email" id="email" name="email"
                                        class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                        value="{{ old('email') }}" placeholder="nama@email.com" required
                                        autocomplete="email">
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div>
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-gray-400"></i>
                                    </div>
                                    <input type="password" id="password" name="password"
                                        class="block w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                        placeholder="Masukkan password" required autocomplete="current-password">
                                    <button type="button"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 toggle-password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Remember Me -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input type="checkbox" id="remember" name="remember"
                                        class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                                        Ingat saya
                                    </label>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full flex justify-center items-center px-4 py-2.5 bg-primary hover:bg-primary-dark text-white font-medium rounded-lg transition-colors duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Masuk
                            </button>
                        </form>
                    </div>

                    <!-- Right Side - Illustration -->
                    <div class="hidden md:block w-1/2 bg-primary p-12">
                        <div class="h-full flex flex-col justify-center">
                            <div class="text-white mb-8">
                                <h3 class="text-2xl font-bold mb-4">Sistem Informasi UMKM Jember</h3>
                                <p class="text-white/80">Platform terpadu untuk mengelola dan mengembangkan UMKM di
                                    Jember</p>
                            </div>

                            <div class="space-y-6 text-white/80">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-store text-white"></i>
                                    </div>
                                    <p>Kelola data UMKM dengan mudah dan efisien</p>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-chart-line text-white"></i>
                                    </div>
                                    <p>Pantau perkembangan usaha secara real-time</p>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-users text-white"></i>
                                    </div>
                                    <p>Tingkatkan interaksi dengan pelaku UMKM</p>
                                </div>
                            </div>

                            <img src="{{ asset('images/download__1_-removebg-preview.png') }}" alt="Illustration"
                                class="w-64 h-64 object-contain mx-auto mt-8 floating-image opacity-50">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.querySelector('#password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>

</html>
