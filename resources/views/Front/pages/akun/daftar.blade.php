@extends('front.base')
@section('content')
@section('title', 'Daftar')

<section id="daftar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="content">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('front/img/logo/logo-daftar.png')}}" width="100%" alt="">
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="{{route('front.daftar-user')}}" class="btn btn-danger my-auto">
                            Pengguna
                        </a>
                    </div>
                    <div class="d-flex justify-content-center py-2">
                        <p class="mb-0">atau</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('daftar-kurir')}}" class="btn btn-danger my-auto">
                            Kurir
                        </a>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <p>Sudah punya akun?<a href="{{route('masuk')}}">Masuk</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
