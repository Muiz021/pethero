@extends('front.base')

@section('content')
@if ($kirim_hewan->status_pembayaran == 'true')
@section('title', 'Detail Transaksi')
@else
@section('title', 'Detail Pembayaran')
@endif
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
                        @if ($kirim_hewan->gambar != null)
                            <h2 class="text-center text-uppercase mb-4">Detail Transaksi</h2>
                        @else
                            <h2 class="text-center text-uppercase mb-4">Konfirmasi Pembayaran</h2>
                        @endif
                        <div class="d-flex justify-content-between mt-3">
                            <span>Tanggal Transaksi</span>
                            <span><b>{{ Carbon::parse($kirim_hewan->created_at)->isoFormat('dddd, D MMMM YYYY') }}</b></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Kategori Produk</span>
                            <span><b>Kirim Hewan</b></span>
                        </div>
                        @if ($kirim_hewan->gambar != null)
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
                            <div class="d-flex justify-content-between">
                                <span>Status Pengiriman</span>
                                <div class="status">
                                    @if ($kirim_hewan->status_pengiriman == 'true')
                                    <span class="text-success"><b>Berhasil</b></span>
                                    @else
                                    <span class="text-warning"><b>Diproses</b></span>
                                    @endif
                                </div>
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
                                <span><b>Rincian Pembayaran</b></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Status Pembayaran</span>
                                <div class="status">
                                    @if ($kirim_hewan->status_pembayaran == 'true')
                                    <span class="text-success"><b>Berhasil</b></span>
                                    @else
                                    <span class="text-warning"><b>Diproses</b></span>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Total Pembayaran</span>
                                <span><b>Rp.{{ number_format($kirim_hewan->jenis_pengiriman->harga + $kirim_hewan->jenis_asuransi->harga, 0, ',', '.') }}</b></span>
                            </div>
                            <div class="d-flex justify-content-end my-3">
                                <a href="{{ route('front.riwayat-pengiriman-member') }}" class="btn btn-danger my-0"
                                    style="width: 100px; border-radius:5px;"><b>Riwayat</b></a>
                            </div>
                        @else
                            <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2" alt="">
                            @if ($kirim_hewan->metode_pembayaran == 'bni')
                                <div class="d-flex justify-content-between">
                                    <span>Metode Pembayaran</span>
                                    <span><b>Bank BNI</b></span>
                                </div>
                                <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2"
                                    alt="">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Nomor Rekening</span>
                                    <div class="d-flex align-items-center">
                                        <input type="text" id="text-nomor-rekening" value="1353176634" disabled
                                            style="border:none ; width:100px; font-weight:bold; color:#000; background-color:#fff;">
                                        <button class="btn btn-danger d-flex align-items-center"
                                            style="width:40px; height:40px; border-radius:5px;" onclick="copyText()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                fill="currentColor" class="bi bi-files " viewBox="0 0 16 16">
                                                <path
                                                    d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
                                            </svg>
                                        </button>
                                        <script>
                                            function copyText() {
                                                var textToCopy = document.getElementById("text-nomor-rekening");
                                                textToCopy.select();
                                                textToCopy.setSelectionRange(0, 99999); // Untuk perangkat mobile

                                                document.execCommand("copy");

                                                alert("Teks berhasil disalin: " + textToCopy.value);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2"
                                    alt="">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Total Pembayaran</span>
                                    <div class="d-flex align-items-center">
                                        <input type="text" id="text-harga-pembayaran"
                                            value="Rp.{{ number_format($kirim_hewan->jenis_pengiriman->harga + $kirim_hewan->jenis_asuransi->harga, 0, ',', '.') }}"
                                            style="border:none ; width:100px; font-weight:bold; color:#000; background:#fff;" disabled>
                                        <button class="btn btn-danger d-flex align-items-center"
                                            style="width:40px; height:40px; border-radius:5px;" onclick="copyText()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                fill="currentColor" class="bi bi-files " viewBox="0 0 16 16">
                                                <path
                                                    d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
                                            </svg>
                                        </button>
                                        <script>
                                            function copyText() {
                                                var textToCopy = document.getElementById("text-harga-pembayaran");
                                                textToCopy.select();
                                                textToCopy.setSelectionRange(0, 99999); // Untuk perangkat mobile

                                                document.execCommand("copy");

                                                alert("Teks berhasil disalin: " + textToCopy.value);
                                            }
                                        </script>
                                    </div>
                                </div>
                            @else
                                <div class="d-flex justify-content-between">
                                    <span>Metode Pembayaran</span>
                                    <span><b>Gopay</b></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Nomor Rekening</span>
                                    <span><b>081343671284</b></span>
                                </div>
                            @endif
                            <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2">
                            <form action="{{route('front.upload-bukti-pembayaran',$kirim_hewan->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mt-2">
                                    <label for="gambar" class="form-label">Silahkan upload bukti pembayaranmu</label>
                                    <input type="file" class="form-control" id="gambar"
                                        name="gambar" value="{{ old('gambar') }}" required>
                                </div>
                                <div class="d-flex justify-content-end my-3">
                                    <button type="submit" class="btn btn-danger"
                                        style="width: 100px; border-radius:5px;">Kirim</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
