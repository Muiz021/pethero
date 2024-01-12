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
    ##umum##
    public function index()
    {
        if (Auth::user()) {
            $akun = User::where('password', Auth::user()->password)->first();
            return view('front.pages.akun.index', ['akun' => $akun]);
        } else {
            return view('front.pages.akun.index');
        }
    }

    public function daftar()
    {
        return view('front.pages.akun.daftar');
    }

    public function edit($slug)
    {
        $akun = User::where('slug', $slug)->first();
        return view('front.pages.akun.edit', ['akun' => $akun]);
    }

    public function edit_kurir($slug)
    {

        $akun = User::where('slug', $slug)->first();
        return view('front.pages.akun.edit-kurir', ['akun' => $akun]);
    }

    public function update(Request $request, $slug)
    {
        $akun = User::where('slug', $slug)->first();

        if ($request->gambar) {
            if ($akun->gambar) {
                $file_path = public_path() . '/images/' . $akun->gambar;
                unlink($file_path);
            }

            $akun->nama = $request->nama;
            $akun->slug = Str::slug($request->nama, '-');
            $akun->nomor_ponsel = $request->nomor_ponsel;

            $foto = $request->file('gambar');
            $destinationPath = 'images/';
            $profileImage = $akun->slug . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $akun->gambar = $profileImage;
        } else {

            $akun->nama = $request->nama;
            $akun->slug = Str::slug($request->nama, '-');
            $akun->nomor_ponsel = $request->nomor_ponsel;
        }

        $akun->update();

        return redirect()->route('front.akun');
    }

    public function update_kurir(Request $request, $slug)
    {
        $data = $request->all();
        $akun = Auth::user();

        if ($request->gambar && $request->foto_sim_c) {
            if ($akun->gambar) {
                $file_path = Str::replace(url('/') . '/images/', '', public_path() . '/images/' . $akun->gambar);
                unlink($file_path);
            }

            if ($akun->foto_sim_c) {
                $file_path = Str::replace(url('/') . '/images/', '', public_path() . '/images/' . $akun->foto_sim_c);
                unlink($file_path);
            }

            $foto = $request->file('gambar');
            $destinationPath = 'images/';
            $pathURL = url('/');
            $profileImage = $pathURL . '/images/' . Str::slug($request->nama, '_') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $data['gambar'] = $profileImage;

            $foto_sim_c = $request->file('foto_sim_c');
            $namaSim = $pathURL . '/images/' . Str::slug($request->nama, '_') . "_foto_sim_c." . $foto_sim_c->getClientOriginalExtension();
            $foto_sim_c->move($destinationPath, $namaSim);
            $data['foto_sim_c'] = $namaSim;

            $data['slug'] = Str::slug($data['nama'], '-');

            $akun->update($data);
        } elseif ($request->gambar) {
            if ($akun->gambar) {
                $file_path = Str::replace(url('/') . '/images/', '', public_path() . '/images/' . $akun->gambar);
                unlink($file_path);
            }

            $foto = $request->file('gambar');
            $destinationPath = 'images/';
            $pathURL = url('/');
            $profileImage = $pathURL . '/images/' . Str::slug($request->nama, '_') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $data['gambar'] = $profileImage;

            $data['slug'] = Str::slug($data['nama'], '-');

            $akun->update($data);
        } elseif ($request->foto_sim_c) {
            if ($akun->foto_sim_c) {
                $file_path = Str::replace(url('/') . '/images/', '', public_path() . '/images/' . $akun->foto_sim_c);
                unlink($file_path);
            }

            $foto_sim_c = $request->file('foto_sim_c');
            $destinationPath = 'images/';
            $pathURL = url('/');
            $namaSim = $pathURL . '/images/' . Str::slug($request->nama, '_') . "_foto_sim_c." . $foto_sim_c->getClientOriginalExtension();
            $foto_sim_c->move($destinationPath, $namaSim);
            $data['foto_sim_c'] = $namaSim;

            $data['slug'] = Str::slug($data['nama'], '-');
            $akun->update($data);
        }else{
            $akun->update($data);
        }

        Alert::success("Sukses", "Kamu berhasil memperbarui akun");
        return redirect()->back();
    }


    public function masuk()
    {
        return view('front.pages.akun.masuk');
    }

    public function tentang_kami()
    {
        return view('front.pages.akun.tentang-kami');
    }

    public function riwayat_pengiriman_member()
    {
        $user = Auth::user();
        $data = KirimHewan::where('id_user', $user->id)->get();
        $lokasi = DetailLokasi::where('id_user', $user->id)->get();
        return view('front.pages.akun.riwayat-pengiriman', ['data' => $data, 'lokasi' => $lokasi]);
    }

    public function riwayat_pengiriman_kurir()
    {
        $user = Auth::user();
        $kirim_hewan = KirimHewan::where('id_kurir', $user->id)->where('status_pembayaran', 'true')->get();
        foreach ($kirim_hewan as $data) {
            $lokasi = DetailLokasi::where('id', $data->id_detail_lokasi)->get();
        }
        return view('front.pages.kurir.riwayat-pengiriman', ['data' => $kirim_hewan, 'lokasi' => $lokasi]);
    }
    ##end umum##

    ##user##
    public function daftar_user()
    {
        return view('front.pages.akun.daftar-user');
    }
    public function proses_daftar(DaftarRequest $request)
    {
        $akun = new User();
        $akun->nama = $request->nama;
        $akun->slug = Str::slug($request->nama, '-');
        $akun->nomor_ponsel = $request->nomor_ponsel;
        $akun->email = $request->email;
        $akun->password = Hash::make($request->password);

        $akun->save();
        Alert::success("Sukses", "Kamu Berhasil Membuat Akun");
        return redirect()->route('masuk');
    }
    ##end user##


    ##kurir##
    public function daftar_kurir()
    {
        return view('front.pages.akun.daftar-kurir');
    }

    public function proses_daftar_kurir(Request $request)
    {
        $foto = $request->file('gambar');
        $destinationPath = 'images/';
        $pathURL = url('/');
        $profileImage = $pathURL . '/images/' . Str::slug($request->nama, '_') . "." . $foto->getClientOriginalExtension();
        $foto->move($destinationPath, $profileImage);

        $foto_sim_c = $request->file('foto_sim_c');
        $destinationPath = 'images/';
        $pathURL = url('/');
        $namaSimC = $pathURL . '/images/' . Str::slug($request->foto_sim_c->getClientOriginalName(), '_') . "." . $foto_sim_c->getClientOriginalExtension();
        $foto_sim_c->move($destinationPath, $namaSimC);

        $akun = new User();
        $akun->nama = $request->nama;
        $akun->slug = Str::slug($request->nama, '-');
        $akun->jenis_kelamin = $request->jenis_kelamin;
        $akun->tempat_lahir = $request->tempat_lahir;
        $akun->tanggal_lahir = $request->tanggal_lahir;
        $akun->nomor_ponsel = $request->nomor_ponsel;
        $akun->status = 'proses';
        $akun->gambar = $profileImage;
        $akun->foto_sim_c = $namaSimC;
        $akun->email = $request->email;
        $akun->roles = 'kurir';
        $akun->password = Hash::make($request->password);

        $akun->save();
        Alert::success("Sukses", "Kamu Berhasil Membuat Akun");
        return redirect()->route('masuk');
    }
}
