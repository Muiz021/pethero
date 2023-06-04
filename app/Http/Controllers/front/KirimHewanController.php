<?php

namespace App\Http\Controllers\front;

use App\Models\Lokasi;
use App\Models\KirimHewan;
use App\Models\DetailLokasi;
use App\Models\JenisKandang;
use Illuminate\Http\Request;
use App\Models\JenisAsuransi;
use App\Models\JenisPengiriman;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\front\KirimHewanRequest;

class KirimHewanController extends Controller
{
    public function detail_pengirim1()
    {
        return view('Front.pages.kirim-hewan.detail-pengirim-1');
    }

    public function detail_pengirim2(Request $request)
    {
        $lokasi = Lokasi::get();
        $nama_pengirim = $request->nama_pengirim;
        $tanggal = $request->tanggal;
        return view('Front.pages.kirim-hewan.detail-pengirim-2', compact('lokasi', 'nama_pengirim', 'tanggal'));
    }

    public function detail_alamat()
    {
        $user = Auth::user();
        return view('Front.pages.kirim-hewan.detail-alamat', compact('user'));
    }

    public function store(KirimHewanRequest $request)
    {
        $lokasi = Lokasi::where('id',$request->lokasi)->first();
        $user = Auth::user()->id;
        $detail_lokasi = DetailLokasi::create([
            'id_user' => $user,
            'label_alamat' => $lokasi->label_alamat,
            'alamat' => $lokasi->alamat,
            'catatan_driver' => $lokasi->catatan_driver,
            'nama_penerimaan' => $lokasi->nama_penerimaan,
            'nomor_ponsel' => $lokasi->nomor_ponsel,
        ]);

        $kirim_hewan = KirimHewan::create([
            "id_detail_lokasi" => $detail_lokasi->id,
            "nama_pengirim" => $request->nama_pengirim,
            "deskripsi_hewan" => $request->deskripsi_hewan,
            "tanggal" => $request->tanggal,
            "id_user" => Auth::user()->id
        ]);

        $jenis_pengirim = JenisPengiriman::create();
        $jenis_asuransi = JenisAsuransi::create();
        $jenis_kandang = JenisKandang::create();

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
                "nama" => "tanpa asuransi",
                "harga" => 0
            ]);
        } else
        if ($request->jenis_asuransi == 2) {
            $jenis_asuransi->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "hewan lepas atau kabur",
                "harga" => 10000
            ]);
        } else
        if ($request->jenis_asuransi == 3) {
            $jenis_asuransi->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "pencurian hewan",
                "harga" => 5000
            ]);
        } else
        if ($request->jenis_asuransi == 4 ) {
            $jenis_asuransi->update([
                "id_kirim_hewan" => $kirim_hewan->id,
                "nama" => "kecelakaan diri",
                "harga" => 10000
            ]);
        } else
        if ($request->jenis_asuransi == 5 ) {
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

        Mail::send('front.pages.email.notifikasi-admin', ['nama_pelanggan' => Auth::user()->nama, 'email_pelanggan' => Auth::user()->email], function ($message) {
            $pethero = "petheromakassar@gmail.com";
            $message->to($pethero);
            $message->subject('Pemberitahuan Transaksi');
        });

        Mail::send('front.pages.email.notifikasi-user', ['data' => $kirim_hewan], function ($message) {
            $message->to(Auth::user()->email);
            $message->subject('Transaksi');
        });

        Alert::success(Auth::user()->nama, "Ada Pesan Ke Email Kamu");
        return redirect('detail/pembayaran/'.$kirim_hewan->id);
    }

    public function detail_pembayaran($id)
    {
        $user = Auth::user();
        $kirim_hewan = KirimHewan::where('id', $id)->where('id_user',$user->id)->first();
        $lokasi = DetailLokasi::where('id', $kirim_hewan->id_detail_lokasi)->first();
        return view('front.pages.kirim-hewan.detail-pembayaran', ['kirim_hewan' => $kirim_hewan, 'lokasi' => $lokasi]);
    }

}
