<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        return view('Front.pages.akun.index');
    }

    public function daftar()
    {
        return view('Front.pages.akun.daftar');
    }
    public function masuk()
    {
        return view('Front.pages.akun.masuk');
    }

    public function tentang_kami()
    {
        return view('Front.pages.akun.tentang-kami');
    }
}
