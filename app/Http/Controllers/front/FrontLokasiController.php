<?php

namespace App\Http\Controllers\front;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontLokasiController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        Lokasi::create([
            'label_alamat' => $request->label_alamat,
            'alamat' => $request->alamat,
            'catatan_driver' => $request->catatan_driver,
            'nama_penerimaan' => $request->nama_penerimaan,
            'nomor_ponsel' =>  $user->nomor_ponsel,
        ]);

        return redirect()->route('front.kirim-hewan2');
    }
}
