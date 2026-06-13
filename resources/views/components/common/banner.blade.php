@props([
    'bgText',
    'tagline',
    'title',
    'colTitle',
    'para',
    'button1' => null,
    'button2' => null,
    'link1' => '#',
    'link2' => '#',
])

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
                    <div class="d-flex flex-wrap gap-3">
                        @if ($button1)
                            <x-common.bg-button :text="$button1" :to="$link1" />
                        @endif

                        @if ($button2)
                            <x-common.tra-button :text="$button2" :to="$link2" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
