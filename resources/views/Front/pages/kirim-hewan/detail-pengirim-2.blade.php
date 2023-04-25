@extends('Front.base')

@section('content')
@section('title', 'Kirim Hewan')

<section id="hero">
    <div class="container">
        <div class="text-atas-kirim-hewan position-relative">
            <h2>Kirim Hewan</h2>
            <p>Mencari jasa pengiriman yang aman dan nyaman untuk hewan peliharaan Anda? Anda telah datang ke tempat
                yang
                tepat. Kami menawarkan jasa pengiriman hewan yang didesain khusus untuk memenuhi kebutuhan hewan
                peliharaan
                Anda.
                <br>
                Kami juga akan bekerja sama dengan Anda untuk memastikan bahwa hewan peliharaan Anda sampai tepat waktu
                dan
                dalam kondisi yang baik di tempat tujuan.
            </p>
        </div>
    </div>
</section>

<section id="detail-kirim-hewan-2">
    <div class="container">
        <h2 class="text-center pt-5">Detail Kirim Hewan</h2>
        <div class="d-flex justify-content-center mt-5">
            <img src="{{ asset('front/img/partials/partial-6.png') }}" width="50%" alt="">
        </div>

        <div class="card mx-4 mt-5 px-3 py-3">
            <h2 class="mb-4">Pengiriman</h2>
            <form class="form" action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Isi Detail Hewan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Jenis Pengiriman</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Silahkan Pilih</option>
                        <option value="10000">Instant</option>
                        <option value="15000">Urgent</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Pilih Asuransi</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Silahkan Pilih</option>
                        <option value="10000">Hewan lepas atau kabur</option>
                        <option value="5000">Pencurian hewan</option>
                        <option value="10000">Kecelakaan diri</option>
                        <option value="5000">Jaminan kesehatan</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Pilih Jenis Kandang</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Silahkan Pilih</option>
                        <option value="kandang-sendiri">Kandang Sendiri</option>
                        <option value="driver">Driver</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Lokasi</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Silahkan</option>
                        <option value="1">One</option>
                      </select>
                </div>

                <div class="mb-3">
                    <div class="form-control pt-3">
                        <a href="{{route('front.detail-alamat')}}" class="tambah-lokasi  d-flex justify-content-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle me-3" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                              </svg>
                              <p>Tambah Alamat Pengiriman?</p>
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center my-3">
                    <div class="text-estimasi-harga-total">
                        <p class="text-estimasi">Estimasi Total Harga</p>
                        <input type="text" class="form-estimasi" id="exampleInputPassword1" placeholder="Rp.">
                    </div>
                    <button type="submit" class="btn btn-danger">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
