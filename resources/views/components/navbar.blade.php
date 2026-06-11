<div>
    <!-- ── NAVBAR ── -->
    <nav id="navbar">
        <div class="container px-0 d-flex align-items-center justify-content-between">

            <!-- LEFT: LOGO -->
            <div class="d-flex align-items-center">
                <a href="index.html">
                    <div class="logo-icon">
                        <img id="navbar-logo" src="{{ Vite::asset('public/images/logo-light.png') }}" alt="Logo">
                    </div>
                </a>
            </div>

            <!-- RIGHT: NAV + BUTTON -->
            <div class="d-flex align-items-center gap-4">

                <!-- DESKTOP LINKS -->
                <ul class="desktop-nav d-none d-lg-flex m-0">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="gym-access-control.html">Access Control</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                    <li><a href="fitness-blog.html">Fitness Blog</a></li>
                    <li><a href="careers.html">Careers</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>

                <!-- CTA -->
                <a href="contact.html" class="btn-primary-cta d-none d-lg-inline-flex">
                    Get Started <span class="arr">→</span>
                </a>

                <!-- MOBILE HAMBURGER -->
                <button class="hamburger d-lg-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#mobileMenu">
                    <i class="bi bi-list fs-5"></i>
                </button>

            </div>

        </div>
    </nav>

    <!-- ── OFFCANVAS MOBILE MENU ── -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
        <div class="offcanvas-header border-bottom" style="border-color:var(--border)!important;">
            <span class="flogo">BEE<span>INFO</span></span>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column gap-2 pt-4 px-3">
            <a href="index.html" class="mobile-nav-link nav-link-item">Home</a>
            <a href="about.html" class="mobile-nav-link nav-link-item">About</a>
            <a href="gym-access-control.html" class="mobile-nav-link nav-link-item">Access Control</a>
            <a href="pricing.html" class="mobile-nav-link nav-link-item">Pricing</a>
            <a href="fitness-blog.html" class="mobile-nav-link nav-link-item">Fitness Blog</a>
            <a href="careers.html" class="mobile-nav-link nav-link-item">Careers</a>
            <a href="contact.html" class="mobile-nav-link nav-link-item">Contact</a>
            <div class="mt-auto pb-4">
                <a href="contact.html" class="mobile-nav-link btn-primary-cta w-100 justify-content-center">Get Started
                    <span class="arr">→</span></a>
            </div>
        </div>
    </div>
</div>
