@extends('Front.base')
@section('content')
@section('title', 'Akun')
{{-- sweetalert --}}
@include('sweetalert::alert')
{{-- end sweetalert --}}

@php
    use App\Models\KirimHewan;
@endphp

<section id="akun-hero">
    @if (Auth::user())
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-12">
                    <div class="content py-lg-5 py-3">
                        <div class="card mx-lg-4 mx-3">
                            <div class="d-flex justify-content-between align-items-center mx-lg-2 px-lg-5 mx-2 my-lg-3 my-3">
                                <a href="{{ route('front.edit', $akun->slug) }}">
                                    <img src="{{ asset('images/' . $akun->gambar) }}" class="rounded-circle"
                                        alt="">
                                </a>
                                <div class="text-profil">
                                    <h3 class="text-uppercase">{{ $akun->nama }}</h3>
                                    <p>{{ $akun->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container text-atas">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-12">
                    <div class="content px-4">
                        <div class="d-flex justify-content-center">
                            <p class="text-satu">Masuk untuk memulai transaksi anda!</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('masuk') }}" class="btn btn-outline-danger text-dua">Masuk Sekarang</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="text-tiga">Belum punya akun?<a href="{{ route('front.daftar') }}">Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>

<section id="akun-menu">
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
               <div class="content">
                <div class="menu py-3 px-4">
                    <div class="d-flex flex-column">
                        @if (Auth::user())
                            @if ($kirim_hewan = KirimHewan::where('id_user', Auth::user()->id)->get() == null)
                                <a href="#" onclick="return confirm('Kamu Belum Melakukan Transaksi');" class="d-flex">
                                    <img src="{{ asset('front/img/menu/akun-menu-1.png') }}" width="40px" alt="">
                                    <p class="my-auto ms-3">Riwayat Pengiriman</p>
                                </a>
                            @else
                                <a href="{{ route('front.riwayat-pengiriman') }}" class="d-flex">
                                    <img src="{{ asset('front/img/menu/akun-menu-1.png') }}" width="40px" alt="">
                                    <p class="my-auto ms-3">Riwayat Pengiriman</p>
                                </a>
                            @endif
                        @else
                            <a href="{{ route('masuk') }}" onclick="return confirm('Silahkan Login Terlebih Dahulu');"
                                class="d-flex">
                                <img src="{{ asset('front/img/menu/akun-menu-1.png') }}" width="40px" alt="">
                                <p class="my-auto ms-3">Riwayat Pengiriman</p>
                            </a>
                        @endif
                        <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2" alt="">
                        <a href="#" class="d-flex justify-content-between">
                            <div class="d-flex">
                                <img src="{{ asset('front/img/menu/akun-menu-2.png') }}" width="40px" alt="">
                                <p class="my-auto ms-3">Notifikasi</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </a>
                        <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2" alt="">
                        <a href="{{ route('front.tentang-kami') }}" class="d-flex">
                            <img src="{{ asset('front/img/menu/akun-menu-5.png') }}" width="35px" alt="">
                            <p class="my-auto ms-3">Tentang kami</p>
                        </a>
                        @if (Auth::user())
                            <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2" alt="">
                            <a href="{{ route('front.logout.user') }}" class="d-flex">
                                <img src="{{ asset('front/img/menu/akun-menu-6.png') }}" width="35px" alt="">
                                <p class="my-auto ms-3">Keluar</p>
                            </a>
                        @endif
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
</section>
@endsection
