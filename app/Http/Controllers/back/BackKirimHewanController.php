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
        $kirim_hewan = KirimHewan::where('status_pembayaran','true')->get();
        return view('admin.pages.kirim-hewan.berhasil.index', ['kirim_hewan' => $kirim_hewan]);
    }

    public function show($id)
    {
        $data = KirimHewan::find($id);
        return view('admin.pages.kirim-hewan.berhasil.show',compact('data'));

    }

    public function destroy($id)
    {
        $kirim_hewan = KirimHewan::where('id',$id)->first();
        $kirim_hewan->delete();
        return redirect()->back();
    }
}
