@props([
    'tier',
    'price',
    'features' => [],
    'excluded' => [],
    'buttonClass' => 'btn-ghost-custom',
    'buttonText' => 'Get Started',
    'buttonLink' => '#',
    'popular' => false,
    'aos' => 'fade-up',
])

<div class="col-md-4">
    <div data-aos="{{ $aos }}" class="pcard {{ $popular ? 'popular' : '' }} h-100">
        <div class="pcard-bar"></div>

        @if ($popular)
            <div class="pglow"></div>
            <div class="pop-badge">Most Popular</div>
        @endif

        <div class="ptier">{{ $tier }}</div>

        <div class="pamt">
            <span class="psym">৳</span>
            <span class="pnum {{ $popular ? 'gold' : '' }}">
                {{ number_format($price) }}
            </span>
        </div>

        <div class="pper">/month</div>

        <div class="pdivider"></div>

        <ul class="pfeats">
            @foreach ($features as $feature)
                <li>
                    <i class="bi bi-check-lg pok"></i>
                    {{ $feature }}
                </li>
            @endforeach

            @foreach ($excluded as $feature)
                <li class="exc">
                    <i class="bi bi-x-lg pno"></i>
                    {{ $feature }}
                </li>
            @endforeach
        </ul>

        <a href="{{ $buttonLink }}" class="{{ $buttonClass }} justify-content-center w-100">
            {{ $buttonText }}
            <span class="arr">→</span>
        </a>
    </div>
</div>
