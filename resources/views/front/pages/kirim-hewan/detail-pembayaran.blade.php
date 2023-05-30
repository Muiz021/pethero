@extends('front.base')

@section('content')
@section('title', 'Detail Pembayaran')
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
                    <p>Mencari jasa pengiriman yang aman dan nyaman untuk hewan peliharaan Anda? Anda telah datang ke tempat
                        yang
                        tepat. Kami menawarkan jasa pengiriman hewan yang didesain khusus untuk memenuhi kebutuhan hewan
                        peliharaan
                        Anda.
                        <br>
                        Kami juga akan bekerja sama dengan Anda untuk memastikan bahwa hewan peliharaan Anda sampai tepat waktu
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
                <h2 class="text-center text-uppercase mb-4">Detail Pembayaran</h2>
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
                    <span><b>Detail Pengiriman</b></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="w-50">Nama Pengirim</span>
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
                <div class="d-flex justify-content-start">
                    <span><b>Detail Lokasi</b></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="w-50">Jadwal Pengiriman</span>
                    <span class="w-50"><b>{{ Carbon::parse($kirim_hewan->tanggal)->isoFormat('dddd, D MMMM YYYY') }}</b></span>
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
                    <span><b>Rincian Pembayaran</b></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Status Pembayaran</span>
                    <div class="status">
                        @if ($kirim_hewan->status == 'false')
                        <span class="text-warning"><b>Transaksi Diproses</b></span>
                    @else
                    <span class="text-success"><b>Transaksi Berhasil</b></span>
                    @endif
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Metode Pembayaran</span>
                    <span><b>Virtual Account Bank</b></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Total Pembayaran</span>
                    <span><b>Rp.{{number_format($kirim_hewan->jenis_pengiriman->harga + $kirim_hewan->jenis_asuransi->harga,0,',','.')}}</b></span>
                </div>
                <div class="d-flex justify-content-end my-3">
                    <a href="{{route('front.riwayat-pengiriman')}}" class="btn btn-danger my-0" style="width: 100px; border-radius:5px;"><b>Riwayat</b></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection
