@props(['bgText', 'tagline', 'title', 'colTitle', 'para'])

<header class="hero-header-inner">
    <div class="hero-scroll-hint">
        <span>Scroll</span>
        <div class="scroll-tick"></div>
    </div>
    <div class="container hero-content">
        <div class="row hero-row">
            <div class="col-lg-12 position-relative">
                <div class="hero-wm">{{ $bgText }}</div>
                <div class="hero-text">
                    <div class="cheadline">{{ $tagline }}</div>
                    <h1 class="hero-title">{{ $title }}<br><span class="highlight">{{ $colTitle }}</span></h1>
                    <p class="hero-subtitle">{{ $para }}</p>
                    <div class="effective-date">
                        <i class="bi bi-calendar"></i>
                        Effective Date: January 01, 2026
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
