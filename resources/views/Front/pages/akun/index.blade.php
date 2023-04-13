@extends('Front.base')
@section('content')
@section('title', 'Akun')

<section id="akun-hero">
   <div class="container text-atas">
    <div class="d-flex justify-content-center">
        <p class="text-satu">Masuk untuk memulai transaksi anda!</p>
    </div>
    <div class="d-flex justify-content-center">
        <a href="{{route('front.masuk')}}" class="btn btn-outline-danger text-dua">Masuk Sekarang</a>
    </div>
    <div class="d-flex justify-content-center">
        <p class="text-tiga">Belum punya akun?<a href="{{route('front.daftar')}}">Daftar</a></p>
    </div>
   </div>
</section>

<section id="akun-menu">
    <div class="container mt-3">
        <div class="menu py-3 px-4">
            <div class="d-flex flex-column">
                <a href="#" class="d-flex">
                    <img src="{{asset('img/menu/akun-menu-1.png')}}" width="40px" alt="">
                    <p class="my-auto ms-3">Riwayat Pengiriman</p>
                </a>
               <img src="{{asset('img/partials/partial-7.png')}}" class="my-2" alt="">
               <a href="#" class="d-flex justify-content-between">
                   <div class="d-flex">
                       <img src="{{asset('img/menu/akun-menu-2.png')}}" width="40px" alt="">
                       <p class="my-auto ms-3">Notifikasi</p>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    </div>
                </a>
                <img src="{{asset('img/partials/partial-7.png')}}" class="my-2" alt="">
                <a href="#" class="d-flex">
                    <img src="{{asset('img/menu/akun-menu-3.png')}}" width="40px" alt="">
                    <p class="my-auto ms-3">Saldo</p>
                </a>
                <img src="{{asset('img/partials/partial-7.png')}}" class="my-2" alt="">
                <a href="#" class="d-flex">
                    <img src="{{asset('img/menu/akun-menu-4.png')}}" width="40px" alt="">
                    <p class="my-auto ms-3">Kontak Kami</p>
                </a>
                <img src="{{asset('img/partials/partial-7.png')}}" class="my-2" alt="">
                <a href="{{route('front.tentang-kami')}}" class="d-flex">
                    <img src="{{asset('img/menu/akun-menu-5.png')}}" width="35px" alt="">
                    <p class="my-auto ms-3">Tentang kami</p>
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
