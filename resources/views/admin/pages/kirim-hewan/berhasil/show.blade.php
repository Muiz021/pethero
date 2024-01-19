@extends('admin.base')

@section('content')
    @php
        use Carbon\Carbon;
        use App\Models\User;

        $user = User::where('id', $data->id_user)->first();
    @endphp

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Kirim Hewan</h4>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Bukti Transafer</label>
                    <a href="{{ $data->gambar }}" class="form-control btn btn-primary" target="_blank"
                        rel="noopener noreferrer">Gambar</a>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Pengirim</label>
                    <input type="text" class="form-control" value="{{ $data->nama_pengirim }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Pengirim</label>
                    <input type="text" class="form-control"
                        value="{{ Carbon::parse($data->tanggal)->isoFormat('dddd, DD MMMM YYYY') }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Metode Pembayaran</label>
                    <input type="text" class="form-control" value="{{ $data->metode_pembayaran }}" readonly>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Status Pembayaran</label>
                    <input type="text" class="form-control"
                        value="{{ $data->status_pembayaran == 'true' ? 'berhasil' : 'proses' }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Status Pengiriman</label>
                    <input type="text" class="form-control"
                        value="{{ $data->status_pengiriman == 'true' ? 'berhasil' : 'proses' }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" cols="30" rows="8" readonly>{{ $data->deskripsi_hewan }}</textarea>
                </div>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a href="{{route('berhasil.index')}}" class="btn btn-secondary">Tutup</a>
                </div>
            </div>
        </div>
    </div>
@endsection
