@extends('front.base')

@section('content')
@section('title', 'Detail Transaksi')
{{-- sweetalert --}}
@include('sweetalert::alert')
{{-- end sweetalert --}}

@php
    use Carbon\Carbon;
@endphp

<section id="hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12" style="padding: 0;">
                <div class="content pb-5">
                    <div class="text-atas-kirim-hewan position-relative pt-lg-3 pt-3">
                        <h2>Kirim Hewan</h2>
                        <p>Mencari jasa pengiriman yang aman dan nyaman untuk hewan peliharaan Anda? Anda telah datang
                            ke tempat
                            yang
                            tepat. Kami menawarkan jasa pengiriman hewan yang didesain khusus untuk memenuhi kebutuhan
                            hewan
                            peliharaan
                            Anda.
                            <br>
                            Kami juga akan bekerja sama dengan Anda untuk memastikan bahwa hewan peliharaan Anda sampai
                            tepat waktu
                            dan
                            dalam kondisi yang baik di tempat tujuan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="detail-kirim-hewan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12" style="padding: 0;">
                <div class="content">
                    <div class="card mx-4 px-3">
                        <h2 class="text-center text-uppercase mb-4">Detail Transaksi</h2>
                        <div class="d-flex justify-content-between mt-3">
                            <span>Tanggal Transaksi</span>
                            <span><b>{{ Carbon::parse($kirim_hewan->created_at)->isoFormat('dddd, D MMMM YYYY') }}</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Kategori Produk</span>
                            <span><b>Kirim Hewan</b></span>
                        </div>
                        <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2" alt="">
                        <div class="d-flex justify-content-start">
                            <span><b>Detail Lokasi</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="w-50">Jadwal Pengiriman</span>
                            <span
                                class="w-50"><b>{{ Carbon::parse($kirim_hewan->tanggal)->isoFormat('dddd, D MMMM YYYY') }}</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="w-50">Label Rumah</span>
                            <span class="w-50"><b>{{ $lokasi->label_alamat }}</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="w-50">Alamat</span>
                            <span class="w-50"><b>{{ $lokasi->alamat }}</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="w-50">Nama Penerima</span>
                            <span class="w-50"><b>{{ $lokasi->nama_penerimaan }}</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="w-50">Catatan Driver</span>
                            <span class="w-50"><b>{{ $lokasi->catatan_driver }}</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="w-50">Nomor Ponsel</span>
                            <span class="w-50"><b>{{ $lokasi->nomor_ponsel }}</b></span>
                        </div>
                        <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2" alt="">
                        <div class="d-flex justify-content-start">
                            <span><b>Detail Pengiriman</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="w-50">Nama Kurir</span>
                            <span class="w-50"><b>{{ $kirim_hewan->nama_pengirim }}</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="w-50">Deskripsi Pengirim</span>
                            <span class="w-50"><b>{{ $kirim_hewan->deskripsi_hewan }}</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="w-50">Jenis Kadang</span>
                            <span class="w-50"><b>{{ $kirim_hewan->jenis_kandang->nama }}</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="w-50">Jenis Pengiriman</span>
                            <span class="w-50"><b>{{ $kirim_hewan->jenis_pengiriman->nama }}</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="w-50">Jenis Asuransi</span>
                            <span class="w-50"><b>{{ $kirim_hewan->jenis_asuransi->nama }}</b></span>
                        </div>
                        <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2" alt="">
                        @if ($kirim_hewan->status_pengiriman == 'true')
                            <div class="d-flex justify-content-between">
                                <span class="w-50">Status pengiriman</span>
                                <span><b class="text-success">Berhasil</b></span>
                            </div>
                            <div class="d-flex justify-content-end my-3">
                                <a href="{{ route('riwayat_pengiriman_kurir') }}" class="btn btn-danger"
                                    style="width: 100px; border-radius:5px;">Riwayat</a>
                            </div>
                        @else
                            <div class="d-flex justify-content-between mb-3">
                                <span class="w-50">Status pengiriman</span>
                                <form action="{{ route('update-status-pengiriman', $kirim_hewan->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-3">
                                            <select class="form-select" name="status_pengiriman">
                                                <option value="" selected>Silahkan Pilih</option>
                                                <option value="false" {{ $kirim_hewan == 'false' ? 'selected' : '' }}>
                                                    Proses
                                                </option>
                                                <option value="true" {{ $kirim_hewan == 'true' ? 'selected' : '' }}>
                                                    Berhasil
                                                </option>
                                            </select>
                                            @error('status_pengiriman')
                                                <div class="invalid-feedback">
                                                    <i class="bi bi-exclamation-circle-fill"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end my-3">
                                        <button class="btn btn-danger"
                                            style="width: 100px; border-radius:5px;">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
