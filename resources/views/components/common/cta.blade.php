@props(['title', 'para', 'button1', 'button2', 'link1', 'link2'])

<section id="cta" class="section-pad">
    <div class="mx-auto">
        <h2 class="section-title text-light">{{ $title }}</h2>
        <p>{{ $para }} </p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <x-common.bg-button :text="$button1" :to="$link1" />
            <x-common.tra-button :text="$button2" :to="$link2" />
        </div>
    </div>
</section>
