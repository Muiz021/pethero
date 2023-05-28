@extends('Front.base')

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
                    <div class="d-flex justify-content-center mt-5">
                        <img src="{{ asset('front/img/partials/partial-6.png') }}" width="50%" alt="">
                    </div>

                    <div class="card mx-4 mt-5 px-3">
                        <h2 class="mb-4">Detail Alamat</h2>
                        <form class="form" action="{{ route('front.alamat.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="label_alamat" class="form-label">Label Alamat</label>
                                <select class="form-select  @error('label_alamat') is-invalid @enderror"
                                    name="label_alamat">
                                    <option value="" selected>Silahkan Pilih</option>
                                    <option value="rumah" {{ old('label_alamat') == 'rumah' ? 'selected' : '' }}>Rumah
                                    </option>
                                    <option value="kantor" {{ old('label_alamat') == 'kantor' ? 'selected' : '' }}>
                                        Kantor</option>
                                    <option value="sekolah" {{ old('label_alamat') == 'sekolah' ? 'selected' : '' }}>
                                        Sekolah</option>
                                    <option value="kontrakan"
                                        {{ old('label_alamat') == 'kontrakan' ? 'selected' : '' }}>Kontrakan</option>
                                </select>
                                @error('label_alamat')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" id="alamat" class="form-control  @error('alamat') is-invalid @enderror" cols="30"
                                    rows="5">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="catatan_driver" class="form-label">Catatan untuk driver(opsional)</label>
                                <input type="text" class="form-control" id="catatan_driver" name="catatan_driver"
                                    value="{{ old('catatan_driver') }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama_penerimaan" class="form-label">Nama Penerima</label>
                                <input type="text"
                                    class="form-control  @error('nama_penerimaan') is-invalid @enderror"
                                    id="nama_penerimaan" name="nama_penerimaan" value="{{ old('nama_penerimaan') }}">
                                @error('nama_penerimaan')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nomor_ponsel" class="form-label">NO HP</label>
                                <input type="text" class="form-control" id="nomor_ponsel"
                                    value="{{ $user->nomor_ponsel }}" name="nomor_ponsel" disabled>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger my-3">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
