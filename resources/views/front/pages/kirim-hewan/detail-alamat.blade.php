@extends('front.base')

@section('content')
@section('title', 'Detail Alamat')

<section id="hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12" style="padding: 0;">
                <div class="content">
                    <div class="text-atas-kirim-hewan position-relative pt-lg-3 pt-3">
                        <h2>Kirim Hewan</h2>
                        <p>Mencari jasa pengiriman yang aman dan nyaman untuk hewan peliharaan Anda? Anda telah datang
                            ke tempat
                            yang
                            tepat. Kami menawarkan jasa pengiriman hewan yang didesain khusus untuk memenuhi kebutuhan
                            hewan
                            peliharaan
                            Anda.
                            <br>
                            Kami juga akan bekerja sama dengan Anda untuk memastikan bahwa hewan peliharaan Anda sampai
                            tepat waktu
                            dan
                            dalam kondisi yang baik di tempat tujuan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="detail-kirim-hewan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12" style="padding: 0;">
                <div class="content">
                    <h2 class="text-center">Detail Kirim Hewan</h2>

                    <div class="card mx-4 mt-5 px-3">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('front.akun') }}" class="me-2 mt-lg-2 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-arrow-left text-dark fw-bold" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                </svg>
                            </a>
                            <h2 class="mb-4">Detail Alamat</h2>
                        </div>
                        <div class="mb-3">
                            <form action="{{route('front.alamat.update')}}" method="POST">
                                @csrf
                                @method('put')
                                <label for="status" class="form-label">Alamat</label>
                                <select class="form-select" name="id">
                                    <option value="" selected>Silahkan Pilih</option>
                                    @foreach ($lokasi as $item)
                                    <option value="{{ $item->id }}"
                                            {{ 'status' == true ? 'selected' : '' }}>
                                            {{ Str::limit($item->alamat, 30) }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="d-flex justify-content-center my-4">
                                    <button type="submit" class="btn btn-danger">Kirim</button>
                                </div>
                            </form>

                            <div class="alamat form-control py-2">
                                <a href="{{ route('front.alamat.create') }}"
                                    class="d-flex justify-content-center my-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="currentColor" class="bi bi-plus-circle me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                    <p class="my-auto">Tambah Alamat</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
