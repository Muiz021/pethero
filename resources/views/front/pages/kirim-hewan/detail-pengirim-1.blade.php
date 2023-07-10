@extends('front.base')

@section('content')
@section('title', 'Kirim Hewan')

<section id="hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
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
            <div class="col-md-6 col-sm-12" style="padding:0;">
                <div class="content">
                    <h2 class="text-center">Detail Kirim Hewan</h2>
                    <div class="d-flex justify-content-center mt-5">
                        <img src="{{ asset('front/img/partials/partial-5.png') }}" width="50%" alt="">
                    </div>

                    <div class="card mx-4 mt-5 px-3">
                        <h2 class="mb-4">Isi Detail Pengiriman</h2>
                        <form class="form" action="{{ route('front.kirim-hewan2') }}" method="get">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_pengirim" class="form-label">Pilih Kurir</label>
                                <select class="form-select  @error('id_kurir') is-invalid @enderror" name="id_kurir">
                                    <option value="" selected>Silahkan Pilih</option>
                                    @foreach ($kurir as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_kurir') == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_kurir')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Jadwal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ old('tanggal') }}" required>
                            </div>
                            @if ($lokasi->isNotEmpty())
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger my-3">Lanjut</button>
                                </div>
                            @else
                            <div class="d-flex justify-content-center">
                                    <a href="{{ route('front.detail-alamat') }}"
                                        onclick="return confirm('Silahkan masukan lokasi terlenih dahulu');" class="btn btn-danger my-3 mx-auto">
                                        Lanjut
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
