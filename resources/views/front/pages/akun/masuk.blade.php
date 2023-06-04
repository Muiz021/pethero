@extends('front.base')
@section('content')
@section('title', 'Masuk')
    {{-- sweetalert --}}
    @include('sweetalert::alert')
    {{-- end sweetalert --}}

<section id="masuk">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="content">
                    <div class="d-flex justify-content-start ms-3 pt-5">
                        <h3>Masuk untuk Memulai Transaksi Anda!</h3>
                    </div>
                    <form class="form mx-3 mt-3" action="{{route('proses_login')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                            @error('email')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}">
                            @error('password')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-danger my-3">Masuk</button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p>Sudah punya akun?<a href="{{route('front.daftar')}}">Daftar</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="card-kosong mx-auto mt-2">
    </div> --}}

</section>

@endsection
