@extends('Front.base')
@section('content')
@section('title', 'Edit Profil')

<section id="edit">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="content">
                    <div class="d-flex justify-content-center pt-5">
                        @if ($akun->gambar != null)
                        <img src="{{ asset('images/' . $akun->gambar) }}" class="rounded-circle" width="150px" height="150px"
                            alt="">
                            @else
                            <img src="{{ asset('front/img/hero/blank-profile-picture.webp') }}" class="rounded-circle" width="150px" height="150px"
                                alt="">
                        @endif
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        <h4 class="text-uppercase">{{ Auth::user()->nama }}</h4>
                    </div>
                    <form class="form mx-3 mt-3" action="{{ route('front.update', $akun->slug) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $akun->email }}"
                                disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control " name="nama" value="{{ $akun->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Ponsel</label>
                            <input type="text" class="form-control " name="nomor_ponsel"
                                value="{{ $akun->nomor_ponsel }}">
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
            </div>
        </div>
    </div>

</section>
@endsection
