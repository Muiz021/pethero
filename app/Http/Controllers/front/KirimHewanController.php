<?php

namespace App\Http\Controllers\front;

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

    public function store(Request $request)
    {
        $jenis_pengirim = JenisPengiriman::create();
        $jenis_asuransi = JenisAsuransi::create();
        $jenis_kandang = JenisKandang::create();

        $kirim_hewan = KirimHewan::create([
            "id_jenis_pengiriman" => $jenis_pengirim->id,
            "id_jenis_asuransi" => $jenis_asuransi->id,
            "id_jenis_kandang" => $jenis_kandang->id,
            "id_lokasi" => $request->lokasi,
            "nama_pengirim" => $request->query('nama_pengirim'),
            "deskripsi_hewan" => $request->deskripsi_hewan,
            "tanggal" => $request->query('tanggal'),
        ]);

        $kirim = JenisPengiriman::where('id',$kirim_hewan->id_jenis_pengiriman)->first();
        if ($request->jenis_pengiriman == 1) {
            $kirim->update([
                "nama" => "regular",
                "harga" => 5000
            ]);
        } else if ($request->jenis_pengiriman == 2) {
            $kirim->update([
                "nama" => "instant",
                "harga" => 10000
            ]);
        } else if ($request->jenis_pengiriman == 3) {
            $kirim_hewan->update([
                "nama" => "urgent",
                "harga" => 15000
            ]);
        }
        $asuransi = JenisAsuransi::where('id', $kirim_hewan->id_jenis_asuransi)->first();
        if ($request->jenis_asuransi == 1) {
            $asuransi->update([
                "nama" => "hewan lepas atau kabur",
                "harga" => 10000
            ]);
        } else
        if ($request->jenis_asuransi == 2) {
            $asuransi->update([
                "nama" => "pencurian hewan",
                "harga" => 5000
            ]);
        } else
        if ($request->jenis_asuransi == 3 ) {
            $asuransi->update([
                "nama" => "kecelakaan diri",
                "harga" => 10000
            ]);
        } else
        if ($request->jenis_asuransi == 4 ) {
            $asuransi->update([
                "nama" => "jaminan kesehatan",
                "harga" => 5000
            ]);
        }
        $kandang = JenisKandang::where('id', $kirim_hewan->id_jenis_kandang)->first();
        if ($request->jenis_kandang == 1) {
            $kandang->update([
                "nama" => "kandang sendiri",
            ]);
        }else
        if ($request->jenis_kandang == 2) {
            $kandang->update([
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
