<footer class="footer-jember">
    <div class="container">
        <!-- Main Footer Content -->
        <div class="footer-jember-main py-5">
            <div class="row g-4">
                <!-- About Section with Local Identity -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="footer-jember-brand d-flex align-items-center mb-3">
                        <div class="jember-footer-logo me-2">
                            <i class="fas fa-store-alt"></i>
                        </div>
                        <h4 class="mb-0">UMKM<span class="text-jember-yellow">Jember</span></h4>
                    </div>
                    <p class="footer-jember-about">
                        Wadah bagi pelaku usaha mikro, kecil, dan menengah di Kabupaten Jember untuk berkembang bersama. 
                        Kami mempromosikan produk lokal khas Jember yang berkualitas.
                    </p>
                    <div class="footer-jember-social mt-4">
                        <h6 class="small fw-bold mb-3">Ikuti Kami:</h6>
                        <div class="d-flex">
                            <a href="#" class="footer-jember-social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="footer-jember-social-icon">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="footer-jember-social-icon">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#" class="footer-jember-social-icon">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Quick Links with Local Terms -->
                <div class="col-sm-6 col-lg-2">
                    <h5 class="footer-jember-title mb-3">Menu Cepat</h5>
                    <ul class="footer-jember-links">
                        <li><a href="{{ route('dashboard') }}"><i class="fas fa-chevron-right me-2"></i>Beranda</a></li>
                        <li><a href="{{ route('profile') }}"><i class="fas fa-chevron-right me-2"></i>UMKM Jember</a></li>
                        <li><a href="{{ route('pengelolaan') }}"><i class="fas fa-chevron-right me-2"></i>Admin</a></li>
                    </ul>
                </div>

                <!-- Local Products Highlight -->
                <div class="col-sm-6 col-lg-2">
                    <h5 class="footer-jember-title mb-3">Tim Pengembang</h5>
                    <ul class="footer-jember-developers list-unstyled">
                        <li><i class="fas fa-user me-2 text-jember-yellow"></i>Haqqi</li>
                        <li><i class="fas fa-user me-2 text-jember-yellow"></i>Catherine</li>
                        <li><i class="fas fa-user me-2 text-jember-yellow"></i>Uni</li>
                    </ul>
                </div>


                <!-- Contact Info with Local Touch -->
                <div class="col-lg-4">
                    <h5 class="footer-jember-title mb-3">Hubungi Kami</h5>
                    <ul class="footer-jember-contact">
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt footer-jember-contact-icon"></i>
                            <div>
                                <h6 class="mb-0">Kantor UMKM Jember</h6>
                                <p>Jl. Kalimantan No. 37, Kec. Patrang, Kabupaten Jember 68121</p>
                            </div>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone-alt footer-jember-contact-icon"></i>
                            <div>
                                <h6 class="mb-0">Telepon</h6>
                                <p>(0331) 1234567</p>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-envelope footer-jember-contact-icon"></i>
                            <div>
                                <h6 class="mb-0">Email</h6>
                                <p>info@umkmjember.id</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Warna Tema Jember */
    :root {
        --jember-green: #2E7D32;
        --jember-dark-green: #1B5E20;
        --jember-yellow: #FFC107;
        --jember-light: #E8F5E9;
    }
    
    /* Footer Container */
    .footer-jember {
        background-color: white;
        border-top: 3px solid var(--jember-yellow);
        color: #333;
    }
    
    /* Footer Brand */
    .footer-jember-brand {
        font-family: 'Poppins', sans-serif;
    }
    
    .footer-jember-brand h4 {
        color: var(--jember-dark-green);
        font-weight: 700;
    }
    
    .text-jember-yellow {
        color: var(--jember-yellow);
    }
    
    .footer-jember-developers li {
    margin-bottom: 0.5rem;
    color: #555;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    }

    .jember-footer-logo {
        background-color: var(--jember-light);
        color: var(--jember-green);
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
    
    /* About Section */
    .footer-jember-about {
        color: #555;
        line-height: 1.7;
    }
    
    /* Social Icons */
    .footer-jember-social-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background-color: var(--jember-light);
        color: var(--jember-green);
        border-radius: 50%;
        margin-right: 10px;
        transition: all 0.3s ease;
    }
    
    .footer-jember-social-icon:hover {
        background-color: var(--jember-green);
        color: white;
        transform: translateY(-3px);
    }
    
    /* Footer Titles */
    .footer-jember-title {
        color: var(--jember-dark-green);
        font-weight: 600;
        font-size: 1.1rem;
        position: relative;
        padding-bottom: 10px;
    }
    
    .footer-jember-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 2px;
        background-color: var(--jember-yellow);
    }
    
    /* Footer Links */
    .footer-jember-links {
        list-style: none;
        padding: 0;
    }
    
    .footer-jember-links li {
        margin-bottom: 0.6rem;
    }
    
    .footer-jember-links a {
        color: #555;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }
    
    .footer-jember-links a:hover {
        color: var(--jember-green);
        transform: translateX(5px);
    }
    
    .footer-jember-links i {
        font-size: 0.8rem;
        color: var(--jember-yellow);
    }
    
    /* Contact Info */
    .footer-jember-contact {
        list-style: none;
        padding: 0;
    }
    
    .footer-jember-contact li {
        display: flex;
        margin-bottom: 1rem;
    }
    
    .footer-jember-contact-icon {
        color: var(--jember-green);
        font-size: 1.2rem;
        margin-right: 1rem;
        margin-top: 3px;
    }
    
    .footer-jember-contact h6 {
        color: var(--jember-dark-green);
        font-weight: 600;
        font-size: 0.95rem;
    }
    
    .footer-jember-contact p {
        color: #555;
        font-size: 0.9rem;
        margin-bottom: 0;
    }
    
    /* Footer Bottom */
    .footer-jember-bottom {
        border-top: 1px solid #eee;
        background-color: #f9f9f9;
    }
    
    .footer-jember-developers .badge {
        font-weight: 500;
        padding: 0.35em 0.65em;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 767.98px) {
        .footer-jember-main {
            text-align: center;
        }
        
        .footer-jember-social {
            justify-content: center;
        }
        
        .footer-jember-links {
            margin-bottom: 2rem;
        }
        
        .footer-jember-title::after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        .footer-jember-contact li {
            justify-content: center;
            text-align: center;
        }
        
        .footer-jember-contact-icon {
            display: none;
        }
    }
</style>

<script>
    // Update current year automatically
    document.getElementById('current-year').textContent = new Date().getFullYear();
</script>