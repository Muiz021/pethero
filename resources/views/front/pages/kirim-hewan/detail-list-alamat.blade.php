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
                            <a href="{{ route('front.detail-alamat') }}" class="me-2 mt-lg-2 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-arrow-left text-dark fw-bold" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                </svg>
                            </a>
                            <h2 class="mb-4">Detail Alamat</h2>
                        </div>
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
                                <input type="text" class="form-control @error('nomor_ponsel') is-invalid @enderror" id="nomor_ponsel" name="nomor_ponsel" value="{{old('nomor_ponsel')}}">
                                @error('nomor_ponsel')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    {{ $message }}
                                </div>
                            @enderror
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
