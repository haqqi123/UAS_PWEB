@extends('layouts.app')

@section('title', 'Login - UMKM Jember')

@section('content')
<div class="login-jember-container">
    <div class="row justify-content-center g-0">
        <div class="col-lg-7 d-none d-lg-block">
            <!-- Side Image with Overlay -->
            <div class="login-jember-side-image">
                <div class="login-jember-overlay p-5">
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('images/download__1_-removebg-preview.png') }}" alt="Logo Jember" height="50" class="me-2">
                        <h2 class="text-white mb-0">UMKM Jember</h2>
                    </div>
                    <h3 class="text-white fw-light">Selamat Datang Kembali</h3>
                    <p class="text-white-50">Masuk untuk mengelola UMKM Jember</p>
                    
                    <!-- Local Features -->
                    <div class="mt-5">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-store-alt fa-lg text-jember-yellow me-3"></i>
                            <span class="text-white">Kelola data UMKM lokal</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-box-open fa-lg text-jember-yellow me-3"></i>
                            <span class="text-white">Update produk terbaru</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-chart-line fa-lg text-jember-yellow me-3"></i>
                            <span class="text-white">Pantau perkembangan usaha</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-10 col-lg-5">
            <!-- Login Card -->
            <div class="login-jember-card">
                <div class="text-center mb-5">
                    <img src="{{ asset('images/download__1_-removebg-preview.png') }}" alt="Logo Jember" height="60" class="mb-3">
                    <h2 class="text-jember-green">Masuk ke Sistem</h2>
                    <p class="text-muted">Silakan masuk dengan akun Anda</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-jember-danger rounded-3 mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <div>
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Username Field -->
                    <div class="mb-4">
                        <label for="username" class="form-label text-jember-dark">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-jember-light">
                                <i class="fas fa-user text-jember-green"></i>
                            </span>
                            <input 
                                type="text" 
                                class="form-control py-2 border-jember" 
                                id="username" 
                                name="username" 
                                required 
                                value="{{ old('username') }}"
                                placeholder="cth: admin_umkm"
                            >
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-4">
                        <label for="password" class="form-label text-jember-dark">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-jember-light">
                                <i class="fas fa-lock text-jember-green"></i>
                            </span>
                            <input 
                                type="password" 
                                class="form-control py-2 border-jember" 
                                id="password" 
                                name="password" 
                                required
                                placeholder="Masukkan password"
                            >
                            <button class="btn btn-outline-jember toggle-password" type="button">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-jember-green w-100 py-2 fw-semibold mb-3">
                        <i class="fas fa-sign-in-alt me-2"></i> Masuk
                    </button>

                    <!-- Demo Credentials -->
                    <div class="alert alert-jember-info rounded-3 mt-4">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-info-circle mt-1 me-2 text-jember-green"></i>
                            <div>
                                <h6 class="alert-heading mb-2">Info Login Admin</h6>
                                <p class="small mb-1">Username: <strong>Jember</strong></p>
                                <p class="small mb-0">Password: <strong>jember456</strong></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Warna Tema Jember */
    :root {
        --jember-green: #2E7D32;
        --jember-dark-green: #1B5E20;
        --jember-yellow: #FFC107;
        --jember-light: #E8F5E9;
    }
    
    .login-jember-container {
        min-height: 100vh;
        background-color: #f8f9fa;
    }
    
    .login-jember-side-image {
        background-image: url('{{ asset("images/jember-background.jpg") }}');
        background-size: cover;
        background-position: center;
        height: 100vh;
        position: relative;
    }
    
    .login-jember-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        background-color: rgba(46, 125, 50, 0.85);
    }
    
    .login-jember-card {
        padding: 3rem;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: white;
    }
    
    /* Text Colors */
    .text-jember-green {
        color: var(--jember-green);
    }
    .text-jember-dark {
        color: var(--jember-dark-green);
    }
    .text-jember-yellow {
        color: var(--jember-yellow);
    }
    
    /* Background Colors */
    .bg-jember-light {
        background-color: var(--jember-light);
    }
    
    /* Borders */
    .border-jember {
        border-color: var(--jember-green) !important;
    }
    
    /* Buttons */
    .btn-jember-green {
        background-color: var(--jember-green);
        color: white;
        border: none;
        transition: all 0.3s;
    }
    
    .btn-jember-green:hover {
        background-color: var(--jember-dark-green);
        color: white;
    }
    
    .btn-outline-jember {
        border-color: var(--jember-green);
        color: var(--jember-green);
    }
    
    .btn-outline-jember:hover {
        background-color: var(--jember-light);
    }
    
    /* Alerts */
    .alert-jember-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }
    
    .alert-jember-info {
        background-color: var(--jember-light);
        color: var(--jember-dark-green);
        border-left: 4px solid var(--jember-green);
    }
    
    /* Form Elements */
    .form-control:focus {
        border-color: var(--jember-green);
        box-shadow: 0 0 0 0.25rem rgba(46, 125, 50, 0.15);
    }
    
    /* Toggle Password Button */
    .toggle-password {
        border-left: none;
        background-color: white;
    }
    
    .toggle-password:hover {
        background-color: var(--jember-light);
    }
    
    /* Responsive Adjustments */
    @media (max-width: 991.98px) {
        .login-jember-card {
            height: auto;
            padding: 2rem;
        }
    }
</style>

<script>
    // Toggle Password Visibility
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const passwordInput = this.parentNode.querySelector('input');
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
    });
</script>
@endsection