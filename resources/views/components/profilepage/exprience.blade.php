<div x-data="{
    experienceList: @js($experience ?? []),
}" class="my-4">

    <form action="{{ route('experience.storeAll') }}" method="POST">
        @csrf

        <!-- HEADER -->
        <div class="d-flex align-items-center justify-content-between p-3 bg-dark rounded-top-3 text-light">

            <h5 class="mb-0 fs-6 fw-semibold">
                <i class="bi bi-briefcase me-2"></i>Work Experience
            </h5>

            <button type="button" class="btn btn-sm px-3 rounded-pill text-white"
                @click="experienceList.push({
                    id: null,
                    job_title: '',
                    company_name: '',
                    employment_type: 'Full-time',
                    location: '',
                    start_date: '',
                    end_date: '',
                    is_current: false,
                    description: ''
                })">

                <i class="bi bi-plus-lg me-1"></i> Add Experience
            </button>

        </div>

        <!-- BODY -->
        <div class="p-3 rounded-bottom-3">

            <template x-if="experienceList.length === 0">
                <div class="text-center py-4 text-muted small bg-dark rounded">
                    <i class="bi bi-briefcase fs-2 d-block mb-2 text-secondary"></i>
                    No experience added yet. Click "Add Experience".
                </div>
            </template>

            <template x-for="(e, index) in experienceList" :key="index">

                <div class="p-4 bg-dark rounded shadow-sm mb-4">

                    <!-- HEADER -->
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-2">

                        <div>
                            <span class="fw-bold fs-6">
                                Experience #<span x-text="index + 1"></span>
                            </span>

                            <template x-if="e.id">
                                <span class="badge bg-success-subtle text-success ms-2">Saved</span>
                            </template>

                            <template x-if="!e.id">
                                <span class="badge bg-warning-subtle text-warning ms-2">New</span>
                            </template>
                        </div>

                        <button type="button" class="btn-close" @click="experienceList.splice(index,1)"></button>
                    </div>

                    <input type="hidden" :name="'experience[' + index + '][id]'" x-model="e.id">

                    <div class="row g-3">

                        <!-- Job Title -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Job Title</label>
                            <input type="text" class="form-control form-control-sm" x-model="e.job_title"
                                :name="'experience[' + index + '][job_title]'" placeholder="e.g. Full Stack Developer">
                        </div>

                        <!-- Company -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Company Name</label>
                            <input type="text" class="form-control form-control-sm" x-model="e.company_name"
                                :name="'experience[' + index + '][company_name]'"
                                placeholder="e.g. Google / Startup Ltd">
                        </div>

                        <!-- Employment Type -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Employment Type</label>
                            <select class="form-select form-select-sm" x-model="e.employment_type"
                                :name="'experience[' + index + '][employment_type]'">
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Contract">Contract</option>
                                <option value="Internship">Internship</option>
                                <option value="Freelance">Freelance</option>
                            </select>
                        </div>

                        <!-- Location -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Location</label>
                            <input type="text" class="form-control form-control-sm" x-model="e.location"
                                :name="'experience[' + index + '][location]'"
                                placeholder="e.g. Dhaka, Bangladesh / Remote">
                        </div>

                        <!-- Start Date -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Start Date</label>
                            <input type="date" class="form-control form-control-sm" x-model="e.start_date"
                                :name="'experience[' + index + '][start_date]'">
                        </div>

                        <!-- End Date -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">End Date</label>
                            <input type="date" class="form-control form-control-sm" x-model="e.end_date"
                                :name="'experience[' + index + '][end_date]'" :disabled="e.is_current">
                        </div>

                        <!-- Current Job -->
                        <div class="col-12">
                            <div class="form-check text-light">
                                <input class="form-check-input" type="checkbox" x-model="e.is_current"
                                    :name="'experience[' + index + '][is_current]'">

                                <label class="form-check-label">
                                    I currently work here
                                </label>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <label class="form-label text-muted small fw-semibold">Description</label>
                            <textarea rows="3" class="form-control form-control-sm" x-model="e.description"
                                :name="'experience[' + index + '][description]'"
                                placeholder="Describe your role, responsibilities, achievements..."></textarea>
                        </div>

                    </div>

                </div>

            </template>

            <!-- SAVE BUTTON -->
            <div x-show="experienceList.length > 0" class="d-flex justify-content-end mt-3 pt-3">

                <button type="submit" class="button">
                    <i class="bi bi-cloud-arrow-up me-1"></i> Save All Experience
                </button>

            </div>

        </div>
    </form>

</div>
