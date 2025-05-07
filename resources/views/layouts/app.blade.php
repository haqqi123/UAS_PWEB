<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Desa Suci - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px;
        }
        .footer {
            background-color: #f5f5f5;
            padding: 20px 0;
            margin-top: 40px;
        }
        .umkm-card {
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .umkm-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('components.navbar')

    <main class="flex-grow-1">
        @yield('content')
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>