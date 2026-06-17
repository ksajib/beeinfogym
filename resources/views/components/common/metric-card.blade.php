@props(['metric'])

<div class="metric-cell">
    <div class="metric-bar"></div>

    <div class="metric-icon">
        <img src="{{ Vite::asset($metric['icon']) }}" alt="{{ $metric['alt'] }}">
    </div>

    <div class="metric-lbl">
        {{ $metric['label'] }}
    </div>

    <div class="metric-val {{ $metric['value_class'] ?? '' }}"
        @isset($metric['style']) style="{{ $metric['style'] }}" @endisset>
        {{ $metric['value'] }}
    </div>

    <div class="metric-desc">
        {{ $metric['desc'] }}
    </div>
</div>
