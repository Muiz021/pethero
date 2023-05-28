@extends('admin.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('back/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush

@section('content')
@section('title', 'Kirim Hewan')

{{-- sweetalert --}}
@include('sweetalert::alert')
{{-- end sweetalert --}}
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Kirim Hewan</h4>

    <div class="card">
        <div class="card-header flex-column flex-md-row">
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top" id="user">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pengirim</th>
                            <th>tanggal</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kirim_hewan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_pengirim }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>
                                    @if ($item->status == "true" )
                                    <div class="bg-success" style="border-radius: 10px;width:100px">
                                        <p class="my-1 mx-3 text-white"><b>Berhasil</b></p>
                                    </div>
                                    @else
                                    <div class="bg-warning" style="border-radius: 10px;width:100px">
                                        <p class="my-1 mx-3 text-white"><b>Proses</b></p>
                                    </div>
                                    @endif

                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal"
                                    data-bs-target="#delete-modal-{{ $item->id }}"><span><i
                                            class="bx bx-trash me-sm-2"></i> <span
                                            class="d-none d-sm-inline-block">Hapus</span></span>
                                </button>

                                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                    data-bs-target="#edit-modal-{{ $item->id }}"><span><i class='bx bxs-edit me-sm-2'></i> <span
                                            class="d-none d-sm-inline-block">Perbarui</span></span>
                                </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin.pages.kirim-hewan.modal')
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
