<?php

namespace App\Http\Controllers\front;

use App\Models\KirimHewan;
use Illuminate\Support\Str;
use App\Models\DetailLokasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\front\DaftarRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AkunController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $akun = User::where('password',Auth::user()->password)->first();
            return view('Front.pages.akun.index',['akun' => $akun]);
        }else{
            return view('Front.pages.akun.index');
        }
    }

    public function daftar()
    {
        return view('Front.pages.akun.daftar');
    }

    public function edit($slug)
    {
        $akun = User::where('slug',$slug)->first();
        return view('Front.pages.akun.edit',['akun' => $akun]);
    }

    public function update(Request $request, $slug)
    {
        $akun = User::where('slug',$slug)->first();

        if ($request->gambar) {
            if ($akun->gambar) {
                $file_path = public_path().'/images/'.$akun->gambar;
                unlink($file_path);
            }

            $akun->nama = $request->nama;
            $akun->slug = Str::slug($request->nama,'-');
            $akun->nomor_ponsel = $request->nomor_ponsel;

            $foto = $request->file('gambar');
            $destinationPath = 'images/';
            $profileImage = $akun->slug . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $akun->gambar = $profileImage;
        }else{

            $akun->nama = $request->nama;
            $akun->slug = Str::slug($request->nama,'-');
            $akun->nomor_ponsel = $request->nomor_ponsel;
        }

        $akun->update();

        return redirect()->route('front.akun');
    }

    public function proses_daftar(DaftarRequest $request)
    {
        $akun = new User();
        $akun->nama = $request->nama;
        $akun->slug = Str::slug($request->nama,'-');
        $akun->nomor_ponsel = $request->nomor_ponsel;
        $akun->email = $request->email;
        $akun->password = Hash::make($request->password);

        $akun->save();
        Alert::success("Sukses", "Kamu Berhasil Membuat Akun");
        return redirect()->route('masuk');
    }

    public function masuk()
    {
        return view('Front.pages.akun.masuk');
    }

    public function tentang_kami()
    {
        return view('Front.pages.akun.tentang-kami');
    }

    public function riwayat_pengiriman()
    {
        $user = Auth::user();
        $data = KirimHewan::where('id_user', $user->id)->get();
        $lokasi = DetailLokasi::where('id_user',$user->id)->get();
        return view('front.pages.akun.riwayat-pengiriman',['data' => $data, 'lokasi' => $lokasi]);
    }

}
