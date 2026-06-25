@extends('layouts.dashboard')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid mt-5">
                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">
                        <i class="ti ti-brain"></i> Skill Management
                    </h4>

                    <button class="btn-gold" data-bs-toggle="modal" data-bs-target="#skillModal">
                        <i class="ti ti-plus"></i> Add Skill
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">

                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Skill Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($skills as $key => $skill)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        <strong>{{ $skill->name ?? '-' }}</strong>
                                    </td>

                                    <td>
                                        {{ $skill->description ?? '-' }}
                                    </td>

                                    <td>
                                        {{-- @if ($skill->is_active)
                                                    <span class="badge bg-success">
                                                        Active
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary">
                                                        Inactive
                                                    </span>
                                                @endif --}}
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">
                                            Edit
                                        </a>

                                        <form action="#" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        No skills found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>


    </div>

    <!-- ADD SKILL MODAL -->

    <div class="modal fade" id="skillModal" tabindex="-1" aria-labelledby="skillModalLabel" aria-hidden="true">

        ```
        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content bg-dark">

                <!-- HEADER -->
                <div class="modal-header">
                    <h5 class="modal-title" id="skillModalLabel">
                        Add Skill
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <!-- FORM -->
                <form action="/" method="POST">

                    @csrf

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">
                                Skill Name
                            </label>

                            <input type="text" name="name" class="form-control" placeholder="Enter skill name"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description" rows="4" class="form-control" placeholder="Enter description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Status
                            </label>

                            <select name="is_active" class="form-select">

                                <option value="1">
                                    Active
                                </option>

                                <option value="0">
                                    Inactive
                                </option>

                            </select>
                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" class="btn-gold">
                            Save Skill
                        </button>

                    </div>

                </form>

            </div>

        </div>


    </div>
@endsection
