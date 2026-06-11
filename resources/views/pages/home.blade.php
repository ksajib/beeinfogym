@extends('layouts.app')
@section('content')
    <div>
        <header class="hero-header">
            <div class="hero-scroll-hint">
                <span>Scroll</span>
                <div class="scroll-tick"></div>
            </div>
            <div class="hero-overlay">
                <div class="container hero-content">
                    <div class="row hero-row">
                        <div class="col-lg-7 position-relative">
                            <div class="hero-text">
                                <div class="cheadline">The Future of Fitness Management</div>
                                <h1 class="hero-title">Streamline<br />your <span class="highlight">gym business</span></h1>
                                <p class="hero-subtitle">Beeinfo is the ultimate all-in-one platform for gyms and health
                                    clubs. Automate billing, manage members, and grow revenue with our smart cloud-based
                                    solution.</p>
                                <div class="d-flex flex-wrap gap-3">
                                    <a href="contact.html" class="btn-primary-custom">Request Free Demo <span
                                            class="arr">→</span></a>
                                    <a href="#features" class="btn-ghost-custom">Explore Features <span
                                            class="arr">→</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block position-relative">
                            <div class="hero-image-wrapper">
                                <div class="hero-float hero-float-gyms">
                                    <i class="bi bi-activity"></i>
                                    <div>
                                        <div class="hf-num">110+</div>
                                        <div class="hf-lbl">Active Gyms</div>
                                    </div>
                                </div>
                                <img src="{{ Vite::asset('public/images/header.png') }}" class="hero-image" alt="Hero">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Statistics --}}
        <x-homepage.statistics />

        {{-- Management --}}
        <x-homepage.management />

        {{-- Features --}}
        <x-homepage.features />

        {{-- Access Controls --}}
        <x-homepage.smart_access />

        {{-- About Section --}}
        <x-homepage.about />

        {{-- Image Gallery --}}
        <x-homepage.gallery />

        {{-- Client Testimonial --}}
        <x-homepage.testimonial :testimonials="$testimonials" />

        {{-- Video Gallery --}}
        <x-homepage.video-gallery />

        {{-- CTA --}}
        <x-homepage.cta />
    </div>
@endsection
