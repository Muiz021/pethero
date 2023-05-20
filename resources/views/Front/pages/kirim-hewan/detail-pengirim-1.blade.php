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

<section id="detail-kirim-hewan">
    <div class="container">
        <h2 class="text-center">Detail Kirim Hewan</h2>
        <div class="d-flex justify-content-center mt-5">
            <img src="{{ asset('front/img/partials/partial-5.png') }}" width="50%" alt="">
        </div>

        <div class="card mx-4 mt-5 px-3">
            <h2 class="mb-4">Isi Detail Pengiriman</h2>
            <form class="form" action="{{route('front.kirim-hewan2')}}" method="get">
                @csrf
                <div class="mb-3">
                    <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                    <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Jadwal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger my-3">Lanjut</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
