<?php

namespace App\Http\Controllers;

use App\Http\Requests\front\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{

    public function proses_login(LoginRequest $request)
    {

        $kredensil = $request->only('email', 'password');

        if (Auth::attempt($kredensil)) {
            Auth::user();
            if (Auth::user()->roles == 'member') {
                Alert::success(Auth::user()->nama, "Kamu berhasil login");
                return redirect()->route('front.akun');
            } else
            if (Auth::user()->roles == 'admin') {
                Alert::success(Auth::user()->nama, "Kamu berhasil login");
                return redirect()->route('dashboard');
            } else
            if (Auth::user()->roles == 'kurir') {
                if (Auth::user()->status == 'diterima') {
                    Alert::success(Auth::user()->nama, "Kamu berhasil login");
                    return redirect()->route('front.akun');
                } else {
                    Alert::error('Maaf', "Silahkan tunggu sampai ada verifikasi email yang dikirimkan");
                    return redirect()->back();
                }
            }
        } else {
            Alert::error("Gagal", "Email atau Password Salah");
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        Alert::success("Berhasil", "Kamu berhasil Logout");
        return Redirect()->route('front.akun');
    }
}
