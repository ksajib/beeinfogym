@props(['number', 'title', 'description', 'image', 'class' => ''])

<div class="col-sm-6 {{ $class }}">
    <div class="adv-card">
        <div class="adv-card-line"></div>

        <div class="adv-num">
            {{ $number }}
        </div>

        <span class="adv-icon">
            <img src="{{ Vite::asset($image) }}" alt="{{ $title }}">
        </span>

        <h5>{{ $title }}</h5>

        <p>{{ $description }}</p>
    </div>
</div>
