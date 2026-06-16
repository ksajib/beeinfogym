<div x-data="{
    educationList: @js($educationRecords ?? []),

    // Add a fresh form block pre-configured with your exact table schema defaults
    addEducation() {
        this.educationList.push({
            id: null,
            institution: '',
            degree: '',
            field: '',
            result: '',
            grade_system: 'GPA',
            start_date: '',
            end_date: '',
            is_current: false,
            description: ''
        });
    },

    // Quick-remove an item row from the screen array list
    removeEducation(index) {
        this.educationList.splice(index, 1);
    }
}" class="my-4">

    <form action="{{ route('education.storeAll') }}" method="POST">
        @csrf

        <div class="d-flex align-items-center justify-content-between p-3 bg-dark rounded-top-3 text-light">
            <h5 class="mb-0 fs-6 fw-semibold"><i class="bi bi-mortarboard me-2"></i>Education Information</h5>

            <button type="button" class="btn btn-sm px-3 rounded-pill text-white" @click="addEducation()">
                <i class="bi bi-plus-lg me-1"></i> Add Education
            </button>
        </div>

        <div class="p-3 rounded-bottom-3">

            <template x-if="educationList.length === 0">
                <div class="text-center py-4 text-muted small bg-dark rounded">
                    <i class="bi bi-folder-x fs-2 d-block mb-2 text-secondary"></i>
                    No education records defined. Click "Add Education" to append data entry fields.
                </div>
            </template>

            <template x-for="(edu, index) in educationList" :key="index">
                <div class="p-4 bg-dark rounded shadow-sm mb-4 position-relative">

                    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 ">
                        <div>
                            <span class="fw-bold fs-6">Record #<span x-text="index + 1"></span></span>
                            <template x-if="edu.id">
                                <span
                                    class="badge bg-success-subtle text-success border border-success-subtle ms-2 px-2"
                                    style="font-size: 0.7rem;">Saved</span>
                            </template>
                            <template x-if="!edu.id">
                                <span
                                    class="badge bg-warning-subtle text-warning border border-warning-subtle ms-2 px-2"
                                    style="font-size: 0.7rem;">New Row</span>
                            </template>
                        </div>
                        <button type="button" class="btn-close text-danger" style="font-size: 0.8rem;"
                            @click="removeEducation(index)"></button>
                    </div>

                    <input type="hidden" :name="'education[' + index + '][id]'" x-model="edu.id">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Institution / University Name</label>
                            <input type="text" :name="'education[' + index + '][institution]'"
                                x-model="edu.institution" class="form-control form-control-sm" required
                                placeholder="e.g. Dhaka University">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Degree / Certification Title</label>
                            <input type="text" :name="'education[' + index + '][degree]'" x-model="edu.degree"
                                class="form-control form-control-sm" required placeholder="e.g. Bachelor of Science">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted small fw-semibold">Field / Department of Study</label>
                            <input type="text" :name="'education[' + index + '][field]'" x-model="edu.field"
                                class="form-control form-control-sm" placeholder="e.g. Computer Science">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted small fw-semibold">Grading System</label>
                            <select :name="'education[' + index + '][grade_system]'" x-model="edu.grade_system"
                                class="form-select form-select-sm">
                                <option value="GPA">GPA Scale (4.00)</option>
                                <option value="CGPA">CGPA Scale (5.00)</option>
                                <option value="Percentage">Percentage (%)</option>
                                <option value="Division">Traditional Division</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted small fw-semibold">Result Achieved</label>
                            <input type="text" :name="'education[' + index + '][result]'" x-model="edu.result"
                                class="form-control form-control-sm" placeholder="e.g. 3.85">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted small fw-semibold">Session Start Date</label>
                            <input type="date" :name="'education[' + index + '][start_date]'"
                                x-model="edu.start_date" class="form-control form-control-sm">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted small fw-semibold">Graduation / End Date</label>
                            <input type="date" :name="'education[' + index + '][end_date]'" x-model="edu.end_date"
                                class="form-control form-control-sm" :disabled="edu.is_current">
                        </div>

                        <div class="col-md-4 d-flex align-items-end mb-2">
                            <div class="form-check">
                                <input type="hidden" :name="'education[' + index + '][is_current]'" value="0">
                                <input type="checkbox" :name="'education[' + index + '][is_current]'" value="1"
                                    x-model="edu.is_current" :id="'current_' + index" class="form-check-input">
                                <label class="form-check-label text- small fw-medium" :for="'current_' + index">
                                    I am currently studying here
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label text-muted small fw-semibold">Description / Notes</label>
                            <textarea :name="'education[' + index + '][description]'" x-model="edu.description"
                                class="form-control form-control-sm" rows="2"
                                placeholder="Mention additional details, honors, or thesis information..."></textarea>
                        </div>

                    </div>
                </div>
            </template>

            <div x-show="educationList.length > 0" x-transition class="d-flex justify-content-end mt-3 pt-3 border-top">
                <button type="submit" class="btn btn-primary btn-sm px-4 shadow-sm" >
                    <i class="bi bi-cloud-arrow-up me-1"></i> Save All Education Changes
                </button>
            </div>
        </div>
    </form>
</div>
