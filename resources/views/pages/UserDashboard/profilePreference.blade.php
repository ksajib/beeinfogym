@extends('layouts.profile')

@section('content')
    <div class="text-light rounded border-0 shadow-sm p-4" style="background:#000;">

        {{-- HEADER --}}
        <div class="border-bottom border-secondary pb-3 mb-4">
            <h5 class="mb-1 fw-semibold">Profile preference</h5>
            <small class="text-muted">
                Manage your visibility and availability settings.
            </small>
        </div>

        {{-- ================= VISIBILITY ================= --}}
        <div class="p-4 rounded-3 bg-dark mb-4" style="border:1px solid rgba(255,255,255,0.06);">

            <h6 class="text-uppercase fw-semibold" style="letter-spacing:1px;">
                Profile visibility
            </h6>

            <div id="visibilityGroup" class="d-flex flex-column gap-2 mt-3">

                {{-- PUBLIC --}}
                <button type="button"
                    class="btn text-start d-flex justify-content-between align-items-center p-3 border rounded-3 visibility-option active"
                    data-val="public" onclick="pickVisibility(this)"
                    style="background:#111; border-color:rgba(255,255,255,0.08);">

                    <div class="d-flex gap-3 align-items-center">
                        <i class="bi bi-globe2 text-primary fs-5"></i>
                        <div>
                            <div class="fw-semibold text-light">Public</div>
                            <small class="text-muted">Everyone can see your profile</small>
                        </div>
                    </div>

                    <input type="radio" checked>
                </button>

                {{-- PRIVATE --}}
                <button type="button"
                    class="btn text-start d-flex justify-content-between align-items-center p-3 border rounded-3 visibility-option"
                    data-val="private" onclick="pickVisibility(this)"
                    style="background:#111; border-color:rgba(255,255,255,0.08);">

                    <div class="d-flex gap-3 align-items-center">
                        <i class="bi bi-lock text-secondary fs-5"></i>
                        <div>
                            <div class="fw-semibold text-light">Private</div>
                            <small class="text-muted">Hidden from employers</small>
                        </div>
                    </div>

                    <input type="radio">
                </button>

            </div>

            <div class="mt-3 d-flex justify-content-between align-items-center">
                <small class="text-muted" id="visibilityStatus">
                    Visibility: public
                </small>

                <button class="btn btn-primary" id="saveBtnVisibility" onclick="saveVisibility()">
                    Save Visibility
                </button>
            </div>
        </div>

        {{-- ================= AVAILABILITY ================= --}}
        <div class="p-4 rounded-3 bg-dark" style="border:1px solid rgba(255,255,255,0.06);">

            <h6 class="text-uppercase fw-semibold" style="letter-spacing:1px;">
                Availability
            </h6>

            <div id="availabilityGroup" class="d-flex flex-column gap-2 mt-3">

                {{-- YES --}}
                <button type="button"
                    class="btn text-start d-flex justify-content-between align-items-center p-3 border rounded-3 avality-option active"
                    data-val="yes" onclick="pickAvailability(this)"
                    style="background:#111; border-color:rgba(255,255,255,0.08);">

                    <div class="d-flex gap-3 align-items-center">
                        <i class="bi bi-check text-success fs-5"></i>
                        <div>
                            <div class="fw-semibold text-light">Yes</div>
                            <small class="text-muted">Available immediately</small>
                        </div>
                    </div>

                    <input type="radio" checked>
                </button>

                {{-- NO --}}
                <button type="button"
                    class="btn text-start d-flex justify-content-between align-items-center p-3 border rounded-3 avality-option"
                    data-val="no" onclick="pickAvailability(this)"
                    style="background:#111; border-color:rgba(255,255,255,0.08);">

                    <div class="d-flex gap-3 align-items-center">
                        <i class="bi bi-x text-danger fs-5"></i>
                        <div>
                            <div class="fw-semibold text-light">No</div>
                            <small class="text-muted">Not available now</small>
                        </div>
                    </div>

                    <input type="radio">
                </button>

            </div>

            <div class="mt-3 d-flex justify-content-between align-items-center">
                <small class="text-muted" id="availabilityStatus">
                    Availability: yes
                </small>

                <button class="btn btn-primary" id="saveBtnAvailability" onclick="saveAvailability()">
                    Save Availability
                </button>
            </div>
        </div>

    </div>

    {{-- ================= SCRIPT ================= --}}
    <script>
        let currentVisibility = 'public';
        let currentAvailability = 'yes';

        // VISIBILITY
        function pickVisibility(el) {
            document.querySelectorAll('#visibilityGroup .visibility-option').forEach(btn => {
                btn.classList.remove('active');
                btn.querySelector('input').checked = false;
            });

            el.classList.add('active');
            el.querySelector('input').checked = true;

            currentVisibility = el.dataset.val;

            document.getElementById('visibilityStatus').innerText =
                "Visibility: " + currentVisibility;
        }

        // AVAILABILITY
        function pickAvailability(el) {
            document.querySelectorAll('#availabilityGroup .avality-option').forEach(btn => {
                btn.classList.remove('active');
                btn.querySelector('input').checked = false;
            });

            el.classList.add('active');
            el.querySelector('input').checked = true;

            currentAvailability = el.dataset.val;

            document.getElementById('availabilityStatus').innerText =
                "Availability: " + currentAvailability;
        }

        // SAVE VISIBILITY
        function saveVisibility() {
            const btn = document.getElementById('saveBtnVisibility');

            btn.innerText = 'Saving...';

            fetch("{{ route('profile.visibility.update') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        visibility: currentVisibility
                    })
                })
                .then(res => res.json())
                .then((data) => {
                    showToast('success', 'Success', data.message)
                    btn.innerText = 'Saved';
                })
                .finally(() => {
                    setTimeout(() => btn.innerText = 'Save Visibility', 1500);
                });
        }

        // SAVE AVAILABILITY
        function saveAvailability() {
            const btn = document.getElementById('saveBtnAvailability');

            btn.innerText = 'Saving...';

            fetch("{{ route('profile.availability.update') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        availability: currentAvailability
                    })
                })
                .then(res => res.json())
                .then((data) => {
                    showToast('success', 'Success', data.message)
                    btn.innerText = 'Saved';
                })
                .finally(() => {
                    setTimeout(() => btn.innerText = 'Save Availability', 1500);
                });
        }
    </script>
@endsection
