<?php

namespace App\Http\Controllers\back;

use App\Models\User;
use App\Models\KirimHewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class BackKirimHewanController extends Controller
{
    public function index()
    {
        $kirim_hewan = KirimHewan::get();
        return view('admin.pages.kirim-hewan.index', ['kirim_hewan' => $kirim_hewan]);
    }

    public function update(Request $request, $id)
    {
        $kirim_hewan = KirimHewan::where('id',$id)->first();
        $kirim_hewan->update([
            'status' => $request->status
        ]);

        $user = User::where('id', $kirim_hewan->id_user)->first();
        $nama_pelanggan = $user->nama;

        if ($kirim_hewan->status == "true") {
            Mail::send('front.pages.email.notifikasi-update',['nama_pelanggan' => $nama_pelanggan], function ($message) use ($id) {
                $kirim_hewan = KirimHewan::where('id', $id)->first();
                $user = User::where('id', $kirim_hewan->id_user)->first();
                $message->to($user->email);
                $message->subject('Transaksi');
            });

            Alert::success("Berhasil", "kamu berhasil memperbarui status");
            return redirect()->back();
        } else{
            Alert::error("Gagal", "kamu gagal memperbarui status");
            return redirect()->back();
        }

    }

    public function destroy($id)
    {
        $kirim_hewan = KirimHewan::where('id',$id)->first();
        $kirim_hewan->delete();
        return redirect()->back();
    }
}
