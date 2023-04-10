@extends('Front.base')

@section('content')
@section('title', 'Detail Alamat')

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

<section id="detail-kirim-hewan">
    <div class="container">
        <h2 class="text-center">Detail Kirim Hewan</h2>
        <div class="d-flex justify-content-center mt-5">
            <img src="{{ asset('img/partials/partial-6.png') }}" width="50%" alt="">
        </div>

        <div class="card mx-4 mt-5 px-3">
            <h2 class="mb-4">Detail Alamat</h2>
            <form class="form" action="{{route('front.kirim-hewan2')}}" method="get">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Label Alamat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Alamat Lengkap</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Catatan untuk driver(opsional)</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">NO HP</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value="" disabled>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger my-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
