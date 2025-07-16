<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Desa Suci - @yield('title')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#5B8BB8',
                        primaryLight: '#8AB9E0',
                        accent: '#D4AB07',
                        secondary: '#6E7E2A',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Scrollbar */
        .scrollbar-custom::-webkit-scrollbar {
            height: 8px;
        }

        .scrollbar-custom::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb {
            background: rgba(91, 139, 184, 0.5);
            border-radius: 4px;
        }

        .scrollbar-custom::-webkit-scrollbar-thumb:hover {
            background: rgba(91, 139, 184, 0.8);
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Animations */
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out forwards;
        }

        .animate-slide-up {
            opacity: 0;
            animation: fade-in-up 0.6s ease-out forwards;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        /* Carousel Navigation */
        .carousel-dot {
            transition: all 0.3s ease-in-out;
        }

        .carousel-dot.active {
            width: 2rem;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">
    @include('components.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('components.footer')

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>

</html>
