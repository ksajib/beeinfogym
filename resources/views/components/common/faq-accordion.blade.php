@props([
    'items' => [],
])

@php
    $accordionId = 'faqAccordion-' . uniqid();
@endphp

<div class="accordion" id="{{ $accordionId }}">

    @foreach ($items as $index => $item)
        @php
            $id = $accordionId . '-faq-' . $index;
        @endphp

        <div class="faq-item accordion-item">
            <h2 class="accordion-header">
                <button class="faq-btn accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#{{ $id }}" aria-expanded="false" aria-controls="{{ $id }}">
                    {{ $item['question'] }}
                    <i class="bi bi-plus-lg faq-icon ms-auto"></i>
                </button>
            </h2>

            <div id="{{ $id }}" class="accordion-collapse collapse" data-bs-parent="#{{ $accordionId }}">
                <div class="accordion-body faq-body">
                    {{ $item['answer'] }}
                </div>
            </div>
        </div>
    @endforeach

</div>
