@extends('layouts.profile')
@section('content')
    <div>
        <div class="card card-black text-light p-3">
            <h4 class="text-bebas">Bee Info Jobs Profile</h4>
            <p class="text-fira fs-6 text-muted">Update your BeeInfo profile anytime. Stay ready for the next opportunity.
            </p>
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
                                <x-profilepage.education :education="$education" />
                            </div>
                        </template>

                        <template x-if="tab.id === 'exprience'">
                            <div class="nested-component-box" x-data="{ textInput: '' }">
                                <x-profilepage.exprience />
                            </div>
                        </template>

                        <template x-if="tab.id === 'achievement'">
                            <div class="nested-component-box" x-data="settingsForm()">
                                <x-profilepage.achievement />
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
