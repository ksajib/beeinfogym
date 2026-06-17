@props(['testimonials'])

<section id="testimonials" class="section-pad" style="background: var(--black)">
    <div class="container px-0">
        <div class="text-center mx-auto mb-5" style="max-width: 560px">
            <div class="cheadline cheadline-center">Loved by Gym Owners</div>
            <h2 class="section-title text-light">What owners are saying</h2>
        </div>
        <div class="row g-4">
            @foreach ($testimonials as $item)
                <x-common.testimonial-card :name="$item['name']" :role="$item['role']" :image="$item['image']" :text="$item['text']"
                    :stars="$item['stars']" />
            @endforeach
        </div>
    </div>
</section>
