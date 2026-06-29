@extends('layouts.profile')

@section('content')
    <div class="text-light rounded border-0 shadow-sm p-4" style="background:#000;">

        {{-- HEADER --}}
        <div class="border-bottom font-sans border-secondary pb-3 mb-4 bg-black">
            <h5 class="mb-1 fw-semibold">Profile preference</h5>
            <small class="text-muted">
                Manage your visibility, availability, and video CV settings.
            </small>
        </div>

        {{-- INNER SECTION (FULL BLACK FIX) --}}
        <div class="p-4 rounded-3 bg-dark" style="border:1px solid rgba(255,255,255,0.06);">

            <div class="mb-3">
                <h6 class="text-uppercase font-sans fw-semibold" style="letter-spacing:1px;">
                    Profile visibility
                </h6>
                <p class="text-muted font-sans small mb-0">
                    Control who can discover and view your CV.
                </p>
            </div>

            {{-- OPTIONS --}}
            <div id="visibilityGroup" class="d-flex flex-column gap-2">

                {{-- PUBLIC --}}
                <button type="button"
                    class="btn text-start d-flex font-sans align-items-center justify-content-between p-3 border rounded-3 visibility-option active"
                    data-val="public" onclick="pickVisibility(this)"
                    style="background:#111; border-color:rgba(255,255,255,0.08);">

                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center"
                            style="width:40px;height:40px;background:#1a1a1a;border:1px solid rgba(255,255,255,0.06);">
                            <i class="bi bi-globe2 text-primary"></i>
                        </div>

                        <div>
                            <div class="fw-semibold text-light d-flex align-items-center gap-2">
                                Public
                                <span class="badge bg-primary">Recommended</span>
                            </div>
                            <small class="text-muted" style="font-size:12px;">
                                Employers can discover your profile and match you to jobs.
                            </small>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" checked>
                    </div>
                </button>

                {{-- PRIVATE --}}
                <button type="button"
                    class="btn text-start font-sans d-flex align-items-center justify-content-between p-3 border rounded-3 visibility-option"
                    data-val="private" onclick="pickVisibility(this)"
                    style="background:#111; border-color:rgba(255,255,255,0.08);">

                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center"
                            style="width:40px;height:40px;background:#1a1a1a;border:1px solid rgba(255,255,255,0.06);">
                            <i class="bi bi-lock text-secondary"></i>
                        </div>

                        <div>
                            <div class="fw-semibold text-light">
                                Private
                            </div>
                            <small class="text-muted" style="font-size:12px;">
                                Hidden from searches. Only visible to applied employers.
                            </small>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio">
                    </div>
                </button>

            </div>

            {{-- FOOTER --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-4 pt-3"
                style="border-top:1px solid rgba(255,255,255,0.06);">

                <small class="text-muted font-sans" id="visibilityStatus">
                    <i class="bi bi-check-circle-fill text-success me-1"></i>
                    Profile set to public
                </small>

                <button class="btn btn-primary font-sans px-4" id="saveBtn" onclick="saveVisibility()">
                    Save changes
                </button>

            </div>

        </div>


        <div class="p-4 mt-4 rounded-3 bg-dark" style="border:1px solid rgba(255,255,255,0.06);">

            <div class="mb-3">
                <h6 class="text-uppercase font-sans fw-semibold" style="letter-spacing:1px;">
                    Availability Status
                </h6>
                <p class="text-muted font-sans small mb-0">
                    Set your job availability: Yes to join immediately, No if not available right away
                </p>
            </div>

            {{-- OPTIONS --}}
            <div id="visibilityGroup" class="d-flex flex-column gap-2">

                {{-- YES --}}
                <button type="button"
                    class="btn text-start d-flex font-sans align-items-center justify-content-between p-3 border rounded-3 avality-option active2"
                    data-val="yes" onclick="pickAvailability(this)"
                    style="background:#111; border-color:rgba(255,255,255,0.08);">

                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center"
                            style="width:40px;height:40px;background:#1a1a1a;border:1px solid rgba(255,255,255,0.06);">
                            <i class="bi bi-check text-primary"></i>
                        </div>

                        <div>
                            <div class="fw-semibold text-light d-flex align-items-center gap-2">
                                Yes
                                <span class="badge bg-primary">Recommended</span>
                            </div>
                            <small class="text-muted" style="font-size:12px;">
                                Employer(s) will see that you can join immediately.
                            </small>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" checked>
                    </div>
                </button>

                {{-- NO --}}
                <button type="button"
                    class="btn text-start font-sans d-flex align-items-center justify-content-between p-3 border rounded-3 avality-option"
                    data-val="no" onclick="pickAvailability(this)"
                    style="background:#111; border-color:rgba(255,255,255,0.08);">

                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center"
                            style="width:40px;height:40px;background:#1a1a1a;border:1px solid rgba(255,255,255,0.06);">
                            <i class="bi bi-x text-secondary"></i>
                        </div>

                        <div>
                            <div class="fw-semibold text-light">
                                No
                            </div>
                            <small class="text-muted" style="font-size:12px;">
                                Employer(s) will see that you can’t join immediately.
                            </small>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio">
                    </div>
                </button>

            </div>

            {{-- FOOTER --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-4 pt-3"
                style="border-top:1px solid rgba(255,255,255,0.06);">

                <small class="text-muted font-sans" id="avalityStatus">
                    <i class="bi bi-check-circle-fill text-success me-1"></i>
                    Profile set to public
                </small>

                <button class="btn btn-primary font-sans px-4" id="saveBtn" onclick="saveVisibility()">
                    Save changes
                </button>

            </div>

        </div>
    </div>

    {{-- JS --}}
    <script>
        let currentVisibility = 'public';

        function pickVisibility(el) {
            document.querySelectorAll('.visibility-option').forEach(btn => {
                btn.classList.remove('active', 'border-primary');
            });

            el.classList.add('active', 'border-primary');

            currentVisibility = el.dataset.val;

            document.getElementById('visibilityStatus').innerHTML =
                `<i class="bi bi-check-circle-fill text-success me-1"></i>
             Profile set to ${currentVisibility}`;

            document.getElementById('saveBtn').classList.remove('btn-success');
            document.getElementById('saveBtn').classList.add('btn-primary');
            document.getElementById('saveBtn').innerText = 'Save changes';
        }

        function pickAvailability(el) {
            document.querySelectorAll('.avality-option').forEach(btn => {
                btn.classList.remove('active2', 'border-primary');
            });

            el.classList.add('active2', 'border-primary');

            currentVisibility = el.dataset.val;

            document.getElementById('avalityStatus').innerHTML =
                `<i class="bi bi-check-circle-fill text-success me-1"></i>
             Profile set to ${currentVisibility}`;

            document.getElementById('saveBtn').classList.remove('btn-success');
            document.getElementById('saveBtn').classList.add('btn-primary');
            document.getElementById('saveBtn').innerText = 'Save changes';
        }

        function saveVisibility() {
            const btn = document.getElementById('saveBtn');

            btn.classList.remove('btn-primary');
            btn.classList.add('btn-success');
            btn.innerText = 'Saved';

            setTimeout(() => {
                btn.classList.remove('btn-success');
                btn.classList.add('btn-primary');
                btn.innerText = 'Save changes';
            }, 2000);

            // TODO: AJAX call here
        }
    </script>
@endsection
