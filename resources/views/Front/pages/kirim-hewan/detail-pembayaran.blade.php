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
    <div class="container pt-5">
        <div class="card mx-4 px-3">
            <h2 class="text-center mb-4">Detail Pembayaran</h2>
            <form class="form" action="{{route('front.kirim-hewan.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="label_alamat" class="form-label">Label Alamat</label>
                    <select class="form-select" aria-label="Default select example" name="label_alamat">
                        <option selected>Silahkan Pilih</option>
                        <option value="rumah">Rumah</option>
                        <option value="kantor">Kantor</option>
                        <option value="sekolah">Sekolah</option>
                        <option value="kontrakan">Kontrakan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label for="catatan_driver" class="form-label">Catatan untuk driver(opsional)</label>
                    <input type="text" class="form-control" id="catatan_driver" name="catatan_driver">
                </div>
                <div class="mb-3">
                    <label for="nama_penerimaan" class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control" id="nama_penerimaan" name="nama_penerimaan">
                </div>
                <div class="mb-3">
                    <label for="nomor_ponsel" class="form-label">NO HP</label>
                    <input type="text" class="form-control" id="nomor_ponsel" value="#" name="nomor_ponsel" disabled>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger my-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
