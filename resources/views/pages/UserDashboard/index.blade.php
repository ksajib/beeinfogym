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
        <div class="card card-black text-light p-3">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                <!-- Left Side Text -->
                <div>
                    <h4 class="text-bebas mb-1">Bee Info Jobs Profile</h4>
                    <p class="text-fira fs-6 text-muted mb-0">
                        Update your BeeInfo profile anytime. Stay ready for the next opportunity.
                    </p>
                </div>

                <!-- Right Side Buttons -->
                <div class="d-flex gap-2">

                    <!-- Alpine component context stays intact -->
                    <div x-data="{ open: false }">

                        <!-- CV Preview Button -->
                        <a href="#" @click.prevent="open = true" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-eye me-1"></i> CV Preview
                        </a>

                        <!-- Modal Backdrop -->
                        <div x-show="open" x-cloak x-transition
                            style="
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.6);
            z-index: 9999;
         "
                            @click.self="open = false">

                            <!-- Modal -->
                            <div class="modal-dialog modal-lg modal-dialog-centered"
                                style="
                max-width: 800px;
                margin: 50px auto;
             ">
                                <div class="modal-content" style="background:#0f0f0f; color:white;" x-data="{ template: 'template1' }">

                                    <!-- Header -->
                                    <div class="modal-header border-secondary">
                                        <h5 class="modal-title">CV Template Preview</h5>

                                        <button type="button" class="btn-close btn-close-white" @click="open = false">
                                        </button>
                                    </div>

                                    <!-- BODY (SCROLL ADDED HERE) -->
                                    <div class="modal-body" style="max-height: 75vh; overflow-y: auto;">

                                        <!-- Switcher -->
                                        <div class="d-flex gap-2 mb-4">
                                            <button class="btn"
                                                :class="template === 'template1' ? 'btn-primary' : 'btn-outline-light'"
                                                @click="template = 'template1'">
                                                Template 1
                                            </button>

                                            <button class="btn"
                                                :class="template === 'template2' ? 'btn-primary' : 'btn-outline-light'"
                                                @click="template = 'template2'">
                                                Template 2
                                            </button>
                                        </div>

                                        <div style="height: 75vh; overflow-y: auto; padding-right: 10px;">

                                            <!-- Template 1 -->
                                            <div x-show="template === 'template1'" x-cloak x-transition.opacity>

                                                @include('resume.pdf', ['user' => $user])

                                            </div>

                                            <!-- Template 2 -->
                                            <div x-show="template === 'template2'" x-cloak x-transition.opacity>

                                                @include('resume.pdf3', ['user' => $user])

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('/user/resume/' . auth()->id() . '/download') }}" class="btn color-accent btn-sm">
                        <i class="bi bi-download me-1"></i> CV Download
                    </a>

                </div>

            </div>

        </div>

        <div class="tab-component mt-4" x-data="tabComponent('personal')" @go-to-tab.window="activeTab = $event.detail">

            <div class="tab-list" role="tablist">
                <template x-for="tab in tabs" :key="tab.id">
                    <button class="tab-btn" :class="{ 'active': activeTab === tab.id }" @click="activeTab = tab.id"
                        role="tab" :aria-selected="activeTab === tab.id" x-text="tab.label">
                    </button>
                </template>
            </div>

            <div class="tab-content">
                <template x-for="tab in tabs" :key="tab.id">
                    <div class="tab-panel" x-show="activeTab === tab.id" x-transition.opacity.duration.200ms
                        role="tabpanel">

                        <template x-if="tab.id === 'personal'">
                            <div class="nested-component-box" x-data="{ childCounter: 0 }">
                                <x-profilepage.personal-info :profile="$profile" />
                            </div>
                        </template>

                        <template x-if="tab.id === 'education'">
                            <div class="nested-component-box" x-data="settingsForm()">
                                <x-profilepage.education :education="$education" :training="$training" />
                            </div>
                        </template>

                        <template x-if="tab.id === 'exprience'">
                            <div class="nested-component-box" x-data="{ textInput: '' }">
                                <x-profilepage.exprience :experience="$experience" />
                            </div>
                        </template>

                        <template x-if="tab.id === 'achievement'">
                            <div class="nested-component-box" x-data="settingsForm()">
                                <x-profilepage.achievement :achivement="$achivement" />
                            </div>
                        </template>

                    </div>
                </template>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            // Parent Tab Component Data
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

            // A distinct child component example (Settings form)
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
