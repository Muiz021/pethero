<?php

namespace App\Http\Controllers\front;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\KirimHewan;
use Illuminate\Support\Str;
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
    ###member###
    public function detail_pengirim1()
    {
        $kurir = User::where('roles','kurir')->where('status','diterima')->get();
        $lokasi = Lokasi::get();
        return view('front.pages.kirim-hewan.detail-pengirim-1',['kurir' => $kurir,'lokasi' => $lokasi]);
    }

    public function detail_pengirim2(Request $request)
    {
        $user = Auth::user();
        $lokasi = Lokasi::where('status',true)->first();
        $id_kurir = $request->id_kurir;
        $tanggal = $request->tanggal;;
        return view('front.pages.kirim-hewan.detail-pengirim-2', compact('lokasi', 'id_kurir', 'tanggal',));
    }

    ##alamat##
    public function detail_alamat()
    {
        $user = Auth::user();
        return view('front.pages.kirim-hewan.detail-alamat', compact('user'));
    }
    ##end alamat##

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

        $kurir = User::where('id',$request->id_kurir)->first();
        $id_detail_lokasi = $detail_lokasi->id;
        $kirim_hewan = KirimHewan::create([
            "id_detail_lokasi" => $id_detail_lokasi,
            "id_kurir" => $kurir->id,
            "id_user" => Auth::user()->id,
            "nama_pengirim" => $kurir->nama,
            "deskripsi_hewan" => $request->deskripsi_hewan,
            "tanggal" => $request->tanggal,
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

        return redirect('detail/pembayaran/'.$kirim_hewan->id);
    }

    ##pembayaran
    public function detail_pembayaran($id)
    {
        $user = Auth::user();
        $kirim_hewan = KirimHewan::where('id', $id)->where('id_user',$user->id)->first();
        $lokasi = DetailLokasi::where('id', $kirim_hewan->id_detail_lokasi)->first();
        return view('front.pages.kirim-hewan.detail-pembayaran', ['kirim_hewan' => $kirim_hewan, 'lokasi' => $lokasi]);
    }

    public function detail_pembayaran_2($id)
    {
        $user = Auth::user();
        $kirim_hewan = KirimHewan::where('id', $id)->where('id_user',$user->id)->first();
        $lokasi = DetailLokasi::where('id', $kirim_hewan->id_detail_lokasi)->first();
        return view('front.pages.kirim-hewan.detail-pembayaran-2', ['kirim_hewan' => $kirim_hewan, 'lokasi' => $lokasi]);
    }

    public function update_metode_pembayaran(Request $request, $id)
    {
        $pembayaran = KirimHewan::where('id',$id)->first();
        $pembayaran->update([
            'metode_pembayaran' => $request->metode_pembayaran
        ]);
        Alert::success(Auth::user()->nama, "Silahkan Upload Struk Pembayaran Anda");
        return redirect('detail/pembayaran-2/'.$pembayaran->id);
    }

    public function update_gambar_pembayaran(Request $request, $id)
    {
        $pembayaran = KirimHewan::where('id',$id)->first();

        $foto = $request->file('gambar');
        $destinationPath = 'images/';
        $baseURL = url('/');
        $profileImage = $baseURL . "/images/" . 'bukti_pembayaran' . '_'.Str::slug(Auth::user()->nama,'_') . Carbon::now()->format('YmdHis') . "." . $foto->getClientOriginalExtension();
        $foto->move($destinationPath, $profileImage);
        $pembayaran->update([
            'gambar' => $profileImage
        ]);

        Mail::send('front.pages.email.notifikasi-upload-bukti-pembayaran', ['nama_pelanggan' => Auth::user()->nama, 'email_pelanggan' => Auth::user()->email], function ($message) {
            $pethero = "petheromakassar@gmail.com";
            $message->to($pethero);
            $message->subject('Pemberitahuan Bukti Pembayaran');
        });
        Alert::success(Auth::user()->nama, "Terima Kasih Telah Melakukan Transaksi");
        return redirect('detail/pembayaran-2/'.$pembayaran->id);
    }
    ##end pembayaran##

    ###end member###

    ###kurir###
    public function detail_riwayat_pengiriman($id)
    {
        $kurir = Auth::user();
        $kirim_hewan = KirimHewan::where('id', $id)->where('id_kurir',$kurir->id)->first();
        $lokasi = DetailLokasi::where('id', $kirim_hewan->id_detail_lokasi)->first();
        return view('front.pages.kurir.detail-riwayat-pengiriman', ['kirim_hewan' => $kirim_hewan, 'lokasi' => $lokasi]);
    }

    public function update_status_pengiriman(Request $request,$id)
    {
        $kirim_hewan=KirimHewan::where('id',$id)->first();
        $user = User::where('id',$kirim_hewan->id_user)->first();
        $kirim_hewan->update([
            'status_pengiriman' => $request->status_pengiriman
        ]);

        Mail::send('front.pages.email.notifikasi-pengiriman-hewan', ['nama_pelanggan' => $user->nama, 'email_pelanggan' => $user->email], function ($message) {
            $pethero = "petheromakassar@gmail.com";
            $message->to($pethero);
            $message->subject('Pemberitahuan Pengiriman Hewan');
        });

        Alert::success("Sukses", "Kamu Berhasil Mengirim Paket");
        return redirect()->back();
    }
    ###end kurir###

}
