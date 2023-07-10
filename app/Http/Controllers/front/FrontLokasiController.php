<?php

namespace App\Http\Controllers\front;

use App\Models\User;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\front\LokasiRequest;

class FrontLokasiController extends Controller
{
    public function list_alamat()
    {
        $lokasi = Lokasi::limit(3)->orderBy('created_at', 'desc')->get();
        return view('front.pages.kirim-hewan.detail-alamat', ['lokasi' => $lokasi]);
    }

    public function create()
    {
        return view('front.pages.kirim-hewan.detail-list-alamat');
    }
    public function store(LokasiRequest $request)
    {
        $user = Auth::user();
        Lokasi::create([
            'id_user' => $user->id,
            'label_alamat' => $request->label_alamat,
            'alamat' => $request->alamat,
            'catatan_driver' => $request->catatan_driver,
            'nama_penerimaan' => $request->nama_penerimaan,
            'nomor_ponsel' =>  $user->nomor_ponsel,
        ]);

        return redirect()->route('front.detail-alamat');
    }

    public function select_alamat(Request $request)
    {
        $allLokasi = Lokasi::all();
        foreach ($allLokasi as $lokasi) {
            if ($lokasi->id == $request->id) {
                $lokasi->update(['status' => true]);
            } else {
                $lokasi->update(['status' => false]);
            }
        }
        return redirect()->back();
    }
}
