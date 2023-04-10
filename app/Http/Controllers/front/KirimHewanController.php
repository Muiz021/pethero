<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KirimHewanController extends Controller
{
    public function detail_pengirim1()
    {
        return view('Front.pages.kirim-hewan.detail-pengirim-1');
    }

    public function detail_pengirim2()
    {
        return view('Front.pages.kirim-hewan.detail-pengirim-2');
    }

    public function detail_alamat()
    {
        return view('Front.pages.kirim-hewan.detail-alamat');
    }
}
