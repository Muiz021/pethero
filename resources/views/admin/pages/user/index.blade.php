@extends('admin.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('back/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">User</h4>

        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="text-end pt-3 pt-md-0">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-user">
                        <span><i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">Tambah
                                User</span></span>
                    </button>
                </div>
                <div class="card-datatable table-responsive">
                    <table class="datatables-users table border-top" id="user">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>Admin</td>
                                    <td>
                                        @if ($user->name == 'Administrator')
                                        Tidak Bisa diedit
                                        @else
                                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit-modal-{{ $user->id }}"><span><i
                                                        class="bx bx-edit me-sm-2"></i> <span
                                                        class="d-none d-sm-inline-block">Edit</span></span>
                                            </button>
                                            <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#delete-modal-{{ $user->id }}"><span><i
                                                        class="bx bx-trash me-sm-2"></i> <span
                                                        class="d-none d-sm-inline-block">Delete</span></span>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('admin.pages.user.modal')
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('back/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('back/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('back/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('back/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#user').DataTable({
                // Scroll options
                scrollY: '300px',
                scrollX: true,
            });
        });
    </script>
@endpush
