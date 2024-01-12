@extends('front.base')
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
                            @php
                                $baseURL = url('/');
                            @endphp
                            <div
                                class="d-flex justify-content-between align-items-center mx-lg-2 px-lg-5 mx-2 my-lg-3 my-3">
                                <a href="{{ Auth::user()->roles == 'member' ? route('front.edit', $akun->slug) : route('edit_kurir', $akun->slug) }}">
                                    @if ($akun->gambar != null)
                                        <img src="{{ asset(Str::replace($baseURL . '/images/', '',  '/images/' . $akun->gambar)) }}" class="rounded-circle"
                                            alt="">
                                    @else
                                        <img src="{{ asset('front/img/hero/blank-profile-picture.webp') }}"
                                            class="rounded-circle" alt="">
                                    @endif
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
                                @if (Auth::user()->roles == 'member')
                                    @if ($kirim_hewan = KirimHewan::where('id_user', Auth::user()->id)->get()->isEmpty())
                                        <a href="#" onclick="return confirm('Kamu Belum Melakukan Transaksi');"
                                            class="d-flex">
                                            <img src="{{ asset('front/img/menu/akun-menu-1.png') }}" width="40px"
                                                alt="">
                                            <p class="my-auto ms-3">Riwayat Pengiriman</p>
                                        </a>
                                    @else
                                        <a href="{{ route('front.riwayat-pengiriman-member') }}" class="d-flex">
                                            <img src="{{ asset('front/img/menu/akun-menu-1.png') }}" width="40px"
                                                alt="">
                                            <p class="my-auto ms-3">Riwayat Pengiriman</p>
                                        </a>
                                    @endif
                                @elseif(Auth::user()->roles == 'kurir')
                                    @if ($kirim_hewan = KirimHewan::where('id_kurir', Auth::user()->id)->where('status_pembayaran','true')->get()->isEmpty())
                                        <a href="#" onclick="return confirm('Belum Ada Yang Melakukan Transaksi');"
                                            class="d-flex">
                                            <img src="{{ asset('front/img/menu/akun-menu-1.png') }}" width="40px"
                                                alt="">
                                            <p class="my-auto ms-3">Riwayat Pengiriman</p>
                                        </a>
                                    @else
                                        <a href="{{ route('riwayat_pengiriman_kurir') }}" class="d-flex">
                                            <img src="{{ asset('front/img/menu/akun-menu-1.png') }}" width="40px"
                                                alt="">
                                            <p class="my-auto ms-3">Riwayat Pengiriman</p>
                                        </a>
                                    @endif
                                @else
                                    <a href="{{ route('masuk') }}"
                                        onclick="return confirm('Silahkan Login Terlebih Dahulu');" class="d-flex">
                                        <img src="{{ asset('front/img/menu/akun-menu-1.png') }}" width="40px"
                                            alt="">
                                        <p class="my-auto ms-3">Riwayat Pengiriman</p>
                                    </a>
                                @endif
                                @if (Auth::user()->roles == 'member')
                                    <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2"
                                        alt="">
                                    <a href="{{ route('front.detail-alamat') }}"
                                        class="d-flex justify-content-between">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                fill="currentColor" class="bi bi-house-add-fill" style="color: red;"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0Z" />
                                                <path
                                                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                                <path
                                                    d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                            </svg>
                                            <p class="my-auto ms-3">Alamat</p>
                                        </div>
                                    </a>
                                @endif
                            @endif
                            <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2" alt="">
                            <a href="#" class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <img src="{{ asset('front/img/menu/akun-menu-2.png') }}" width="40px"
                                        alt="">
                                    <p class="my-auto ms-3">Notifikasi</p>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                </div>
                            </a>
                            <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2"
                                alt="">
                            <a href="{{ route('front.tentang-kami') }}" class="d-flex">
                                <img src="{{ asset('front/img/menu/akun-menu-5.png') }}" width="35px"
                                    alt="">
                                <p class="my-auto ms-3">Tentang kami</p>
                            </a>
                            @if (Auth::user())
                                <img src="{{ asset('front/img/partials/partial-7.png') }}" class="my-2"
                                    alt="">
                                <a href="{{ route('front.logout.user') }}" class="d-flex">
                                    <img src="{{ asset('front/img/menu/akun-menu-6.png') }}" width="35px"
                                        alt="">
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
