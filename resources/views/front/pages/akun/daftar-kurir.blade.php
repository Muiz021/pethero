@extends('front.base')
@section('content')
@section('title', 'Daftar Kurir')

<section id="daftar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                 <div class="content">
                    <div class="d-flex justify-content-start ms-3 pt-5">
                        <h3>Mulailah Pengiriman Anda!</h3>
                    </div>
                    <form class="form mx-3 mt-3" action="{{route('proses-daftar-kurir')}}" method="post"  enctype="multipart/form-data">
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
                            <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{old('tempat_lahir')}}">
                            @error('tempat_lahir')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select  @error('jenis_kelamin') is-invalid @enderror"
                                name="jenis_kelamin">
                                <option value="" selected>Silahkan Pilih</option>
                                <option value="pria" {{ old('jenis_kelamin') == 'pria' ? 'selected' : '' }}>pria</option>
                                <option value="wanita" {{ old('jenis_kelamin') == 'wanita' ? 'selected' : '' }}>wanita</option>
                            </select>
                            @error('jenis_kelamin')
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
                            <label for="exampleInputEmail1" class="form-label">Foto Pofil</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{old('gambar')}}">
                            @error('gambar')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Foto Sim C</label>
                            <input type="file" class="form-control @error('foto_sim_c') is-invalid @enderror" name="foto_sim_c" value="{{old('foto_sim_c')}}">
                            @error('foto_sim_c')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
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
