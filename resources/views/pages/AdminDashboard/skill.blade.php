@extends('layouts.dashboard')

@section('content')
    <div class="main-content app-content mt-0">

        <div class="side-app">
            <div class="main-container container-fluid mt-5">

                {{-- HEADER --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="text-white fw-bold d-flex align-items-center gap-2 mb-0">
                        <i class="ti ti-brain text-warning"></i>
                        Skill Management
                    </h4>

                    <button class="btn-gold" data-bs-toggle="modal" data-bs-target="#addSkillModal">
                        + Add Skill
                    </button>
                </div>

                {{-- TABLE --}}
                <div class="card bg-dark border-0">
                    <div class="table-responsive">

                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Skill</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($skills as $key => $skill)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td class="text-white fw-semibold">
                                            {{ $skill->name }}
                                        </td>

                                        <td class="text-muted">
                                            {{ Str::limit($skill->description, 80) }}
                                        </td>

                                        <td>
                                            <span class="badge {{ $skill->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $skill->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>

                                        <td class="text-end">
                                            {{-- DELETE --}}
                                            <form action="{{ url('/admin/skill/' . $skill->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Delete this skill?')">
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
        </div>

    </div>

    {{-- ================= ADD MODAL ================= --}}
    <div class="modal fade" id="addSkillModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">

                <form action="{{ url('/admin/skill') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Add Skill</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Skill Name</label>
                            <input type="text" name="name" class="form-control bg-dark text-white" required>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control bg-dark text-white"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <select name="is_active" class="form-select bg-dark text-white">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn-gold">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    {{-- ================= EDIT MODALS ================= --}}
    {{-- @foreach ($skills as $skill)
        <div class="modal fade" id="editSkillModal{{ $skill->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-white">

                    <form action="{{ url('/skills/' . $skill->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-header">
                            <h5 class="modal-title">Edit Skill</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>Skill Name</label>
                                <input type="text" name="name" value="{{ $skill->name }}"
                                    class="form-control bg-dark text-white" required>
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control bg-dark text-white">{{ $skill->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Status</label>
                                <select name="is_active" class="form-select bg-dark text-white">
                                    <option value="1" {{ $skill->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$skill->is_active ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-warning">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    @endforeach --}}
@endsection
