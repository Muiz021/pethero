@extends('Front.base')
@section('content')
@section('title', 'Home')

<section id="hero">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <div class="content">
                <div class="d-flex justify-content-end">
                    <img src="{{ asset('front/img/hero/hero-1.png') }}" width="80%" alt="">
                </div>
                <div class="text-atas">
                    <h3 class="text-satu">Pahlawan Pengiriman</h3>
                    <h3 class="text-dua">Hewan Peliharaan Anda</h3>
                </div>
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{asset('front/img/carousel/menu-1.png')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                          <img src="{{asset('front/img/carousel/menu-2.png')}}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="{{asset('front/img/carousel/menu-3.png')}}" class="d-block w-100" alt="...">
                      </div>
                    </div>
                  </div>

                <div class="partial">
                    <div class="d-flex justify-content-start">
                        <img src="{{ asset('front/img/partials/partial-1.png') }}" width="45%" alt="">
                    </div>
                    <div class="d-flex justify-content-end">
                        <img src="{{ asset('front/img/partials/partial-2.png') }}" width="70%" alt="">
                    </div>
                    <div class="d-flex justify-content-start">
                        <img src="{{ asset('front/img/partials/partial-3.png') }}" width="70%" alt="">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">

        </div>
    </div> --}}
</section>

<section id="menu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12" style="padding: 0;">
              <div class="content">
                <div class="text-tengah">
                    <h3 class="text-satu">Kami tetap mengutamakan</h3>
                    <h3 class="text-dua">kenyamanan hewan peliharaan Anda.</h3>
                    <p class="deskripsi">Kami memahami bahwa hewan peliharaan Anda adalah anggota keluarga yang penting bagi
                        Anda, sehingga kami akan melakukan yang terbaik untuk memastikan keselamatan dan kenyamanan hewan
                        peliharaan Anda selama perjalanan.</p>
                </div>

                <div class="daftar-menu">
                    <div class="d-flex justify-content-center">
                        <div class="d-flex flex-column">
                            @if (Auth::user())
                            <a href="{{route('front.kirim-hewan1')}}" class="my-2">
                                <img src="{{ asset('front/img/menu/menu-1.png') }}" width="100%" alt="">
                            </a>
                            @else
                            <a href="{{route('masuk')}}" onclick="return confirm('Silahkan Login Terlebih Dahulu');" class="my-2">
                                <img src="{{ asset('front/img/menu/menu-1.png') }}" width="100%" alt="">
                            </a>

                            @endif
                            <a href="#" onclick="return confirm('Fitur Ini Belum Tersedia');" class="my-2">
                                <img src="{{ asset('front/img/menu/menu-2.png') }}" width="100%" alt="">
                            </a>
                            <a href="#" onclick="return confirm('Fitur Ini Belum Tersedia');" class="my-2">
                                <img src="{{ asset('front/img/menu/menu-3.png') }}" width="100%" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-5">
                    <img src="{{asset('front/img/partials/partial-4.png')}}" width="70%" alt="">
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

@endsection

