<nav class="navbar navbar-expand-lg navbar-jember fixed-top">
    <div class="container">
        <!-- Brand with logo and local identity -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <div class="jember-brand d-flex align-items-center">
                <div class="jember-logo-icon me-2">
                    <i class="fas fa-store-alt"></i>
                </div>
                <div>
                    <span class="jember-brand-main">UMKM</span>
                    <span class="jember-brand-sub">Jember</span>
                </div>
            </div>
        </a>
        
        <!-- Mobile toggle button with custom design -->
        <button class="navbar-toggler jember-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarJember" aria-controls="navbarJember" aria-expanded="false" aria-label="Toggle navigation">
            <span class="jember-toggler-icon"></span>
        </button>
        
        <!-- Navigation links with local flavor -->
        <div class="collapse navbar-collapse" id="navbarJember">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item mx-1">
                    <a class="nav-link jember-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <div class="jember-nav-content">
                            <i class="fas fa-home jember-nav-icon"></i>
                            <span>Beranda</span>
                        </div>
                        <div class="jember-nav-indicator"></div>
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link jember-nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                        <div class="jember-nav-content">
                            <i class="fas fa-map-marked-alt jember-nav-icon"></i>
                            <span>UMKM Jember</span>
                        </div>
                        <div class="jember-nav-indicator"></div>
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link jember-nav-link {{ request()->routeIs('pengelolaan') ? 'active' : '' }}" href="{{ route('pengelolaan') }}">
                        <div class="jember-nav-content">
                            <i class="fas fa-user-cog jember-nav-icon"></i>
                            <span>Admin</span>
                        </div>
                        <div class="jember-nav-indicator"></div>
                    </a>
                </li>
            </ul>            
        </div>
    </div>
</nav>

<style>
    /* Warna Tema Jember */
    :root {
        --jember-green: #2E7D32;
        --jember-dark-green: #1B5E20;
        --jember-yellow: #FFC107;
        --jember-light: #E8F5E9;
    }
    
    /* Navbar Container */
    .navbar-jember {
        background-color: white;
        box-shadow: 0 2px 15px rgba(46, 125, 50, 0.1);
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        transition: all 0.3s ease;
    }
    
    /* Brand Logo Style */
    .jember-brand {
        font-family: 'Poppins', sans-serif;
    }
    
    .jember-brand-main {
        font-weight: 700;
        color: var(--jember-green);
        font-size: 1.4rem;
    }
    
    .jember-brand-sub {
        font-weight: 600;
        color: var(--jember-dark-green);
        font-size: 1.4rem;
    }
    
    .jember-logo-icon {
        background-color: var(--jember-light);
        color: var(--jember-green);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
    
    /* Nav Link Style */
    .jember-nav-link {
        color: var(--jember-dark-green);
        font-weight: 500;
        padding: 0.5rem 1rem !important;
        margin: 0.2rem 0;
        position: relative;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .jember-nav-link:hover {
        color: var(--jember-green);
        background-color: var(--jember-light);
    }
    
    .jember-nav-link.active {
        color: var(--jember-green);
        font-weight: 600;
    }
    
    .jember-nav-link.active .jember-nav-indicator {
        width: 100%;
        background-color: var(--jember-yellow);
    }
    
    .jember-nav-content {
        display: flex;
        align-items: center;
    }
    
    .jember-nav-icon {
        font-size: 1.1rem;
        margin-right: 0.5rem;
        width: 20px;
        text-align: center;
    }
    
    .jember-nav-indicator {
        position: absolute;
        bottom: -5px;
        left: 0;
        height: 3px;
        width: 0;
        background-color: transparent;
        border-radius: 3px;
        transition: all 0.3s ease;
    }
    
    .jember-nav-link:hover .jember-nav-indicator {
        width: 100%;
        background-color: var(--jember-light);
    }
    
    /* Toggler Style */
    .jember-toggler {
        border: none;
        padding: 0.5rem;
        box-shadow: none !important;
    }
    
    .jember-toggler-icon {
        display: block;
        width: 22px;
        height: 2px;
        background-color: var(--jember-green);
        position: relative;
        transition: all 0.3s ease;
    }
    
    .jember-toggler-icon::before,
    .jember-toggler-icon::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: var(--jember-green);
        left: 0;
        transition: all 0.3s ease;
    }
    
    .jember-toggler-icon::before {
        top: -6px;
    }
    
    .jember-toggler-icon::after {
        top: 6px;
    }
    
    .jember-toggler[aria-expanded="true"] .jember-toggler-icon {
        background-color: transparent;
    }
    
    .jember-toggler[aria-expanded="true"] .jember-toggler-icon::before {
        transform: rotate(45deg);
        top: 0;
    }
    
    .jember-toggler[aria-expanded="true"] .jember-toggler-icon::after {
        transform: rotate(-45deg);
        top: 0;
    }
    
    /* User Dropdown Style */
    .btn-jember-user {
        background-color: transparent;
        border: none;
        color: var(--jember-dark-green);
        padding: 0.5rem;
    }
    
    .btn-jember-user:hover {
        color: var(--jember-green);
    }
    
    .jember-user-avatar {
        background-color: var(--jember-light);
        color: var(--jember-green);
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .dropdown-menu-jember {
        border: none;
        box-shadow: 0 5px 15px rgba(46, 125, 50, 0.1);
        border-radius: 0.5rem;
        padding: 0.5rem;
        margin-top: 0.5rem;
    }
    
    .dropdown-item {
        border-radius: 0.3rem;
        padding: 0.5rem 1rem;
        color: var(--jember-dark-green);
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .dropdown-item:hover {
        background-color: var(--jember-light);
        color: var(--jember-green);
    }
    
    /* Responsive Adjustments */
    @media (max-width: 991.98px) {
        .navbar-collapse {
            padding: 1rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.1);
            margin-top: 0.5rem;
        }
        
        .jember-nav-link {
            margin: 0.25rem 0;
        }
    }
</style>

<script>
    // Add scroll effect to navbar
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar-jember');
        if (window.scrollY > 10) {
            navbar.style.boxShadow = '0 2px 10px rgba(46, 125, 50, 0.15)';
            navbar.style.paddingTop = '0.3rem';
            navbar.style.paddingBottom = '0.3rem';
        } else {
            navbar.style.boxShadow = '0 2px 15px rgba(46, 125, 50, 0.1)';
            navbar.style.paddingTop = '0.5rem';
            navbar.style.paddingBottom = '0.5rem';
        }
    });
</script>