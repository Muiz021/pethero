@extends('Front.base')
@section('content')
@section('title', 'Riwayat Pengiriman')

@php
    use Carbon\Carbon;
@endphp

<section id="riwayat-pembayaran">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12" style="padding:0;">
                <div class="content py-5">
                    @foreach ($data as $item)
                        <a href="{{ route('front.detail-pembayaran', $item->id) }}" class="text-decoration-none ">
                            <div class="card mx-3 my-4 py-2 px-3">
                                <div class="d-flex justify-content-between">
                                    <div class="driver">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('front/img/detail-pembayaran/driver.png') }}"
                                                width="40px" class="me-2" alt="">
                                            <h5>{{ $item->nama_pengirim }}</h5>
                                        </div>
                                    </div>
                                    <p><b>{{ Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM YYYY') }}</b></p>
                                </div>
                                <div class="d-flex justify-content-between my-3">
                                    <div class="d-flex menu-alamat">
                                        <img src="{{ asset('front/img/detail-pembayaran/box.png') }}" width="50px"
                                            alt="">
                                        <div class="text-deskripsi ms-2">
                                            <h5>Pengiriman Hewan</h5>
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                                </svg>
                                                @foreach ($lokasi as $alamat)
                                                    @if ($alamat->id == $item->id_detail_lokasi)
                                                        <span>{{ Str::limit($alamat->alamat, 30) }}</span>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <p><b>Rp.{{ number_format($item->jenis_pengiriman->harga, 0, ',', '.') }}</b></p>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="d-flex menu-asuransi">
                                        <div class="d-flex">
                                            <img src="{{ asset('front/img/detail-pembayaran/shield.png') }}"
                                                width="45px" height="45px" alt="">
                                        </div>
                                        @php
                                            $i = 0;
                                        @endphp
                                        <div class="text-deskripsi ms-2">
                                            <h5>Asuransi Hewan</h5>
                                            <div class="d-block align-items-center">
                                                <p class="mb-0">{{ $i = +1 . '.' . $item->jenis_asuransi->nama }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p><b>Rp.{{ number_format($item->jenis_asuransi->harga, 0, ',', '.') }}</b></p>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    @if ($item->status == 'false')
                                        <div class="bg-warning" style="border-radius: 10px">
                                            <p class="my-1 mx-3 text-white"><b>Proses</b></p>
                                        </div>
                                    @else
                                        <div class="bg-success" style="border-radius: 10px">
                                            <p class="my-1 mx-3 text-white"><b>Berhasil</b></p>
                                        </div>
                                    @endif
                                    <div class="total">
                                        <div class="d-flex">
                                            <h5 class="me-2"><b>Total</b></h5>
                                            <span
                                                class="text-danger"><b>Rp.{{ number_format($item->jenis_pengiriman->harga + $item->jenis_asuransi->harga, 0, ',', '.') }}</b></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
