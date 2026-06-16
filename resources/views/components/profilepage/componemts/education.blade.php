<div x-data="{
    educationList: [],

    // Helper function to append a new empty data schema entry row
    addEducation() {
        this.educationList.push({
            degree: '',
            institution: '',
            passing_year: '',
            result: ''
        });
    },

    // Helper function to remove a specific form entry row if a user changes their mind
    removeEducation(index) {
        this.educationList.splice(index, 1);
    }
}" class="my-4">

    <form method="POST">
        @csrf

        <div class="d-flex align-items-center justify-content-between p-3 bg-dark rounded-top-3 text-light">
            <h5 class="mb-0 fs-6 fw-semibold">Education History</h5>

            <button type="button" class="button" @click="addEducation()">
                <i class="bi bi-plus-lg me-1"></i> Add Education
            </button>
        </div>

        <div class="p-3 rounded-bottom-3">
            <template x-if="educationList.length === 0">
                <div class="text-center py-4 text-muted small">
                    <i class="bi bi-mortarboard fs-3 d-block mb-2 text-secondary"></i>
                    No education records added yet. Click "Add Education" to append a record form window block.
                </div>
            </template>

            <template x-for="(edu, index) in educationList" :key="index">
                <div class="p-3 bg-dark rounded shadow-sm mb-3 position-relative">

                    <div class="d-flex justify-content-between align-items-center mb-3 pb-2 ">
                        <span class="fw-bold text-secondary small">Record #<span x-text="index + 1"></span></span>
                        <button type="button" class="btn-close text-danger small" style="font-size: 0.75rem;"
                            @click="removeEducation(index)"></button>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Degree / Certification</label>
                            <input type="text" name="education[][degree]" x-model="edu.degree"
                                class="form-control form-control-sm" required placeholder="e.g. Bachelor of Science">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Institution / University</label>
                            <input type="text" name="education[][institution]" x-model="edu.institution"
                                class="form-control form-control-sm" required placeholder="e.g. Dhaka University">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Passing Year</label>
                            <input type="number" name="education[][passing_year]" x-model="edu.passing_year"
                                class="form-control form-control-sm" required placeholder="e.g. 2023">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Result / GPA</label>
                            <input type="text" name="education[][result]" x-model="edu.result"
                                class="form-control form-control-sm" required placeholder="e.g. 3.75">
                        </div>
                    </div>
                </div>
            </template>

            <div x-show="educationList.length > 0" x-transition class="d-flex justify-content-end mt-3 pt-3 border-top border-secondary">
                <button type="submit" class="button">
                    <i class="bi bi-check-circle me-1"></i> Save All
                </button>
            </div>
        </div>
    </form>
</div>
