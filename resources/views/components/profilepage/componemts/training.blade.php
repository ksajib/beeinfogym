<div x-data="{ isExpanded: false, rotateClass: '' }" x-init="$watch('isExpanded', value => rotateClass = value ? 'rotate-180' : '')" class="rounded-3 shadow-sm overflow-hidden my-4">

    <div class="w-100 d-flex align-items-center justify-content-between p-3 bg-dark text-start"
        @click="isExpanded = !isExpanded" style="cursor: pointer;">

        <span class="fw-semibold text-light flex-grow-1">Training</span>

        <div class="d-flex align-items-center gap-3" @click.stop>
            <button type="button" class="button">
                <i class="bi bi-plus-lg me-1"></i> Add Training
            </button>

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-down text-light"
                :style="isExpanded ? 'transform: rotate(180deg); transition: transform 0.2s;' : 'transition: transform 0.2s;'"
                @click="isExpanded = !isExpanded" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
        </div>
    </div>

    <div x-show="isExpanded" x-collapse style="display: none;">
        <div class="p-3 text-secondary" style="font-size: 0.95rem; line-height: 1.5;">
            This hidden section expands smoothly thanks to Alpine's collapse plugin. You can put forms, text
            descriptions, lists, or any other layout content right inside this wrapper.
        </div>
    </div>

</div>
