@extends('Front.base')
@section('content')
@section('title', 'Edit Profil')

<section id="daftar">
    <div class="container">
        <div class="d-flex justify-content-center pt-5">
            <img src="{{ asset('images/'.$akun->gambar) }}" class="rounded-circle" width="150px" alt="">
        </div>
        <div class="d-flex justify-content-center pt-3">
            <h4 class="text-uppercase">{{ Auth::user()->nama }}</h4>
        </div>
        <form class="form mx-3 mt-3" action="{{ route('front.update', $akun->slug) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="{{ $akun->username }}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" class="form-control " name="nama" value="{{ $akun->nama }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Ponsel</label>
                <input type="text" class="form-control " name="nomor_ponsel" value="{{ $akun->nomor_ponsel }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Gambar</label>
                <input type="file" class="form-control" name="gambar">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-danger my-3">Kirim</button>
            </div>
        </form>
    </div>
    <div class="card-kosong mx-auto mt-2">
    </div>
</section>
@endsection
