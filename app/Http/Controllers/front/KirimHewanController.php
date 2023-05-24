<?php

namespace App\Http\Controllers\front;

use App\Http\Requests\front\KirimHewanRequest;
use App\Models\JenisAsuransi;
use App\Models\JenisKandang;
use App\Models\JenisPengiriman;
use App\Models\Lokasi;
use App\Models\KirimHewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KirimHewanController extends Controller
{
    public function detail_pengirim1()
    {
        return view('Front.pages.kirim-hewan.detail-pengirim-1');
    }

    public function detail_pengirim2()
    {
        $lokasi = Lokasi::get();
        return view('Front.pages.kirim-hewan.detail-pengirim-2', compact('lokasi'));
    }

    public function detail_alamat()
    {
        $user = Auth::user();
        return view('Front.pages.kirim-hewan.detail-alamat', compact('user'));
    }

    public function store(KirimHewanRequest $request)
    {
        $kirim_hewan = KirimHewan::create([
            "nama_pengirim" => $request->query('nama_pengirim'),
            "deskripsi_hewan" => $request->deskripsi_hewan,
            "tanggal" => $request->query('tanggal'),
        ]);

        $jenis_pengirim = JenisPengiriman::create();
        $jenis_asuransi = JenisAsuransi::create();
        $jenis_kandang = JenisKandang::create();
        $lokasi = Lokasi::where('id',$request->lokasi)->first();
        $lokasi->update([
            'id_kirim_hewan' => $kirim_hewan->id
        ]);



        if ($request->jenis_pengiriman == 1) {
            $jenis_pengirim->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "regular",
                "harga" => 5000
            ]);
        } else if ($request->jenis_pengiriman == 2) {
            $jenis_pengirim->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "instant",
                "harga" => 10000
            ]);
        } else if ($request->jenis_pengiriman == 3) {
            $jenis_pengirim->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "urgent",
                "harga" => 15000
            ]);
        }

        if ($request->jenis_asuransi == 1) {
            $jenis_asuransi->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "hewan lepas atau kabur",
                "harga" => 10000
            ]);
        } else
        if ($request->jenis_asuransi == 2) {
            $jenis_asuransi->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "pencurian hewan",
                "harga" => 5000
            ]);
        } else
        if ($request->jenis_asuransi == 3 ) {
            $jenis_asuransi->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "kecelakaan diri",
                "harga" => 10000
            ]);
        } else
        if ($request->jenis_asuransi == 4 ) {
            $jenis_asuransi->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "jaminan kesehatan",
                "harga" => 5000
            ]);
        }

        if ($request->jenis_kandang == 1) {
            $jenis_kandang->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "kandang sendiri",
            ]);
        }else
        if ($request->jenis_kandang == 2) {
            $jenis_kandang->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "driver",
            ]);
        }

        return redirect('detail/pembayaran/'.$kirim_hewan->id);
    }

    public function detail_pembayaran($id)
    {
        $kirim_hewan = KirimHewan::where('id', $id)->first();
        return view('front.pages.kirim-hewan.detail-pembayaran', ['kirim_hewan' => $kirim_hewan]);
    }

}
