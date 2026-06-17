<div x-data="{
    trainingList: []
}" class="my-4">

    <form action="{{ route('training.storeAll') }}" method="POST">
        @csrf

        <!-- HEADER -->
        <div class="d-flex align-items-center justify-content-between p-3 bg-dark rounded-top-3 text-light">

            <h5 class="mb-0 fs-6 fw-semibold">
                <i class="bi bi-mortarboard me-2"></i>Training Information
            </h5>

            <button type="button" class="btn btn-sm px-3 rounded-pill text-white"
                @click="trainingList.push({
                id: null,
                training_title: '',
                topic: '',
                institution_name: '',
                start_date: '',
                end_date: '',
                duration: '',
                duration_type: 'Days',
                location: '',
                result: '',
                grade: '',
                is_current: false,
                certificate_url: '',
                description: ''
            })">
                <i class="bi bi-plus-lg me-1"></i> Add Training
            </button>

        </div>

        <!-- BODY -->
        <div class="p-3 rounded-bottom-3">

            <template x-if="trainingList.length === 0">
                <div class="text-center py-4 text-muted small bg-dark rounded">
                    <i class="bi bi-folder-x fs-2 d-block mb-2 text-secondary"></i>
                    No training records defined. Click "Add Training".
                </div>
            </template>

            <template x-for="(t, index) in trainingList" :key="index">

                <div class="p-4 bg-dark rounded shadow-sm mb-4">

                    <!-- HEADER -->
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-2">

                        <div>
                            <span class="fw-bold fs-6">
                                Record #<span x-text="index + 1"></span>
                            </span>

                            <template x-if="t.id">
                                <span class="badge bg-success-subtle text-success ms-2">Saved</span>
                            </template>

                            <template x-if="!t.id">
                                <span class="badge bg-warning-subtle text-warning ms-2">New</span>
                            </template>
                        </div>

                        <button type="button" class="btn-close" @click="trainingList.splice(index,1)"></button>
                    </div>

                    <input type="hidden" :name="'training[' + index + '][id]'" x-model="t.id">

                    <div class="row g-3">

                        <!-- Training Title -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Training Title</label>
                            <input type="text" class="form-control form-control-sm" x-model="t.training_title"
                                :name="'training[' + index + '][training_title]'"
                                placeholder="e.g. Web Development Bootcamp">
                        </div>

                        <!-- Topic -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Topic</label>
                            <input type="text" class="form-control form-control-sm" x-model="t.topic"
                                :name="'training[' + index + '][topic]'" placeholder="e.g. MERN Stack">
                        </div>

                        <!-- Institution -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Institution Name</label>
                            <input type="text" class="form-control form-control-sm" x-model="t.institution_name"
                                :name="'training[' + index + '][institution_name]'" placeholder="e.g. Programming Hero">
                        </div>

                        <!-- Location -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Location</label>
                            <input type="text" class="form-control form-control-sm" x-model="t.location"
                                :name="'training[' + index + '][location]'" placeholder="e.g. Dhaka, Bangladesh">
                        </div>

                        <!-- Duration -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Duration</label>
                            <input type="text" class="form-control form-control-sm" x-model="t.duration"
                                :name="'training[' + index + '][duration]'" placeholder="e.g. 3">
                        </div>

                        <!-- Duration Type -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Duration Type</label>
                            <select class="form-select form-select-sm" x-model="t.duration_type"
                                :name="'training[' + index + '][duration_type]'">
                                <option value="Days">Days</option>
                                <option value="Weeks">Weeks</option>
                                <option value="Months">Months</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <label class="form-label text-muted small fw-semibold">Description</label>
                            <textarea rows="2" class="form-control form-control-sm" x-model="t.description"
                                :name="'training[' + index + '][description]'" placeholder="Write training details..."></textarea>
                        </div>

                    </div>

                </div>

            </template>

            <!-- SAVE BUTTON -->
            <div x-show="trainingList.length > 0" class="d-flex justify-content-end mt-3 pt-3">

                <button type="submit" class="button">
                    <i class="bi bi-cloud-arrow-up me-1"></i> Save All Training
                </button>

            </div>

        </div>
    </form>

</div>
