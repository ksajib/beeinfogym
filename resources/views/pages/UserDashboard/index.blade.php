@extends('layouts.profile')

@section('content')
    @push('styles')
        <style>
            [x-cloak] {
                display: none !important;
            }

            .nav-tabs {
                border-bottom: 1px solid #444;
            }

            .nav-tabs .nav-link {
                color: #ccc;
                border: none;
            }

            .nav-tabs .nav-link.active {
                background: #1e1e1e;
                color: #fff;
                border-bottom: 2px solid #0d6efd;
            }
        </style>
    @endpush

    <div>
        <div class="card card-black text-light p-4 mb-3">
            <div>
                <h4 class="text-bebas mb-1">Bee Info Jobs Profile</h4>
                <p class="text-fira fs-6 text-muted mb-0">
                    Update your BeeInfo profile anytime. Stay ready for the next opportunity.
                </p>
            </div>
        </div>

        <div class="card card-black text-light p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-4">


                <!-- Profile Progress -->
                <div x-data="{ progress: 0 }" x-init="setTimeout(() => progress = {{ $score ?? 0 }}, 200)" class="d-flex align-items-center gap-3">

                    <div class="position-relative d-flex align-items-center justify-content-center"
                        style="width:70px;height:70px;">

                        <svg class="w-100 h-100" viewBox="0 0 36 36" style="transform:rotate(-90deg);">

                            <!-- Background -->
                            <path stroke="#2f2f2f" stroke-width="3" fill="none"
                                d="M18 2.0845
                                                                                                   a 15.9155 15.9155 0 0 1 0 31.831
                                                                                                   a 15.9155 15.9155 0 0 1 0 -31.831" />

                            <!-- Animated Progress -->
                            <path stroke="#e6b000" stroke-width="3" stroke-linecap="round" fill="none"
                                :stroke-dasharray="`${progress},100`" style="transition:stroke-dasharray 1.5s ease-in-out;"
                                d="M18 2.0845
                                                                                                   a 15.9155 15.9155 0 0 1 0 31.831
                                                                                                   a 15.9155 15.9155 0 0 1 0 -31.831" />
                        </svg>

                        <div class="position-absolute fw-bold text-fira" style="font-size:.9rem;color:#e6b000;">
                            <span x-text="progress"></span>%
                        </div>

                    </div>

                    <div>
                        <h6 class="mb-0 text-white font-sans font-fira">We've built a resume based on your profile</h6>
                        <small class="text-muted font-sans">
                            Last Update Date: {{ $user->profile->updated_at->format('d M Y') }}
                        </small>
                    </div>

                </div>

                <!-- Buttons -->
                <div class="d-flex flex-wrap gap-2 align-items-center">

                    <div x-data="{ open: false }" class="d-inline-block">

                        <!-- Preview Button -->
                        <a href="#" @click.prevent="open = true" class="btn btn-outline-light font-sans btn-sm">
                            <i class="bi bi-eye me-1"></i>
                            CV Preview
                        </a>

                        <!-- Modal -->
                        <div x-show="open" x-cloak x-transition.opacity @keydown.escape.window="open=false"
                            @click.self="open=false"
                            style="position:fixed;
                           inset:0;
                           background:rgba(0,0,0,.75);
                           z-index:9999;">

                            <div class="modal-dialog modal-xl modal-dialog-centered"
                                style="max-width:1000px;margin:40px auto;">

                                <div class="modal-content" style="background:#111;color:#fff;" x-data="{ template: 'template1' }">

                                    <div class="modal-header border-secondary">

                                        <h5 class="modal-title">
                                            CV Template Preview
                                        </h5>

                                        <button class="btn-close btn-close-white" @click="open=false">
                                        </button>

                                    </div>

                                    <div class="modal-body" style="max-height:75vh;overflow:auto;">

                                        <!-- Template Buttons -->
                                        <div class="d-flex gap-2 mb-4">

                                            <button class="btn"
                                                :class="template == 'template1' ?
                                                    'btn-primary-cta' :
                                                    'btn-outline-light'"
                                                @click="template='template1'">

                                                Template 1

                                            </button>

                                            <button class="btn"
                                                :class="template == 'template2' ?
                                                    'btn-primary-cta' :
                                                    'btn-outline-light'"
                                                @click="template='template2'">

                                                Template 2

                                            </button>

                                        </div>

                                        <!-- Template 1 -->
                                        <div x-show="template=='template1'" x-transition.opacity>

                                            <div style="background:white;color:black;">

                                                @include('resume.pdf', ['user' => $user])

                                            </div>

                                        </div>

                                        <!-- Template 2 -->
                                        <div x-show="template=='template2'" x-transition.opacity>

                                            @include('resume.pdf3', ['user' => $user])

                                        </div>

                                        <!-- Download -->
                                        <div class="mt-4">

                                            <a :href="`{{ url('/user/resume/' . auth()->id() . '/download') }}?template=${template}`"
                                                class="btn btn-success">

                                                <i class="bi bi-download me-1"></i>

                                                Download Selected Template

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Direct Download -->
                    <a href="{{ url('/user/resume/' . auth()->id() . '/download') }}" class="btn btn-primary-cta btn-sm">

                        <i class="bi bi-download me-1"></i>

                        CV Download

                    </a>

                </div>

            </div>
        </div>

        <div class="tab-component mt-4" x-data="tabComponent('personal')" @go-to-tab.window="activeTab = $event.detail">

            <div class="tab-list d-flex flex-wrap gap-1" role="tablist">
                <template x-for="tab in tabs" :key="tab.id">
                    <button class="tab-btn" :class="{ 'active': activeTab === tab.id }" @click="activeTab = tab.id"
                        role="tab" :aria-selected="activeTab === tab.id" x-text="tab.label">
                    </button>
                </template>
            </div>

            <div class="tab-content mt-3">
                <template x-for="tab in tabs" :key="tab.id">
                    <div class="tab-panel" x-show="activeTab === tab.id" x-transition.opacity.duration.200ms
                        role="tabpanel">

                        <template x-if="tab.id === 'personal'">
                            <div class="nested-component-box" x-data="{ childCounter: 0 }">
                                <x-profilepage.personal-info :profile="$user->profile" />
                            </div>
                        </template>

                        <template x-if="tab.id === 'education'">
                            <div class="nested-component-box" x-data="settingsForm()">
                                <x-profilepage.education :education="$user->educations" :training="$user->training" />
                            </div>
                        </template>

                        <template x-if="tab.id === 'exprience'">
                            <div class="nested-component-box" x-data="{ textInput: '' }">
                                <x-profilepage.exprience :experience="$user->experiences" />
                            </div>
                        </template>

                        <template x-if="tab.id === 'achievement'">
                            <div class="nested-component-box" x-data="settingsForm()">
                                <x-profilepage.achievement :achivement="$user->achivements" />
                            </div>
                        </template>

                    </div>
                </template>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            // Parent Tab Component Data Handling State Configuration
            Alpine.data('tabComponent', (initialTab = 'personal') => ({
                activeTab: initialTab,
                tabs: [{
                        id: 'personal',
                        label: 'Personal Information',
                    },
                    {
                        id: 'education',
                        label: 'Education / Training',
                    },
                    {
                        id: 'exprience',
                        label: 'Expriences',
                    },
                    {
                        id: 'achievement',
                        label: 'Achievement',
                    }
                ]
            }));

            // A distinct child component scope layout context setup handler (Settings form instance template)
            Alpine.data('settingsForm', () => ({
                notifications: true,
                theme: 'light',
                saveSettings() {
                    alert(`Settings Saved! Theme: ${this.theme}, Alerts: ${this.notifications}`);
                }
            }));
        });
    </script>
@endsection
