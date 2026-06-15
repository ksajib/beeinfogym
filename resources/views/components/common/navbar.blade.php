<div>
    <!-- ── NAVBAR ── -->
    <nav id="navbar">
        <div class="container px-0 d-flex align-items-center justify-content-between">

            <!-- LEFT: LOGO -->
            <div class="d-flex align-items-center">
                <a href="/">
                    <div class="logo-icon">
                        <img id="navbar-logo" src="{{ Vite::asset('public/images/logo-light.png') }}" alt="Logo">
                    </div>
                </a>
            </div>

            <!-- RIGHT: NAV + BUTTON -->
            <div class="d-flex align-items-center gap-4">
                <!-- DESKTOP LINKS -->
                <ul class="desktop-nav d-none d-lg-flex m-0">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/gym-access-control">Access Control</a></li>
                    <li><a href="/pricing">Pricing</a></li>
                    <li><a href="/fitness-blog">Fitness Blog</a></li>
                    <li><a href="/careers">Careers</a></li>
                    <li><a href="/contact">Contact</a></li>
                    @if (!Auth::check())
                        <li><a href="/login">Login</a></li>
                    @endif
                </ul>
                <!-- CTA -->
                <a href="/contact" class="btn-primary-cta d-none d-lg-inline-flex">
                    Get Started <span class="arr">→</span>
                </a>

                {{-- Avetar --}}
                @if (Auth::check())
                    <div class="flex justify-center">
                        <div x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }
                        
                                this.$refs.button.focus()
                        
                                this.open = true
                            },
                            close(focusAfter) {
                                if (!this.open) return
                        
                                this.open = false
                        
                                focusAfter && focusAfter.focus()
                            }
                        }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                            x-id="['dropdown-button']" class="relative">
                            <!-- Button -->

                            <div x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                :aria-controls="$id('dropdown-button')" type="button" class="navbar-hero-av">
                                {{ collect(explode(' ', Auth::user()->name))->take(2)->map(fn($word) => strtoupper($word[0]))->implode('') }}
                            </div>


                            <!-- Panel -->
                            <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" x-cloak
                                class="position-absolute mt-2 rounded shadow-sm"
                                style="min-width: 180px; z-index: 1050; background:#060606; border:none;">

                                <a href="/user/profile" class="dropdown-custom-item">
                                    <i class="bi bi-person-circle me-2"></i> Bee Info Profile
                                </a>

                                <a href="#saved" class="dropdown-custom-item">
                                    <i class="bi bi-bookmark-check me-2"></i> Saved Jobs
                                </a>

                                <a href="#following" class="dropdown-custom-item">
                                    <i class="bi bi-people me-2"></i> Following Employer
                                </a>

                                <a href="#applied" class="dropdown-custom-item">
                                    <i class="bi bi-send-check me-2"></i> Applied Jobs
                                </a>

                                <a href="#settings" class="dropdown-custom-item">
                                    <i class="bi bi-gear me-2"></i> Account Settings
                                </a>

                                <a href="{{ route('logout') }}" class="dropdown-custom-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Sign Out
                                </a>

                            </div>
                        </div>
                    </div>
                @endif

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
            <a href="/" class="mobile-nav-link nav-link-item">Home</a>
            <a href="/about" class="mobile-nav-link nav-link-item">About</a>
            <a href="/gym-access-control" class="mobile-nav-link nav-link-item">Access Control</a>
            <a href="/pricing" class="mobile-nav-link nav-link-item">Pricing</a>
            <a href="/fitness-blog" class="mobile-nav-link nav-link-item">Fitness Blog</a>
            <a href="/careers" class="mobile-nav-link nav-link-item">Careers</a>
            <a href="/contact" class="mobile-nav-link nav-link-item">Contact</a>
            <div class="mt-auto pb-4">
                <a href="/contact" class="mobile-nav-link btn-primary-cta w-100 justify-content-center">Get Started
                    <span class="arr">→</span></a>
            </div>
        </div>
    </div>
</div>
