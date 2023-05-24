@extends('Front.base')
@section('content')
@section('title', 'Riwayat Pengiriman')

@php
    use Carbon\Carbon;
@endphp

<section id="tentang-kami">
    <div class="container pt-5">
        @foreach ($data as $item)
        <div class="card mx-3 my-4 py-2 px-3">
            <div class="d-flex justify-content-between">
                <div class="driver">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('front/img/detail-pembayaran/driver.png') }}" width="40px" class="me-2"
                            alt="">
                        <h5>{{$item->nama_pengirim}}</h5>
                    </div>
                </div>
                <p><b>{{Carbon::parse($item->tanggal)->isoFormat('dddd, D MMMM YYYY')}}</b></p>
            </div>
            <div class="d-flex justify-between my-3">
                <img src="{{ asset('front/img/detail-pembayaran/box.png') }}" width="50px" alt="">
                <div class="text-deskripsi ms-2">
                    <h5>Pengiriman Hewan</h5>
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>
                        <span>{{Str::limit($item->lokasi->alamat,30)}}</span>
                    </div>
                </div>
                <p class="d-flex align-items-center"><b>Rp.{{number_format($item->jenis_pengiriman->harga,0,',','.')}}</b></p>
            </div>
            <div class="d-flex justify-between mt-2">
                <div class="d-flex">
                    <img src="{{ asset('front/img/detail-pembayaran/shield.png') }}" width="45px" height="45px"
                        alt="">
                </div>
                <div class="text-deskripsi ms-2">
                    <h5>Asuransi Hewan</h5>
                    <div class="d-block align-items-center">
                        <p class="mb-0">{{$loop->iteration.'.'.$item->jenis_asuransi->nama}}</p>
                    </div>
                </div>
                <p class="d-flex align-items-center"><b>Rp.{{number_format($item->jenis_asuransi->harga,0,',','.')}}</b></p>
            </div>
            <div class="d-flex justify-content-between mt-2">
                @if ($item->status == "false")
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
                        <span class="text-danger"><b>Rp.{{number_format($item->jenis_pengiriman->harga + $item->jenis_asuransi->harga,0,',','.')}}</b></span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{-- <div class="card mx-3 my-4 py-2 px-3">
            <div class="d-flex justify-content-between">
                <div class="driver">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('front/img/detail-pembayaran/driver.png') }}" width="40px" class="me-2"
                            alt="">
                        <h5>Muiz</h5>
                    </div>
                </div>
                <p><b>Senin, 18 Mar 2002</b></p>
            </div>
            <div class="d-flex justify-between my-3">
                <img src="{{ asset('front/img/detail-pembayaran/box.png') }}" width="50px" alt="">
                <div class="text-deskripsi ms-2">
                    <h5>Pengiriman Hewan</h5>
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>
                        <span>Jln. Veteran Selatan, Kota Makassar</span>
                    </div>
                </div>
                <p class="d-flex align-items-center"><b>Rp.10.000</b></p>
            </div>
            <div class="d-flex justify-between mt-2">
                <div class="d-flex">
                    <img src="{{ asset('front/img/detail-pembayaran/shield.png') }}" width="45px" height="45px"
                        alt="">
                </div>
                <div class="text-deskripsi ms-2">
                    <h5>Asuransi Hewan</h5>
                    <div class="d-block align-items-center">
                        <p class="mb-0">1. Hewan Lepas/Kabur</p>
                        <p>2. Jaminan Kesehatan</p>
                    </div>
                </div>
                <p class="d-flex align-items-center"><b>Rp.15.000</b></p>
            </div>
            <div class="d-flex justify-content-between mt-2">
                <div class="bg-warning" style="border-radius: 10px">
                    <p class="my-1 mx-3 text-white"><b>Proses</b></p>
                </div>
                <div class="total">
                    <div class="d-flex">
                        <h5 class="me-2"><b>Total</b></h5>
                        <span class="text-danger"><b>Rp.15.000</b></span>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>

@endsection
