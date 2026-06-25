<div x-data="{ isEditing: false }" class="mt-4">

    <!-- HEADER -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h5 class="mb-0 fw-semibold">Personal Information</h5>

        <button type="button" class="button" @click="isEditing = !isEditing">

            <span x-show="!isEditing">
                <i class="bi bi-pencil me-1"></i> Edit
            </span>

            <span x-show="isEditing" style="display:none;">
                <i class="bi bi-x-lg me-1"></i> Cancel
            </span>

        </button>
    </div>

    <!-- =========================
            VIEW MODE
    ========================== -->
    <div x-show="!isEditing" x-transition>

        <div class="row g-4">
            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    First Name
                </label>
                <div>{{ $profile[0]->first_name ?? 'MD' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Last Name
                </label>
                <div>{{ $profile[0]->last_name ?? 'Naimul Islam' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Father's Name
                </label>
                <div>{{ $profile[0]->fathers_name ?? 'MD. Anwar' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Mother's Name
                </label>
                <div>{{ $profile[0]->mothers_name ?? 'Mrs. Shahida Parvin' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Date of Birth
                </label>
                <div>{{ $profile[0]->dob ?? '22 Sep 2001' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Gender
                </label>
                <div>{{ $profile[0]->gender ?? 'Male' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Religion
                </label>
                <div>{{ $profile[0]->religion ?? 'Islam' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Marital Status
                </label>
                <div>{{ $profile[0]->marital_status ?? 'Unmarried' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Nationality
                </label>
                <div>{{ $profile[0]->nationality ?? 'Bangladeshi' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    National ID
                </label>
                <div>{{ $profile[0]->nid ?? '1031871476' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Passport Number
                </label>
                <div>{{ $profile[0]->passport_no ?? '---' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Passport Issue Date
                </label>
                <div>{{ $profile[0]->passport_issue_date ?? '---' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Primary Mobile
                </label>
                <div>{{ $profile[0]->primary_mobile ?? '01879212420' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Secondary Mobile
                </label>
                <div>{{ $profile[0]->secondary_mobile ?? '---' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Email
                </label>
                <div>{{ $profile[0]->email ?? 'naimul@gmail.com' }}</div>
            </div>

            <div class="col-md-6">
                <label class="small text-muted d-block mb-1">
                    Alternate Email
                </label>
                <div>{{ $profile[0]->alternate_email ?? '---' }}</div>
            </div>

        </div>

    </div>

    <!-- =========================
            EDIT MODE
    ========================== -->
    <div x-show="isEditing" x-transition style="display:none;">

        <form action="{{ route('profile.edit') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="formControl"
                        value="{{ old('first_name', $profile[0]->first_name) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="formControl"
                        value="{{ old('last_name', $profile[0]->last_name) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Father's Name</label>
                    <input type="text" name="fathers_name" class="formControl"
                        value="{{ old('fathers_name', $profile[0]->fathers_name) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Mother's Name</label>
                    <input type="text" name="mothers_name" class="formControl"
                        value="{{ old('mothers_name', $profile[0]->mothers_name) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="dob" class="formControl"
                        value="{{ old('dob', isset($profile[0]->dob) ? \Carbon\Carbon::parse($profile[0]->dob)->format('Y-m-d') : '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Gender</label>

                    <select name="gender" class="formControl">

                        <option value="Male" {{ old('gender', $profile[0]->gender) == 'Male' ? 'selected' : '' }}>
                            Male
                        </option>

                        <option value="Female" {{ old('gender', $profile[0]->gender) == 'Female' ? 'selected' : '' }}>
                            Female
                        </option>

                        <option value="Other" {{ old('gender', $profile[0]->gender) == 'Other' ? 'selected' : '' }}>
                            Other
                        </option>

                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Religion</label>
                    <input type="text" name="religion" class="formControl"
                        value="{{ old('religion', $profile[0]->religion) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Marital Status</label>
                    <input type="text" name="marital_status" class="formControl"
                        value="{{ old('marital_status', $profile[0]->marital_status) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nationality</label>
                    <input type="text" name="nationality" class="formControl"
                        value="{{ old('nationality', $profile[0]->nationality) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">NID</label>
                    <input type="text" name="nid" class="formControl"
                        value="{{ old('nid', $profile[0]->nid) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Passport Number</label>
                    <input type="text" name="passport_no" class="formControl"
                        value="{{ old('passport_no', $profile[0]->passport_no) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Passport Issue Date</label>
                    <input type="date" name="passport_issue_date" class="formControl"
                        value="{{ old('passport_issue_date', $profile[0]->passport_issue_date) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Secondary Mobile</label>
                    <input type="text" name="secondary_mobile" class="formControl"
                        value="{{ old('secondary_mobile', $profile[0]->secondary_mobile) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Alternate Email</label>
                    <input type="email" name="alternate_email" class="formControl"
                        value="{{ old('alternate_email', $profile[0]->alternate_email) }}">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Bio</label>
                    <textarea style="height: 200px;" rows="10" type="text" name="bio" class="formControl"
                        value="{{ old('bio', $profile[0]->bio) }}">
                    </textarea>
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">

                <button type="button" class="btn btn-outline-secondary" @click="isEditing = false">
                    Cancel
                </button>

                <button type="submit" class="button">
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>
