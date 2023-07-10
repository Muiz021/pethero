@extends('front.base')

@section('content')
@section('title', 'Kirim Hewan')

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

<section id="detail-kirim-hewan-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12" style="padding: 0;">
                <div class="content">
                    <h2 class="text-center pt-5">Detail Kirim Hewan</h2>
                    <div class="d-flex justify-content-center mt-5">
                        <img src="{{ asset('front/img/partials/partial-6.png') }}" width="50%" alt="">
                    </div>

                    <div class="card mx-4 mt-5 px-3 py-3">
                        <h2 class="mb-4">Pengiriman</h2>
                        <form class="form" action="{{ route('front.kirim-hewan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="deskripsi_hewan" class="form-label">Isi Detail Hewan</label>
                                <input type="text"
                                    class="form-control  @error('deskripsi_hewan') is-invalid @enderror"
                                    id="deskripsi_hewan" name="deskripsi_hewan">
                                @error('deskripsi_hewan')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Jenis Pengiriman</label>
                                <select class="form-select  @error('jenis_pengiriman') is-invalid @enderror"
                                    name="jenis_pengiriman">
                                    <option value="" selected>Silahkan Pilih</option>
                                    <option value="1" {{ old('jenis_pengiriman') == 1 ? 'selected' : '' }}>Regular
                                        (Rp.5000,00) [5 Hari]</option>
                                    <option value="2" {{ old('jenis_pengiriman') == 2 ? 'selected' : '' }}>Instant
                                        (Rp.10000,00) [1-2 Hari]</option>
                                    <option value="3" {{ old('jenis_pengiriman') == 3 ? 'selected' : '' }}>Urgent
                                        (Rp.15000,00) [1-5 Jam]</option>
                                </select>
                                @error('jenis_pengiriman')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Pilih Asuransi</label>
                                <select class="form-select  @error('jenis_asuransi') is-invalid @enderror"
                                    name="jenis_asuransi">
                                    <option value="" selected>Silahkan Pilih</option>
                                    <option value="1" {{ old('jenis_asuransi') == 1 ? 'selected' : '' }}>Tanpa asuransi</option>
                                    <option value="2" {{ old('jenis_asuransi') == 2 ? 'selected' : '' }}>Hewan
                                        lepas atau kabur (10000)</option>
                                    <option value="3" {{ old('jenis_asuransi') == 3 ? 'selected' : '' }}>Pencurian
                                        hewan (5000)</option>
                                    <option value="4" {{ old('jenis_asuransi') == 4 ? 'selected' : '' }}>Kecelakaan
                                        diri (10000)</option>
                                    <option value="5" {{ old('jenis_asuransi') == 5 ? 'selected' : '' }}>Jaminan
                                        kesehatan (5000)</option>
                                </select>
                                @error('jenis_asuransi')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Pilih Jenis Kandang</label>
                                <select class="form-select  @error('jenis_kandang') is-invalid @enderror"
                                    name="jenis_kandang">
                                    <option value="" selected>Silahkan Pilih</option>
                                    <option value="1" {{ old('jenis_kandang') == 1 ? 'selected' : '' }}>Kandang
                                        Sendiri</option>
                                    <option value="2" {{ old('jenis_kandang') == 2 ? 'selected' : '' }}>Driver
                                    </option>
                                </select>
                                @error('jenis_kandang')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Lokasi</label>
                               <input type="text" class="form-control bg-light" value="{{$lokasi->alamat}}" disabled>
                            </div>
                            <input type="hidden" class="form-control" id="lokasi" name="lokasi" value="{{$lokasi->id}}">
                            <input type="hidden" class="form-control" id="id_kurir" name="id_kurir"
                                value="{{ $id_kurir }}">
                            <input type="hidden" class="form-control" id="tanggal" name="tanggal"
                                value="{{ $tanggal }}">

                            <div class="d-flex justify-content-center align-items-center my-3">
                                <button type="submit" class="btn btn-danger">Bayar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
