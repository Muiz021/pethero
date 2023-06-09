@extends('front.base')
@section('content')
@section('title', 'Daftar User')

<section id="daftar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="content">
                    <div class="d-flex justify-content-start ms-3 pt-5">
                        <h3>Mulailah Transaksi Anda!</h3>
                    </div>
                    <form class="form mx-3 mt-3" action="{{route('front.proses_daftar')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama')}}">
                            @error('nama')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Ponsel</label>
                            <input type="text" class="form-control @error('nomor_ponsel') is-invalid @enderror" name="nomor_ponsel" value="{{old('nomor_ponsel')}}">
                            @error('nomor_ponsel')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                            @error('email')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password">
                            @error('password')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-danger my-3">Daftar</button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p>Sudah punya akun?<a href="{{route('masuk')}}">Masuk</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
