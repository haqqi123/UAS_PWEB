<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Admin - Desa Kalibaru Manis</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(2deg);
            }

            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(91, 139, 184, 0.3);
            }

            50% {
                box-shadow: 0 0 30px rgba(91, 139, 184, 0.5);
            }
        }

        .floating-image {
            animation: float 6s ease-in-out infinite;
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .bg-primary {
            background: linear-gradient(135deg, #5B8BB8, #4A7A9A);
        }

        .bg-primary-gradient {
            background: linear-gradient(135deg, #5B8BB8 0%, #6E7E2A 50%, #D4AB07 100%);
        }

        .text-primary {
            color: #5B8BB8;
        }

        .border-primary {
            border-color: #5B8BB8;
        }

        .hover\:bg-primary-dark:hover {
            background: linear-gradient(135deg, #4A7A9A, #3A6A89);
        }

        .bg-primary-light {
            background-color: rgba(91, 139, 184, 0.1);
        }

        .nature-bg {
            background-image:
                radial-gradient(circle at 25% 25%, #5B8BB8 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, #6E7E2A 0%, transparent 50%),
                linear-gradient(135deg, rgba(91, 139, 184, 0.05) 0%, rgba(110, 126, 42, 0.05) 100%);
        }

        .floating-particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: particle-float 15s ease-in-out infinite;
        }

        .particle-1 {
            top: 20%;
            left: 15%;
            animation-delay: 0s;
        }

        .particle-2 {
            top: 60%;
            right: 20%;
            animation-delay: 3s;
        }

        .particle-3 {
            bottom: 30%;
            left: 30%;
            animation-delay: 6s;
        }

        .particle-4 {
            top: 40%;
            right: 40%;
            animation-delay: 9s;
        }

        .particle-5 {
            bottom: 50%;
            right: 15%;
            animation-delay: 12s;
        }

        @keyframes particle-float {

            0%,
            100% {
                transform: translateY(0px) opacity(0.6);
            }

            25% {
                transform: translateY(-30px) opacity(1);
            }

            50% {
                transform: translateY(-60px) opacity(0.8);
            }

            75% {
                transform: translateY(-30px) opacity(1);
            }
        }

        .login-card {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .input-field {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }

        .input-field:focus {
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 0 0 3px rgba(91, 139, 184, 0.1);
        }

        .login-button {
            background: linear-gradient(135deg, #5B8BB8, #4A7A9A);
            transition: all 0.3s ease;
        }

        .login-button:hover {
            background: linear-gradient(135deg, #4A7A9A, #3A6A89);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(91, 139, 184, 0.3);
        }
    </style>
</head>

<body class="relative min-h-screen overflow-hidden nature-bg">
    <!-- Floating Particles -->
    <div class="floating-particles">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
    </div>

    <div class="relative z-10 flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-6xl fade-in-up">
            <div class="overflow-hidden shadow-2xl login-card rounded-3xl">
                <div class="flex flex-col md:flex-row">
                    <!-- Left Side - Login Form -->
                    <div class="w-full p-8 md:w-1/2 lg:p-12">
                        <div class="mb-8 text-center">
                            <img src="{{ asset('images/logo-banyuwangi.png') }}" alt="Logo Desa Kalibaru Manis"
                                class="h-20 mx-auto mb-6">
                            <h2 class="text-3xl font-bold text-gray-800">Portal Admin</h2>
                            <h3 class="text-xl font-semibold text-primary">Desa Kalibaru Manis</h3>
                            <p class="mt-2 text-gray-600">Masuk ke sistem pengelolaan desa</p>
                        </div>

                        @if ($errors->any())
                            <div class="p-4 mb-6 border-l-4 border-red-500 rounded-lg bg-red-50">
                                <div class="flex items-center text-red-800">
                                    <i class="mr-2 fas fa-exclamation-circle"></i>
                                    <div>
                                        @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="p-4 mb-6 border-l-4 border-red-500 rounded-lg bg-red-50">
                                <div class="flex items-center text-red-800">
                                    <i class="mr-2 fas fa-exclamation-circle"></i>
                                    <div>{{ session('error') }}</div>
                                </div>
                            </div>
                        @endif

                        @if (session('info'))
                            <div class="p-4 mb-6 border-l-4 border-blue-500 rounded-lg bg-blue-50">
                                <div class="flex items-center text-blue-800">
                                    <i class="mr-2 fas fa-info-circle"></i>
                                    <div>{{ session('info') }}</div>
                                </div>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="p-4 mb-6 border-l-4 border-green-500 rounded-lg bg-green-50">
                                <div class="flex items-center text-green-800">
                                    <i class="mr-2 fas fa-check-circle"></i>
                                    <div>{{ session('success') }}</div>
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf
                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email
                                    Admin</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 z-10 flex items-center pl-3 pointer-events-none">
                                        <i class="text-gray-600 fas fa-user-shield"></i>
                                    </div>
                                    <input type="email" id="email" name="email"
                                        class="block w-full py-3 pl-10 pr-3 border border-gray-300 input-field rounded-xl focus:ring-2 focus:ring-primary focus:border-primary"
                                        value="{{ old('email') }}" placeholder="admin@kalibarumanis.desa.id" required
                                        autocomplete="email">
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Kata
                                    Sandi</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 z-10 flex items-center pl-3 pointer-events-none">
                                        <i class="text-gray-600 fas fa-key"></i>
                                    </div>
                                    <input type="password" id="password" name="password"
                                        class="block w-full py-3 pl-10 pr-10 border border-gray-300 input-field rounded-xl focus:ring-2 focus:ring-primary focus:border-primary"
                                        placeholder="Masukkan kata sandi" required autocomplete="current-password">
                                    <button type="button"
                                        class="absolute inset-y-0 right-0 z-10 flex items-center pr-3 text-gray-400 hover:text-primary toggle-password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Remember Me -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input type="checkbox" id="remember" name="remember"
                                        class="w-4 h-4 border-gray-300 rounded text-primary focus:ring-primary"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" class="block ml-2 text-sm text-gray-700">
                                        Ingat saya
                                    </label>
                                </div>
                            </div>

                            <button type="submit"
                                class="flex items-center justify-center w-full px-4 py-3 font-semibold text-white transition-all duration-300 login-button rounded-xl">
                                <i class="mr-2 fas fa-sign-in-alt"></i>
                                Masuk ke Portal Admin
                            </button>

                            <div class="mt-6 text-center">
                                <p class="text-sm text-gray-600">
                                    <i class="mr-1 fas fa-shield-alt text-primary"></i>
                                    Portal ini dilindungi dengan keamanan tingkat tinggi
                                </p>
                            </div>
                        </form>
                    </div>

                    <!-- Right Side - Illustration -->
                    <div class="relative hidden w-1/2 p-12 overflow-hidden md:block bg-primary-gradient">
                        <!-- Additional floating particles for right side -->
                        <div class="absolute inset-0 pointer-events-none">
                            <div class="absolute w-64 h-64 bg-white rounded-full opacity-10 top-10 -right-32 blur-3xl">
                            </div>
                            <div
                                class="absolute w-48 h-48 bg-yellow-200 rounded-full opacity-15 bottom-20 -left-24 blur-2xl">
                            </div>
                        </div>

                        <div class="relative z-10 flex flex-col justify-center h-full">
                            <div class="mb-8 text-white">
                                <h3 class="mb-4 text-3xl font-bold">Sistem Informasi</h3>
                                <h4 class="mb-4 text-2xl font-semibold">Desa Kalibaru Manis</h4>
                                <p class="text-lg leading-relaxed text-white/90">
                                    Platform digital terpadu untuk mengelola administrasi desa, pemberdayaan masyarakat,
                                    dan pengembangan potensi lokal
                                </p>
                            </div>

                            <div class="space-y-6 text-white/90">
                                <div class="flex items-center group">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mr-4 transition-all duration-300 border rounded-xl bg-white/15 backdrop-blur-sm border-white/20 group-hover:bg-white/25">
                                        <i class="text-lg text-white fas fa-users-cog"></i>
                                    </div>
                                    <p class="font-medium">Kelola data penduduk dan organisasi desa</p>
                                </div>
                                <div class="flex items-center group">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mr-4 transition-all duration-300 border rounded-xl bg-white/15 backdrop-blur-sm border-white/20 group-hover:bg-white/25">
                                        <i class="text-lg text-white fas fa-chart-bar"></i>
                                    </div>
                                    <p class="font-medium">Monitor statistik dan perkembangan desa</p>
                                </div>
                                <div class="flex items-center group">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mr-4 transition-all duration-300 border rounded-xl bg-white/15 backdrop-blur-sm border-white/20 group-hover:bg-white/25">
                                        <i class="text-lg text-white fas fa-store"></i>
                                    </div>
                                    <p class="font-medium">Dukung pengembangan UMKM lokal</p>
                                </div>
                                <div class="flex items-center group">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 mr-4 transition-all duration-300 border rounded-xl bg-white/15 backdrop-blur-sm border-white/20 group-hover:bg-white/25">
                                        <i class="text-lg text-white fas fa-newspaper"></i>
                                    </div>
                                    <p class="font-medium">Publikasi berita dan informasi desa</p>
                                </div>
                            </div>

                            <div class="mt-8 text-center">
                                <div
                                    class="inline-flex items-center justify-center w-32 h-32 mx-auto border rounded-full bg-white/10 backdrop-blur-sm border-white/20 floating-image">
                                    <img src="{{ asset('images/logo-banyuwangi.png') }}"
                                        alt="Logo Desa Kalibaru Manis" class="object-contain w-28 h-28">
                                </div>
                                <p class="mt-4 text-sm font-medium text-white/80">Kalibaru Manis - Desa Digital</p>
                            </div>
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

        // Enhanced Form Interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add focus effects to input fields
            const inputs = document.querySelectorAll('.input-field');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-primary', 'ring-opacity-20');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-primary',
                        'ring-opacity-20');
                });
            });

            // Add loading state to login button
            const form = document.querySelector('form');
            const submitBtn = document.querySelector('.login-button');
            const originalText = submitBtn.innerHTML;

            form.addEventListener('submit', function() {
                submitBtn.innerHTML = '<i class="mr-2 fas fa-spinner fa-spin"></i>Sedang masuk...';
                submitBtn.disabled = true;

                // Re-enable after 3 seconds as fallback
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 3000);
            });

            // Add subtle animation to feature items
            const featureItems = document.querySelectorAll('.group');
            featureItems.forEach((item, index) => {
                item.style.animationDelay = `${index * 0.2}s`;
                item.classList.add('fade-in-up');
            });
        });

        // Parallax effect for background elements
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const particles = document.querySelectorAll('.particle');

            particles.forEach((particle, index) => {
                const speed = 0.5 + (index * 0.1);
                particle.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Keyboard navigation enhancement
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                const focusedElement = document.activeElement;
                if (focusedElement.type === 'email' || focusedElement.type === 'password') {
                    // If on email field, move to password
                    if (focusedElement.type === 'email') {
                        document.querySelector('#password').focus();
                        e.preventDefault();
                    }
                }
            }
        });
    </script>
</body>

</html>
