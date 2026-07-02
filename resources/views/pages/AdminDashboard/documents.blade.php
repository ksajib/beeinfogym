@extends('layouts.dashboard')

@section('content')
    <style>
        .bootbox .modal-content {
            background-color: #1e1e2f !important;
            color: #ffffff !important;
            border: 1px solid #333;
        }

        .bootbox .modal-header {
            border-bottom: 1px solid #333 !important;
        }

        .bootbox .modal-footer {
            border-top: 1px solid #333 !important;
        }

        .bootbox .bootbox-body {
            color: #e5e5e5 !important;
        }

        /* Buttons spacing fix */
        .bootbox .modal-footer .btn {
            border-radius: 6px;
        }
    </style>

    <div class="main-content app-content mt-0">

        <div class="side-app">
            <div class="main-container container-fluid mt-5">

                {{-- HEADER --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="text-white fw-bold d-flex align-items-center gap-2 mb-0">
                        <i class="ti ti-brain text-warning"></i>
                        Required Document Management
                    </h4>

                    <button class="btn-gold" data-bs-toggle="modal" data-bs-target="#addSkillModal">
                        + Add Required Document
                    </button>
                </div>

                {{-- TABLE --}}
                <div class="card bg-dark border-0">
                    <div class="table-responsive rounded">

                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Required Document</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($documents as $key => $benefit)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td class="text-white fw-semibold">
                                            {{ $benefit->name }}
                                        </td>

                                        <td>
                                            <span class="badge {{ $benefit->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $benefit->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>

                                        <td class="text-end">
                                            <form action="{{ url('/admin/required-documents/' . $benefit->id) }}"
                                                method="POST" class="delete-form d-inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn-primary-cta btn-delete">
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

                <form action="{{ url('/admin/required-documents') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Add Required Document</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Document Name</label>
                            <input type="text" name="name" class="form-control bg-dark text-white" required>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();

            let form = $(this).closest('form');

            bootbox.confirm({
                title: "<span style='color:#fff'>Confirm Delete</span>",
                message: "<span style='color:#ccc'>Are you sure you want to delete this Required Document?</span>",
                buttons: {
                    confirm: {
                        label: '<i class="fa fa-check"></i> Yes, Delete',
                        className: 'btn-primary-cta'
                    },
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel',
                        className: 'btn-primary-cta'
                    }
                },
                callback: function(result) {
                    if (result) {
                        form.submit();
                    }
                }
            });
        });
    </script>
@endsection
