@extends('Front.base')
@section('content')
@section('title', 'Daftar')

<section id="daftar">
    <div class="container">
        <div class="d-flex justify-content-start ms-3 pt-5">
            <h3>Mulailah Transaksi Anda!</h3>
        </div>
        <form class="form mx-3 mt-3" action="{{route('front.proses_daftar')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" class="form-control " name="nama">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Ponsel</label>
                <input type="text" class="form-control " name="nomor_ponsel">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-danger my-3">Daftar</button>
            </div>
            <div class="d-flex justify-content-center">
                <p>Sudah punya akun?<a href="{{route('front.masuk')}}">Masuk</a></p>
            </div>
        </form>
    </div>

    <div class="card-kosong mx-auto mt-2">
    </div>

</section>
@endsection
