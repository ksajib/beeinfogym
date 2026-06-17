<div x-data="{
    achievementList: @js($achivement ?? []),
}" class="my-4">

    <form action="{{ route('achievement.storeAll') }}" method="POST">
        @csrf

        <!-- HEADER -->
        <div class="d-flex align-items-center justify-content-between p-3 bg-dark rounded-top-3 text-light">

            <h5 class="mb-0 fs-6 fw-semibold">
                <i class="bi bi-trophy me-2"></i>Achievements
            </h5>

            <button type="button" class="btn btn-sm px-3 rounded-pill text-white"
                @click="achievementList.push({
                    id: null,
                    title: '',
                    issuer: '',
                    date: '',
                    description: ''
                })">

                <i class="bi bi-plus-lg me-1"></i> Add Achievement
            </button>

        </div>

        <!-- BODY -->
        <div class="p-3 rounded-bottom-3">

            <template x-if="achievementList.length === 0">
                <div class="text-center py-4 text-muted small bg-dark rounded">
                    <i class="bi bi-trophy fs-2 d-block mb-2 text-secondary"></i>
                    No achievements added yet. Click "Add Achievement".
                </div>
            </template>

            <template x-for="(a, index) in achievementList" :key="index">

                <div class="p-4 bg-dark rounded shadow-sm mb-4">

                    <!-- HEADER -->
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-2">

                        <div>
                            <span class="fw-bold fs-6">
                                Achievement #<span x-text="index + 1"></span>
                            </span>

                            <template x-if="a.id">
                                <span class="badge bg-success-subtle text-success ms-2">Saved</span>
                            </template>

                            <template x-if="!a.id">
                                <span class="badge bg-warning-subtle text-warning ms-2">New</span>
                            </template>
                        </div>

                        <button type="button" class="btn-close" @click="achievementList.splice(index,1)"></button>
                    </div>

                    <input type="hidden" :name="'achievement[' + index + '][id]'" x-model="a.id">

                    <div class="row g-3">

                        <!-- Title -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Title</label>
                            <input type="text" class="form-control form-control-sm" x-model="a.title"
                                :name="'achievement[' + index + '][title]'" placeholder="e.g. Employee of the Year">
                        </div>

                        <!-- Issuer -->
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-semibold">Issuer</label>
                            <input type="text" class="form-control form-control-sm" x-model="a.issuer"
                                :name="'achievement[' + index + '][issuer]'"
                                placeholder="e.g. Google / LinkedIn / Company Name">
                        </div>

                        <!-- Date -->
                        <div class="col-md-12">
                            <label class="form-label text-muted small fw-semibold">Date</label>
                            <input type="date" class="form-control form-control-sm" x-model="a.date"
                                :name="'achievement[' + index + '][date]'">
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <label class="form-label text-muted small fw-semibold">Description</label>
                            <textarea rows="3" class="form-control form-control-sm" x-model="a.description"
                                :name="'achievement[' + index + '][description]'" placeholder="Describe your achievement..."></textarea>
                        </div>

                    </div>

                </div>

            </template>

            <!-- SAVE BUTTON -->
            <div x-show="achievementList.length > 0" class="d-flex justify-content-end mt-3 pt-3">

                <button type="submit" class="button">
                    <i class="bi bi-cloud-arrow-up me-1"></i> Save All Achievements
                </button>

            </div>

        </div>
    </form>

</div>
