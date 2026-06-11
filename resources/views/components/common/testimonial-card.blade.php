@props(['name', 'role', 'image', 'text', 'stars' => 5])

<div class="col-md-6 col-lg-4">
    <div class="tcard">
        <div class="tq">"</div>

        <div class="stars">
            @for ($i = 0; $i < $stars; $i++)
                ★
            @endfor
        </div>

        <p class="ttxt">
            "{{ $text }}"
        </p>

        <div class="tauth">
            <div class="tav">
                <img src="{{ Vite::asset($image) }}" alt="{{ $name }}" />
            </div>

            <div>
                <div class="tname">{{ $name }}</div>
                <div class="trole">{{ $role }}</div>
            </div>
        </div>
    </div>
</div>
